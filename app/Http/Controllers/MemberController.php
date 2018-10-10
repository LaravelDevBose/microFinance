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
        return view('admin.member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member_info = MemberAccountInfo::orderBy('id', 'desc')->first()->value('mem_code'); //M00001
        $intger_value = substr($member_info, 1 ,strlen($member_info)); // 00001
        if(is_null($intger_value) || empty($intger_value)){
            $m_id = 'M00001';
        }else if($intger_value < 9){
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

        $report = $this->member_data_validation($request);

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
        return view('admin.member.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
