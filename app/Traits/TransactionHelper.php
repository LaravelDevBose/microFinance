<?php
    /**
     * Created by PhpStorm.
     * User: Arup
     * Date: 10/3/2018
     * Time: 10:31 PM
     */

    namespace App\Traits;
    use Illuminate\Support\Facades\Validator;
    use App\MemberBalance;
    use Auth;

trait TransactionHelper
{
    private function current_balance_update($member_id = Null, $amount= Null, $payment_type = Null){
        $mem_balnace = MemberBalance::where('member_id', $member_id)->first();

        if($payment_type == 1){
            $curt_balance = $mem_balnace->balance + $amount; 
        }else{
            $curt_balance = $mem_balnace->balance - $amount;
        }

        $bla_update = MemberBalance::find($mem_balnace->id);
        $bla_update->balance = $curt_balance;
        $bla_update->save();

        return Ture;
        
    }
}