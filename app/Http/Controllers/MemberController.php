<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Traits\ImageHandler;
use App\Traits\MemberHelper;
use Illuminate\Http\Request;
use App\MemberAccountInfo;
use Session;
use App\Member;
class MemberController extends Controller
{
    use ImageHandler,MemberHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $members = Member::where('status', 'a')->orderBy('id', 'asc')->get();
        return view('admin.member.index',['members'=>$members]);
    }

    public function find_member_info($id=Null)
    {
        $member = Member::find($id);
        if($member){
            $data['inst_amount'] = $member->account_info->inst_amount;
            $data['mem_name'] = $member->m_name;

            echo json_encode($data); die();
        }
        echo 0;
        

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member_info = MemberAccountInfo::orderBy('id', 'desc')->first(); //M00001
        if(is_null($member_info) || empty($member_info)){
            $m_id = 'M00001';
        }else{

            $intger_value = substr($member_info->mem_code, 1 ,strlen($member_info->mem_code)); // 00001
            if($intger_value < 9){
                $m_id = 'M0000'.++$intger_value;
            }else if($intger_value < 99){
                $m_id = 'M000'.++$intger_value;
            }else if($intger_value < 999){
                $m_id = 'M00'.++$intger_value;
            }else if($intger_value < 9999){
                $m_id = 'M0'.++$intger_value;
            }else if($intger_value < 99999){
                $m_id = 'M'.++$intger_value;
            }else{
                Session::flash('text_warning','You Already Add Maximum Number of Member. Contact With Your Developer');
                return redirect()->route('member.index');

            }
        }
//        dd($m_id);
        return view('admin.member.create',['m_id'=>$m_id]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $report = Validator::make($request->all(),[
            'mem_code' => 'required|string|max:6',
            'opening_date' => 'required',
            'area' => 'required',
            'instalment_type' => 'required|integer',
            'inst_amount' => 'required|integer',
            'm_name' => 'required|string',
            'mother_name' => 'required|string',
            'dob' => 'required',
            'nid_number' => 'required',
            'phone_number' => 'required',
            'father_name' => 'required',
            'spouce_name' => 'required',
            'present_address' => 'required',
            'e_name' => 'required',
            'e_relation' => 'required',
            'e_phone_number' => 'required',

            'e_address' => 'required',
            'n_name' => 'required',
            'n_relation' => 'required',
            'n_phone_number' => 'required',

            'n_address' => 'required',
            'member_image' => 'required',
            'mamber_nid' => 'required',
            'n_image' => 'required',
        ]);


        if($report->passes()){

            $folderName = 'member';
            $member_image = $request->file('member_image');
            $mem_img_url = $this->singel_image_resize_store_in_folder($member_image ,$folderName);

            $member_nid = $request->file('mamber_nid');
            $mem_nid_url = $this->singel_image_resize_store_in_folder($member_nid, $folderName);

            $n_image = $request->file('n_image');
            $n_img_url = $this->singel_image_resize_store_in_folder($n_image, $folderName);

            $member_id = $this->member_info_store($request,$mem_img_url,$mem_nid_url);
            $this->account_info_store($request,$member_id);
            $this->emergency_contact_info_store($request,$member_id);
            $this->nominee_info_store($member_id,$request,$n_img_url);

            //flash Session Success Message
            Session::flash('success', 'New Member Register SuucessFully.');

            //redirecd back
            return redirect()->back();


        }else{
            return redirect()->back()->withErrors($report)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::where('id', $id)->first();
        return view('admin.member.profile',['member'=>$member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::where('id', $id)->first();
        return view('admin.member.edit', ['member'=>$member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//         dd($request->all());
        $report = Validator::make($request->all(),[
            'mem_code' => 'required|string|max:6',
            'opening_date' => 'required',
            'area' => 'required',
            'instalment_type' => 'required|integer',
            'inst_amount' => 'required|integer',
            'm_name' => 'required|string',
            'mother_name' => 'required|string',
            'dob' => 'required',
            'nid_number' => 'required',
            'phone_number' => 'required',
            'father_name' => 'required',
            'spouce_name' => 'required',
            'present_address' => 'required',
            'e_name' => 'required',
            'e_relation' => 'required',
            'e_phone_number' => 'required',

            'e_address' => 'required',
            'n_name' => 'required',
            'n_relation' => 'required',
            'n_phone_number' => 'required',

            'n_address' => 'required',
        ]);
        if($report->passes()){

            $folderName = 'member';

            $member_image = $request->file('member_image');
            $mem_img_url = $request->old_member_image;
            if($member_image && isset($member_image)){
                $mem_img_url = $this->singel_image_resize_store_in_folder($member_image ,$folderName);
                if(file_exists($request->old_member_image)){
                    unlink($request->old_member_image);
                }
            }
            
            $member_nid = $request->file('mamber_nid');
            $mem_nid_url = $request->old_nid;
            if($member_nid && isset($member_nid)){
                $mem_nid_url = $this->singel_image_resize_store_in_folder($member_nid, $folderName);
                if(file_exists($request->old_nid)){
                    unlink($request->old_nid);
                }
            }
            $this->update_member_info($id, $request, $mem_img_url,$mem_nid_url);
            $this->account_info_update($request,$id );
            $this->emergency_contact_info_Update($request,$id);


            $n_image = $request->file('n_image');
            $n_img_url = $request->old_n_image;
            if($n_image && isset($n_image)){
                $n_img_url = $this->singel_image_resize_store_in_folder($n_image, $folderName);
                if(file_exists($request->old_n_image)){
                    unlink($request->old_n_image);
                }
            }


            $this->nominee_info_update($id,$request,$n_img_url);

            Session::flash('success', 'Member Info Update SuucessFully.');

            //redirecd back
            return redirect()->route('member.index');
            
        }else{
            return redirect()->back()->withErrors($report)->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
