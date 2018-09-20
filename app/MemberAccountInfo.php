<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberAccountInfo extends Model
{
    protected $fillable =['m_id','member_id','instalment_type','inst_amount','opening_date','area'];
}
