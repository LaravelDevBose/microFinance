<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable=[
        'm_name','father_name','mother_name','spouce_name','dob','nid_number','phone_number','email','present_address','premanent_address',
        'member_image','mamber_nid','extra_note',
    ];

}
