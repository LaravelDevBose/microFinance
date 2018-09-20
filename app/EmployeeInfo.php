<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeInfo extends Model
{
    protected $fillable=['emply_id','emply_name','desig_id','dept_id','joining_date','salary','father_name','mother_name','dob','gender',
        'marital_status','nid_num','phone_no','email','present_address','parmanent_address','image','employee_cv','status'];
}
