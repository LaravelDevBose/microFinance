<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\TransactionHelper;
use App\Member;
class TransactionController extends Controller
{   

    use TransactionHelper;
    
    /*======== DPS Transition Page view method==========*/
    public function dps_transition_page(){
        $trans_id;
        if(is_null($cus_id)|| !isset($cus_id)){
            $cus_code = 'C00001';
        }else{

            $num = substr($cus_id->cus_code, 1, strlen($cus_id->cus_code));

            // var_dump($num); die();
            if($num < 9):
                $num+=1;
                $cus_code = 'C0000'.$num;
            elseif($num < 99):
                $num+=1;
                $cus_code = 'C000'.$num;
            elseif($num < 999):
                $num+=1;
                $cus_code = 'C00'.$num;
            elseif($num<9999):
                $num+=1;
                $cus_code = 'C0'.$num;
            else:
                $num+=1;
                $cus_code = 'C'.$num;
            endif;
        }
        $customers = Member::select('id','m_name')->get();
        return view('admin.transition.dps_transition_page',['customers'=>$customers]);
    }

    /*===== Loan Transition Page View Method ==========*/
    public function loan_transition_page(){
        return view('admin.transition.loan_transition_page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dps_transition_store(Request $request)
    {
        $dps = new Transition;
        $dps->trans_type = 'D';
        $dps->payment_type = $request->payment_type;
        $dps->trans_date = date('Y-m-d', strtotime(str_replace('/', '-', $request->trans_date)));
        $dps->member_id = $request->member_id;
        $dps->amount = $request->amount;
        $dps->short_note = $request->short_note;
        $dps->status = 'a';
        $dps->created_by = Auth::user()->username;
        $dps->updated_by = Auth::user()->username;
        $dps->save();

        $this->current_balance_update($request->member_id,$request->amount,$request->payment_type);

        $trans= Transition::where('trans_type','D')->where('status', 'a')->orderBy('id', 'desc')->get();
        return view('admin.transition.dps_trans_tbl', ['trans'=>$trans]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
