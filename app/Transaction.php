<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable =['trans_id','trans_type','payment_type','trans_date','member_id','amount','short_note'];

    public function member()
    {
    	return $this->hasOne('App\Member', 'id', 'member_id');
    }
}
