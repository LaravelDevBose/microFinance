<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberAccountInfo extends Model
{
    protected $fillable =['mem_code','member_id','instalment_type','inst_amount','opening_date','area'];

    public function getInstAmountAttribute($value){
        return number_format($value,2);
    }
}
