<?php


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*======== Admin Route List ===============*/
/*======== Admin Route List ===============*/
/*======== Admin Route List ===============*/
/*======== Admin Route List ===============*/
/*======== Admin Route List ===============*/

Route::prefix('admin')->group( function(){
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login');



    Route::group(['middleware'=>['auth:admin']], function (){
        Route::get('/dashboard', 'AdminController@index')->name('dashboard');

        /*------ Member Resource Route List--------*/
        Route::Resource('member','MemberController');

        /*----- Cash Transition Route list---------*/
        Route::get('dps/transition', 'TransitionController@dps_transition_page')->name('dps.transition');
        Route::get('loan/transition', 'TransitionController@loan_transition_page')->name('loan.transition');

        /*------ Income & Expense Route List --------*/
        Route::Resource('income_expense', 'IncomeExpenseController');
        Route::get('IE_head', 'IncomeExpenseController@income_expense_head_page')->name('IE_head');

        /*------ Employee Resource Route List --------*/
        Route::Resource('employee','EmployeeController');

        /*------ Department Resource Route List ------*/
        Route::Resource('department','DepartmentController');

        /*------ Designation Resource Route list ------*/
        Route::Resource('designation','DesignationController');


        /*------ Apps Setting Route List ---------*/

        /*----- Sub Admin Resource Route List ---------*/
        Route::Resource('sub_admin', 'SubAdminController');
    });
});

