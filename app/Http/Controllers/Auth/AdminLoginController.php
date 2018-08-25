<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>['logout']]);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login( Request $request){
        //Validate the form date
        $this->validate($request, [
            'identity'=>'required',
            'password'=>'required|min:6',
        ]);
        //attempt to log the user in
        if (Auth::guard('admin')->attempt([$this->username()=>$request->identity, 'password'=>$request->password], $request->remember)) {
            //if Sucessfull, than redirect to their intended location
            return redirect()->intended(route('dashboard'));
        }

        //if Unsucessfull, then redirect back to their login with the form data
        return redirect()->back()->with('unsucces', 'Email Or UserName And Password Not Match !');
    }



    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }


    /**
     * Check either username or email.
     * @return string
     */
    public function username()
    {
        $identity  = request()->get('identity');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldName => $identity]);
        return $fieldName;
    }
}
