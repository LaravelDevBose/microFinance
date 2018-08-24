<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransitionController extends Controller
{
    /*======== DPS Transition Page view method==========*/
    public function dps_transition_page(){

        return view('admin.transition.dps_transition_page');
    }

    /*===== Loan Transition Page View Method ==========*/
    public function loan_transition_page(){
        return view('admin.transition.loan_transition_page');
    }
}
