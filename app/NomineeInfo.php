<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomineeInfo extends Model
{
    protected $fillable =['member_id','n_name','n_relation','n_phone_number','n_email','n_address'];
}
