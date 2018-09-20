<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmergencyInfo extends Model
{
    protected $fillable =['member_id','e_name','e_relation','e_phone_number','e_email','e_address'];
}
