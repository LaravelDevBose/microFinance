<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Traits\TransactionHelper;
use Illuminate\Http\Request;
use App\Transaction;
use App\Member;
use Auth;
class TransactionController extends Controller
{   

    use TransactionHelper;
    
    /*======== DPS Transition Page view method==========*/
    public function dps_transition_page(){
        $trans_info = Transaction::where('trans_type', 'D')->orderBy('id', 'desc')->first();
        if(is_null($trans_info)|| !isset($trans_info)){
            $trans_id = 'D00001';
        }else{

            $num = substr($trans_info->trans_id, 1, strlen($trans_info->trans_id));

            // var_dump($num); die();
            if($num < 9):
                $num+=1;
                $trans_id = 'D0000'.$num;
            elseif($num < 99):
                $num+=1;
                $trans_id = 'D000'.$num;
            elseif($num < 999):
                $num+=1;
                $trans_id = 'D00'.$num;
            elseif($num<9999):
                $num+=1;
                $trans_id = 'D0'.$num;
            else:
                $num+=1;
                $trans_id = 'D'.$num;
            endif;
        }
        $members = Member::select('id','m_name')->get();
        return view('admin.transition.dps_transition_page',['members'=>$members, 'trans_id'=>$trans_id]);
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
        $report = Validator::make($request->all(),[
            'trans_id' => 'required|string',
            'payment_type' => 'required',
            'trans_date' => 'required',
            'member_id' => 'required|integer',
            'amount' => 'required|integer',
        ]);

        if($report->passes()){
            $dps = new Transaction;
            $dps->trans_id = $request->trans_id;
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

            $dps_trans= Transaction::where('trans_type','D')->where('status', 'a')->orderBy('id', 'desc')->get();
            return view('admin.transition.dps_trans_tbl', ['dps_trans'=>$dps_trans]);
        }else{
            return redirect()->back()->withErrors($report);
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
