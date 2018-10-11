<?php
    /**
     * Created by PhpStorm.
     * User: Arup
     * Date: 10/3/2018
     * Time: 10:31 PM
     */

    namespace App\Traits;
    use Illuminate\Support\Facades\Validator;
    use App\MemberAccountInfo;
    use App\EmergencyInfo;
    use App\NomineeInfo;
    use App\Member;
    use Auth;

trait MemberHelper
{
    private function member_data_validation($request){
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
        return $report;
    }
    /*======== Data Store Function =========*/
    /*======== Data Store Function =========*/
    /*======== Data Store Function =========*/
    /*======== Data Store Function =========*/
    private function member_info_store($request,$member_image,$mamber_nid){

        $member  = new Member;
        $member->m_name = $request->m_name;
        $member->father_name = $request->father_name;
        $member->mother_name = $request->mother_name;
        $member->spouce_name = $request->spouce_name;
        $member->dob = date('Y-m-d', strtotime(str_replace('/', '-', $request->dob)));
        $member->nid_number = $request->nid_number;
        $member->phone_number = $request->phone_number;
        $member->email = $request->email;
        $member->present_address = $request->present_address;
        $member->premanent_address = $request->premanent_address;
        $member->extra_note = $request->extra_note;
        $member->member_image = $member_image;
        $member->mamber_nid = $mamber_nid;
        $member->status = 'a';
        $member->created_by = Auth::user()->username;
        $member->updated_by = Auth::user()->username;
        $member->save();
        return $member->id;
    }

    private function account_info_store($request,$member_id){



        $account = new MemberAccountInfo;
        $account->member_id = $member_id;
        $account->mem_code = $request->mem_code;
        $account->instalment_type = $request->instalment_type;
        $account->inst_amount = $request->inst_amount;
        $account->opening_date = date('Y-m-d', strtotime(str_replace('/', '-', $request->opening_date)));
        $account->area = $request->area;
        $account->save();
    }

    private function emergency_contact_info_store($request,$member_id){
        $emg = new EmergencyInfo;
        $emg->member_id = $member_id;
        $emg->e_name = $request->e_name;
        $emg->e_relation = $request->e_relation;
        $emg->e_phone_number = $request->e_phone_number;
        $emg->e_email = $request->e_email;
        $emg->e_address = $request->e_address;
        $emg->save();
    }
    private function nominee_info_store($member_id,$request,$n_img_url){
        $nominee = new NomineeInfo;
        $nominee->member_id = $member_id;
        $nominee->n_name = $request->n_name;
        $nominee->n_relation = $request->n_relation;
        $nominee->n_phone_number = $request->n_phone_number;
        $nominee->n_email = $request->n_email;
        $nominee->n_address = $request->n_address;
        $nominee->n_image = $n_img_url;
        $nominee->save();
    }


    /*======== Data Update Function =========*/
    /*======== Data Update Function =========*/
    /*======== Data Update Function =========*/
    /*======== Data Update Function =========*/
    private function update_member_info($mem_id, $request,$member_image,$mamber_nid){

        $member  = Member::find($mem_id);
        $member->m_name = $request->m_name;
        $member->father_name = $request->father_name;
        $member->mother_name = $request->mother_name;
        $member->spouce_name = $request->spouce_name;
        $member->dob = date('Y-m-d', strtotime(str_replace('/', '-', $request->dob))) ;
        $member->nid_number = $request->nid_number;
        $member->phone_number = $request->phone_number;
        $member->email = $request->email;
        $member->present_address = $request->present_address;
        $member->premanent_address = $request->premanent_address;
        $member->extra_note = $request->extra_note;
        $member->member_image = $member_image;
        $member->mamber_nid = $mamber_nid;
        $member->updated_by = Auth::user()->username;
        $member->save();
    }

    private function account_info_update($request,$mem_id){

        $acc_id = MemberAccountInfo::where('member_id', $mem_id)->first()->value('id');

        $account = MemberAccountInfo::find($acc_id);
        $account->mem_code = $request->mem_code;
        $account->instalment_type = $request->instalment_type;
        $account->inst_amount = $request->inst_amount;
        $account->opening_date = date('Y-m-d', strtotime(str_replace('/', '-', $request->opening_date)));
        $account->area = $request->area;
        $account->save();
    }

    private function emergency_contact_info_Update($request,$mem_id){
        $id = EmergencyInfo::where('member_id', $mem_id)->first()->value('id');

        $emg = EmergencyInfo::find($id);
        $emg->e_name = $request->e_name;
        $emg->e_relation = $request->e_relation;
        $emg->e_phone_number = $request->e_phone_number;
        $emg->e_email = $request->e_email;
        $emg->e_address = $request->e_address;
        $emg->save();
    }
    private function nominee_info_update($mem_id,$request,$n_img_url){

        $id = NomineeInfo::where('member_id', $mem_id)->first()->value('id');

        $nominee = NomineeInfo::find($id);
        $nominee->n_name = $request->n_name;
        $nominee->n_relation = $request->n_relation;
        $nominee->n_phone_number = $request->n_phone_number;
        $nominee->n_email = $request->n_email;
        $nominee->n_address = $request->n_address;
        $nominee->n_image = $n_img_url;
        $nominee->save();
    }
}