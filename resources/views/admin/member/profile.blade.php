@extends('layouts.app')

@section('title','Member Profile')

@section('assetFile')

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pdf/jspdf.debug.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/libraries/jasny_bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/datatables_extension_buttons_html5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/user_profile_tabbed.js') }}"></script>

    <!-- /theme JS files -->

    <style>
    .profile-headding{
        background-color: #e6ebf3ad;
        color: #0061a9;
        text-align: right;
        width: 30%;
        border-bottom: 1px solid #0d2dd685;
    }
    .select2-selection{
        height: 32px;
    }
    .form-group{
        margin-bottom: 5px;
    }
    </style>


@endsection

@section('content')
    <div class="content">

        <div class="col-md-3">
            <!-- Detached sidebar -->
            <div class="">
                <div class=" sidebar-default sidebar-separate">
                    <div class="sidebar-content">

                        <!-- User details -->
                        <div class="content-group">
                            <div class="panel-body bg-blue border-radius-top text-center" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">
                                <div class="content-group-sm">
                                    <h5 class="text-semibold no-margin-bottom">
                                        {{ $member->m_name }}
                                    </h5>

                                    <span class="display-block">{{ $member->account_info->area }}</span>
                                </div>

                                <a href="#" class="display-inline-block content-group-sm">
                                    <?php
                                    $image = 'public/images/user_profile.jpg';
                                    if($member->member_image){
                                        $image = $member->member_image;
                                        if(!@getimagesize($image)){
                                            $image = 'public/images/user_profile.jpg';
                                        }
                                    } ?>
                                    <img src="{{ asset($image) }}" class="img-circle img-responsive" alt="{{ $member->m_name }}" style="width: 120px; height: 120px;">
                                </a>

                                <ul class="list-inline no-margin-bottom">
                                    <li><a href="#" class="btn bg-blue-700 btn-rounded btn-icon"><i class="icon-phone"> {{ $member->phone_number }}</i></a></li>
                                    {{--<li><a href="#" class="btn bg-blue-700 btn-rounded btn-icon"><i class="icon-bubbles4"></i></a></li>--}}
                                    {{--<li><a href="#" class="btn bg-blue-700 btn-rounded btn-icon"><i class="icon-envelop4"></i></a></li>--}}
                                </ul>
                            </div>

                            <div class="panel panel-body no-border-top no-border-radius-top">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-semibold">Signature :</label>
                                            <span style="text-align: center;">
                                                <img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" class="img-responsive" alt="" style="width: 100%; height: 100px;">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="padding:0 2px;">
                                        <div class="form-group no-margin-bottom">
                                            <label class="text-semibold">Nominee Photo:</label>
                                            <span style="text-align: center;">
                                                <?php
                                                $image_n = 'public/images/user_profile.jpg';
                                                if($member->nominee->n_image){
                                                    $image_n = $member->nominee->n_image;
                                                    if(!@getimagesize($image)){
                                                        $image_n = 'public/images/user_profile.jpg';
                                                    }
                                                } ?>
                                                <img src="{{ asset($image_n) }}" class="img-responsive" alt="" style="width: 100%; height: 100px;">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel no-border-top no-border-radius-top">
                                <ul class="navigation">
                                    <li class="navigation-header">Navigation</li>
                                    <li class="active"><a href="#profile" data-toggle="tab"><i class="icon-files-empty"></i> Profile</a></li>
                                    <li><a href="#deposit_history" data-toggle="tab"><i class="icon-files-empty"></i> Deposit History</a></li>
                                    <li><a href="#load_history" data-toggle="tab"><i class="icon-files-empty"></i> Loan History <span class="badge bg-warning-400">23</span></a></li>
                                    <li><a href="#other" data-toggle="tab"><i class="icon-files-empty"></i> Other Info</a></li>

                                </ul>
                            </div>
                        </div>
                        <!-- /user details -->

                    </div>
                </div>
            </div>
            <!-- /detached sidebar -->

        </div>

        <div class="col-md-9">
            <!-- Detached content -->
            <div class="">
                <div class="">

                    <!-- Tab content -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="profile">

                            <!-- Daily stats -->
                            <div class="panel border-teal-400">
                                <div class="panel-heading bg-teal-300">
                                    <h6 class="panel-title">Account Information</h6>
                                </div>

                                <div class="table-responsive">
                                    <table class="table  table-xs" >

                                        <tbody>
                                        <tr >
                                            <th class="profile-headding" ><span class="text-bold">Member Id </span></th>
                                            <td>{{ $member->account_info->mem_code }}</td>
                                        </tr>
                                        <tr>
                                            <th class="profile-headding"><span class="text-bold">Account Opening Date </span></th>
                                            
                                            <td><?php $open_date = new DateTime($member->account_info->opening_date); echo date_format($open_date, 'd M Y'); ?></td>
                                        </tr>
                                        <tr style="display:none;">
                                            <th class="profile-headding"><span class="text-bold">Aee Amount </span></th>
                                            <td>@Kopyov</td>
                                        </tr>
                                        <tr>
                                            <th class="profile-headding"><span class="text-bold">Installment Type </span></th>
                                            <td>
                                                @if($member->account_info->instalment_type == 1)
                                                    <label class="label bg-purple-400">Daily</label>
                                                @elseif($member->account_info->instalment_type == 2)
                                                    <label class="label bg-violet-400">Weekly</label>
                                                @else
                                                    <label class="label bg-teal-400">Monthly</label>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="profile-headding"><span class="text-bold">Installment Amount </span></th>
                                            <td>{{ $member->account_info->inst_amount }}</td>
                                        </tr>
                                        <tr>
                                            <th class="profile-headding"><span class="text-bold">Account Status </span></th>
                                            <td>
                                                @if($member->status == 'a')
                                                    <label class="label bg-success">Active</label>
                                                @else
                                                    <label class="label bg-danger">Deleted</label>
                                                @endif
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- /daily stats -->


                            <div class="panel border-teal-400">
                                <div class="panel-heading bg-teal-300">
                                    <h6 class="panel-title">Personal Information</h6>
                                </div>

                                <div class="table-responsive">
                                    <table class="table  table-xs" >

                                        <tbody>
                                        <tr >
                                            <th class="profile-headding" ><span class="text-bold">Full Name </span></th>
                                            <td>{{ $member->m_name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="profile-headding"><span class="text-bold">Father's Name </span></th>
                                            <td>{{ $member->father_name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="profile-headding"><span class="text-bold">Mother's Name </span></th>
                                            <td>{{ $member->mother_name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="profile-headding"><span class="text-bold">Spouse Name </span></th>
                                            <td>{{ $member->spouce_name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="profile-headding"><span class="text-bold">Date Of Birth </span></th>
                                            <td><?php $open_date = new DateTime($member->dob); echo date_format($open_date, 'd M Y'); ?></td>
                                        </tr>
                                        <tr>
                                            <th class="profile-headding"><span class="text-bold">Email Address </span></th>
                                            <td>{{ $member->email }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th class="profile-headding"><span class="text-bold">Present Address </span></th>
                                            <td>{{ $member->present_address }}</td>
                                        </tr>
                                        <tr>
                                            <th class="profile-headding"><span class="text-bold">Permanent Address </span></th>
                                            <td>{{ $member->premanent_address }}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="row well">
                                <div class="col-md-6">
                                    <div class="panel border-teal-400">
                                        <div class="panel-heading bg-teal-300">
                                            <h6 class="panel-title">Emergency Contact</h6>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table  table-xs" >

                                                <tbody>
                                                <tr >
                                                    <th class="profile-headding" ><span class="text-bold">Name </span></th>
                                                    <td>{{ $member->emergency->e_name }}</td>
                                                </tr>
                                                <tr >
                                                    <th class="profile-headding" ><span class="text-bold">Relation </span></th>
                                                    <td>{{ $member->emergency->e_relation }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="profile-headding"><span class="text-bold">Phone No </span></th>
                                                    <td>{{ $member->emergency->e_phone_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="profile-headding"><span class="text-bold">Email </span></th>
                                                    <td>{{ $member->emergency->e_email }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="profile-headding"><span class="text-bold"> Address </span></th>
                                                    <td>{{ $member->emergency->e_address }}</td>
                                                </tr>
                                                

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel border-teal-400">
                                        <div class="panel-heading bg-teal-300">
                                            <h6 class="panel-title">Nominee Information</h6>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table  table-xs" >

                                                <tbody>
                                                <tr >
                                                    <th class="profile-headding" ><span class="text-bold"> Name </span></th>
                                                    <td>{{ $member->nominee->n_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="profile-headding"><span class="text-bold">Relation </span></th>
                                                    <td>{{ $member->nominee->n_relation }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="profile-headding"><span class="text-bold">Phone No </span></th>
                                                    <td>{{ $member->nominee->n_phone_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="profile-headding"><span class="text-bold">Email </span></th>
                                                    <td>{{ $member->nominee->n_email }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="profile-headding"><span class="text-bold">Address </span></th>
                                                    <td>{{ $member->nominee->n_address }}</td>
                                                </tr>

                                                

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="deposit_history">
                            <div class="panel border-teal-300">
                                <div class="panel-heading bg-teal-300 ">
                                    <h5 class="panel-title">DPS Balance Statement</h5>

                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <div class="row " >
                                            <form action="#"  class="form-horizontal">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-lg-4 control-label" >Search: <span class="text-danger text-bold">*</span></label>
                                                        <div class="col-md-8 input-group-sm">
                                                            <div class="input-group-xs">
                                                                <div class="input-group input-group-xs">
                                                                    <input type="text" class="form-control datepicker" id="rangeDemoFinish" placeholder="Start date">
                                                                    <span class="input-group-addon datepicker"><i class="icon-calendar2"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group  has-feedback">
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-xs">
                                                                <input type="text"  class="form-control datepicker" id="rangeDemoFinish" placeholder="End date">
                                                                <span class="input-group-addon datepicker"><i class="icon-calendar2"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-xs btn-info" > <i class="icon-search4 position-left"></i> Search</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group pull-right">
                                            <button class="btn btn-xs bg-purple"> <i class=" icon-file-pdf position-left"></i> Pdf</button>
                                            <button class="btn btn-xs bg-primary-700"> <i class="icon-printer2 position-left"></i> Print</button>

                                        </div>

                                    </div>

                                </div>
                                <table class="table table-xs datatable-button-html5-columns " id="pdfContent">

                                    <thead>
                                        <tr style="display: none">
                                            <th colspan="6">
                                                <div class="row">
                                                    <div class="col-md-2" >
                                                        <img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" class=" img-responsive" alt="" style="width: 100px; height: 80px; margin-top: 20px;">
                                                    </div>
                                                    <div class="col-md-8 col-md-offset-1 text-center">
                                                        <h3 class="text-bold">Micro Finance Project</h3>
                                                        <p>17/ka Pc Culture Samoliy Dhaka-1207 </p>
                                                        <p><b>Phone No: </b> 01731909035 <b>Email: </b> laravel.devbose@gmail.com</p>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>


                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Job Title</th>
                                            <th>DOB</th>
                                            <th>Status</th>
                                            <th>Salary</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Marth</td>
                                            <td><a href="#">Enright</a></td>
                                            <td>Traffic Court Referee</td>
                                            <td>22 Jun 1972</td>
                                            <td><span class="label label-success">Active</span></td>
                                            <td>$85,600</td>
                                        </tr>
                                        <tr>
                                            <td>Jackelyn</td>
                                            <td>Weible</td>
                                            <td><a href="#">Airline Transport Pilot</a></td>
                                            <td>3 Oct 1981</td>
                                            <td><span class="label label-default">Inactive</span></td>
                                            <td>$106,450</td>
                                        </tr>
                                        <tr>
                                            <td>Aura</td>
                                            <td>Hard</td>
                                            <td>Business Services Sales Representative</td>
                                            <td>19 Apr 1969</td>
                                            <td><span class="label label-danger">Suspended</span></td>
                                            <td>$237,500</td>
                                        </tr>
                                        <tr>
                                            <td>Nathalie</td>
                                            <td><a href="#">Pretty</a></td>
                                            <td>Drywall Stripper</td>
                                            <td>13 Dec 1977</td>
                                            <td><span class="label label-info">Pending</span></td>
                                            <td>$198,500</td>
                                        </tr>
                                        <tr>
                                            <td>Sharan</td>
                                            <td>Leland</td>
                                            <td>Aviation Tactical Readiness Officer</td>
                                            <td>30 Dec 1991</td>
                                            <td><span class="label label-default">Inactive</span></td>
                                            <td>$470,600</td>
                                        </tr>
                                        <tr>
                                            <td>Maxine</td>
                                            <td><a href="#">Woldt</a></td>
                                            <td><a href="#">Business Services Sales Representative</a></td>
                                            <td>17 Oct 1987</td>
                                            <td><span class="label label-info">Pending</span></td>
                                            <td>$90,560</td>
                                        </tr>
                                        <tr>
                                            <td>Sylvia</td>
                                            <td><a href="#">Mcgaughy</a></td>
                                            <td>Hemodialysis Technician</td>
                                            <td>11 Nov 1983</td>
                                            <td><span class="label label-danger">Suspended</span></td>
                                            <td>$103,600</td>
                                        </tr>
                                        <tr>
                                            <td>Lizzee</td>
                                            <td><a href="#">Goodlow</a></td>
                                            <td>Technical Services Librarian</td>
                                            <td>1 Nov 1961</td>
                                            <td><span class="label label-danger">Suspended</span></td>
                                            <td>$205,500</td>
                                        </tr>
                                        <tr>
                                            <td>Kennedy</td>
                                            <td>Haley</td>
                                            <td>Senior Marketing Designer</td>
                                            <td>18 Dec 1960</td>
                                            <td><span class="label label-success">Active</span></td>
                                            <td>$137,500</td>
                                        </tr>
                                        <tr>
                                            <td>Chantal</td>
                                            <td><a href="#">Nailor</a></td>
                                            <td>Technical Services Librarian</td>
                                            <td>10 Jan 1980</td>
                                            <td><span class="label label-default">Inactive</span></td>
                                            <td>$372,000</td>
                                        </tr>
                                        <tr>
                                            <td>Delma</td>
                                            <td>Bonds</td>
                                            <td>Lead Brand Manager</td>
                                            <td>21 Dec 1968</td>
                                            <td><span class="label label-info">Pending</span></td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr>
                                            <td>Roland</td>
                                            <td>Salmos</td>
                                            <td><a href="#">Senior Program Developer</a></td>
                                            <td>5 Jun 1986</td>
                                            <td><span class="label label-default">Inactive</span></td>
                                            <td>$433,060</td>
                                        </tr>
                                        <tr>
                                            <td>Coy</td>
                                            <td>Wollard</td>
                                            <td>Customer Service Operator</td>
                                            <td>12 Oct 1982</td>
                                            <td><span class="label label-success">Active</span></td>
                                            <td>$86,000</td>
                                        </tr>
                                        <tr>
                                            <td>Maxwell</td>
                                            <td>Maben</td>
                                            <td>Regional Representative</td>
                                            <td>25 Feb 1988</td>
                                            <td><span class="label label-danger">Suspended</span></td>
                                            <td>$130,500</td>
                                        </tr>
                                        <tr>
                                            <td>Cicely</td>
                                            <td>Sigler</td>
                                            <td><a href="#">Senior Research Officer</a></td>
                                            <td>15 Mar 1960</td>
                                            <td><span class="label label-info">Pending</span></td>
                                            <td>$159,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div id="editor"></div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="load_history">
                            <div class="panel border-teal-300">
                                <div class="panel-heading bg-teal-300 ">
                                    <h5 class="panel-title">Loan History</h5>

                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <div class="content-group-lg">
                                            <h6 class="text-semibold">Date range</h6>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <p><input type="text"   class="form-control datepicker" id="rangeDemoStart" placeholder="Start date"></p>
                                                </div>

                                                <div class="col-md-5">
                                                    <p><input type="text" data-provide="datepicker" class="form-control datepicker" id="rangeDemoFinish" placeholder="Finish date"></p>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-sm btn-info">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content-group-lg pull-right">
                                            <h6 class="text-semibold">.</h6>
                                            <button class="btn btn-sm bg-purple" id="pdfButton"> <i class=" icon-file-pdf position-left"></i> Pdf</button>
                                            <button class="btn btn-sm bg-primary-700"> <i class="icon-printer2 position-left"></i> Print</button>

                                        </div>

                                    </div>

                                </div>
                                <table class="table table-xs datatable-button-html5-columns " id="pdfContent">

                                    <thead>
                                    <tr style="display: none">
                                        <th colspan="6">
                                            <div class="row">
                                                <div class="col-md-2" >
                                                    <img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" class=" img-responsive" alt="" style="width: 100px; height: 80px; margin-top: 20px;">
                                                </div>
                                                <div class="col-md-8 col-md-offset-1 text-center">
                                                    <h3 class="text-bold">Micro Finance Project</h3>
                                                    <p>17/ka Pc Culture Samoliy Dhaka-1207 </p>
                                                    <p><b>Phone No: </b> 01731909035 <b>Email: </b> laravel.devbose@gmail.com</p>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>


                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Job Title</th>
                                        <th>DOB</th>
                                        <th>Status</th>
                                        <th>Salary</th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Marth</td>
                                        <td><a href="#">Enright</a></td>
                                        <td>Traffic Court Referee</td>
                                        <td>22 Jun 1972</td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td>$85,600</td>
                                    </tr>
                                    <tr>
                                        <td>Jackelyn</td>
                                        <td>Weible</td>
                                        <td><a href="#">Airline Transport Pilot</a></td>
                                        <td>3 Oct 1981</td>
                                        <td><span class="label label-default">Inactive</span></td>
                                        <td>$106,450</td>
                                    </tr>
                                    <tr>
                                        <td>Aura</td>
                                        <td>Hard</td>
                                        <td>Business Services Sales Representative</td>
                                        <td>19 Apr 1969</td>
                                        <td><span class="label label-danger">Suspended</span></td>
                                        <td>$237,500</td>
                                    </tr>
                                    <tr>
                                        <td>Nathalie</td>
                                        <td><a href="#">Pretty</a></td>
                                        <td>Drywall Stripper</td>
                                        <td>13 Dec 1977</td>
                                        <td><span class="label label-info">Pending</span></td>
                                        <td>$198,500</td>
                                    </tr>
                                    <tr>
                                        <td>Sharan</td>
                                        <td>Leland</td>
                                        <td>Aviation Tactical Readiness Officer</td>
                                        <td>30 Dec 1991</td>
                                        <td><span class="label label-default">Inactive</span></td>
                                        <td>$470,600</td>
                                    </tr>
                                    <tr>
                                        <td>Maxine</td>
                                        <td><a href="#">Woldt</a></td>
                                        <td><a href="#">Business Services Sales Representative</a></td>
                                        <td>17 Oct 1987</td>
                                        <td><span class="label label-info">Pending</span></td>
                                        <td>$90,560</td>
                                    </tr>
                                    <tr>
                                        <td>Sylvia</td>
                                        <td><a href="#">Mcgaughy</a></td>
                                        <td>Hemodialysis Technician</td>
                                        <td>11 Nov 1983</td>
                                        <td><span class="label label-danger">Suspended</span></td>
                                        <td>$103,600</td>
                                    </tr>
                                    <tr>
                                        <td>Lizzee</td>
                                        <td><a href="#">Goodlow</a></td>
                                        <td>Technical Services Librarian</td>
                                        <td>1 Nov 1961</td>
                                        <td><span class="label label-danger">Suspended</span></td>
                                        <td>$205,500</td>
                                    </tr>
                                    <tr>
                                        <td>Kennedy</td>
                                        <td>Haley</td>
                                        <td>Senior Marketing Designer</td>
                                        <td>18 Dec 1960</td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td>$137,500</td>
                                    </tr>
                                    <tr>
                                        <td>Chantal</td>
                                        <td><a href="#">Nailor</a></td>
                                        <td>Technical Services Librarian</td>
                                        <td>10 Jan 1980</td>
                                        <td><span class="label label-default">Inactive</span></td>
                                        <td>$372,000</td>
                                    </tr>
                                    <tr>
                                        <td>Delma</td>
                                        <td>Bonds</td>
                                        <td>Lead Brand Manager</td>
                                        <td>21 Dec 1968</td>
                                        <td><span class="label label-info">Pending</span></td>
                                        <td>$162,700</td>
                                    </tr>
                                    <tr>
                                        <td>Roland</td>
                                        <td>Salmos</td>
                                        <td><a href="#">Senior Program Developer</a></td>
                                        <td>5 Jun 1986</td>
                                        <td><span class="label label-default">Inactive</span></td>
                                        <td>$433,060</td>
                                    </tr>
                                    <tr>
                                        <td>Coy</td>
                                        <td>Wollard</td>
                                        <td>Customer Service Operator</td>
                                        <td>12 Oct 1982</td>
                                        <td><span class="label label-success">Active</span></td>
                                        <td>$86,000</td>
                                    </tr>
                                    <tr>
                                        <td>Maxwell</td>
                                        <td>Maben</td>
                                        <td>Regional Representative</td>
                                        <td>25 Feb 1988</td>
                                        <td><span class="label label-danger">Suspended</span></td>
                                        <td>$130,500</td>
                                    </tr>
                                    <tr>
                                        <td>Cicely</td>
                                        <td>Sigler</td>
                                        <td><a href="#">Senior Research Officer</a></td>
                                        <td>15 Mar 1960</td>
                                        <td><span class="label label-info">Pending</span></td>
                                        <td>$159,000</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div id="editor"></div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="other">

                            <!-- Orders history -->
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Orders history</h6>
                                    <div class="heading-elements">
                                        <span class="heading-text"><i class="icon-arrow-down22 text-danger"></i> <span class="text-semibold">- 29.4%</span></span>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div class="chart-container">
                                        <div class="chart" id="visits" style="height: 300px;"></div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th colspan="2">Product name</th>
                                            <th>Size</th>
                                            <th>Colour</th>
                                            <th>Article number</th>
                                            <th>Units</th>
                                            <th>Price</th>
                                            <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="active border-double">
                                            <td colspan="7" class="text-semibold">New orders</td>
                                            <td class="text-right">
                                                <span class="badge badge-default">24</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="no-padding-right" style="width: 45px;">
                                                <a href="#">
                                                    <img src="{{ asset('public/backend/assets') }}/images/placeholder.jpg" height="60" class="" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-semibold">Fathom Backpack</a>
                                                <div class="text-muted text-size-small">
                                                    <span class="status-mark bg-grey position-left"></span>
                                                    Processing
                                                </div>
                                            </td>
                                            <td>34cm x 29cm</td>
                                            <td>Orange</td>
                                            <td>
                                                <a href="#">1237749</a>
                                            </td>
                                            <td>1</td>
                                            <td>
                                                <h6 class="no-margin text-semibold">&euro; 79.00</h6>
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                            <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                            <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="no-padding-right">
                                                <a href="#">
                                                    <img src="{{ asset('public/backend/assets') }}/images/placeholder.jpg" height="60" class="" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-semibold">Mystery Air Long Sleeve T Shirt</a>
                                                <div class="text-muted text-size-small">
                                                    <span class="status-mark bg-grey position-left"></span>
                                                    Processing
                                                </div>
                                            </td>
                                            <td>L</td>
                                            <td>Process Red</td>
                                            <td>
                                                <a href="#">345634</a>
                                            </td>
                                            <td>1</td>
                                            <td>
                                                <h6 class="no-margin text-semibold">&euro; 38.00</h6>
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                            <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                            <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="no-padding-right">
                                                <a href="#">
                                                    <img src="{{ asset('public/backend/assets') }}/images/placeholder.jpg" height="60" class="" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-semibold">Women’s Prospect Backpack</a>
                                                <div class="text-muted text-size-small">
                                                    <span class="status-mark bg-grey position-left"></span>
                                                    Processing
                                                </div>
                                            </td>
                                            <td>46cm x 28cm</td>
                                            <td>Neu Nordic Print</td>
                                            <td>
                                                <a href="#">5739584</a>
                                            </td>
                                            <td>1</td>
                                            <td>
                                                <h6 class="no-margin text-semibold">&euro; 60.00</h6>
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                            <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                            <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="no-padding-right">
                                                <a href="#">
                                                    <img src="{{ asset('public/backend/assets') }}/images/placeholder.jpg" height="60" class="" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-semibold">Overlook Short Sleeve T Shirt</a>
                                                <div class="text-muted text-size-small">
                                                    <span class="status-mark bg-grey position-left"></span>
                                                    Processing
                                                </div>
                                            </td>
                                            <td>M</td>
                                            <td>Gray Heather</td>
                                            <td>
                                                <a href="#">434450</a>
                                            </td>
                                            <td>1</td>
                                            <td>
                                                <h6 class="no-margin text-semibold">&euro; 35.00</h6>
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                            <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                            <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr class="active border-double">
                                            <td colspan="7" class="text-semibold">Shipped orders</td>
                                            <td class="text-right">
                                                <span class="badge bg-success">42</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="no-padding-right">
                                                <a href="#">
                                                    <img src="{{ asset('public/backend/assets') }}/images/placeholder.jpg" height="60" class="" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-semibold">Infinite Ride Liner</a>
                                                <div class="text-muted text-size-small">
                                                    <span class="status-mark bg-success position-left"></span>
                                                    Shipped
                                                </div>
                                            </td>
                                            <td>43</td>
                                            <td>Black</td>
                                            <td>
                                                <a href="#">34739</a>
                                            </td>
                                            <td>1</td>
                                            <td>
                                                <h6 class="no-margin text-semibold">&euro; 210.00</h6>
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                            <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                            <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="no-padding-right">
                                                <a href="#">
                                                    <img src="{{ asset('public/backend/assets') }}/images/placeholder.jpg" height="60" class="" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-semibold">Custom Snowboard</a>
                                                <div class="text-muted text-size-small">
                                                    <span class="status-mark bg-success position-left"></span>
                                                    Shipped
                                                </div>
                                            </td>
                                            <td>151</td>
                                            <td>Black/Blue</td>
                                            <td>
                                                <a href="#">5574832</a>
                                            </td>
                                            <td>1</td>
                                            <td>
                                                <h6 class="no-margin text-semibold">&euro; 600.00</h6>
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                            <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                            <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="no-padding-right">
                                                <a href="#">
                                                    <img src="{{ asset('public/backend/assets') }}/images/placeholder.jpg" height="60" class="" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-semibold">Kids' Day Hiker 20L Backpack</a>
                                                <div class="text-muted text-size-small">
                                                    <span class="status-mark bg-success position-left"></span>
                                                    Shipped
                                                </div>
                                            </td>
                                            <td>24cm x 29cm</td>
                                            <td>Figaro Stripe</td>
                                            <td>
                                                <a href="#">6684902</a>
                                            </td>
                                            <td>1</td>
                                            <td>
                                                <h6 class="no-margin text-semibold">&euro; 55.00</h6>
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                            <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                            <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="no-padding-right">
                                                <a href="#">
                                                    <img src="{{ asset('public/backend/assets') }}/images/placeholder.jpg" height="60" class="" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-semibold">Lunch Sack</a>
                                                <div class="text-muted text-size-small">
                                                    <span class="status-mark bg-success position-left"></span>
                                                    Shipped
                                                </div>
                                            </td>
                                            <td>24cm x 20cm</td>
                                            <td>Junk Food Print</td>
                                            <td>
                                                <a href="#">5574829</a>
                                            </td>
                                            <td>1</td>
                                            <td>
                                                <h6 class="no-margin text-semibold">&euro; 20.00</h6>
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                            <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                            <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="no-padding-right">
                                                <a href="#">
                                                    <img src="{{ asset('public/backend/assets') }}/images/placeholder.jpg" height="60" class="" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-semibold">Cambridge Jacket</a>
                                                <div class="text-muted text-size-small">
                                                    <span class="status-mark bg-success position-left"></span>
                                                    Shipped
                                                </div>
                                            </td>
                                            <td>XL</td>
                                            <td>Nomad/Railroad</td>
                                            <td>
                                                <a href="#">475839</a>
                                            </td>
                                            <td>1</td>
                                            <td>
                                                <h6 class="no-margin text-semibold">&euro; 175.00</h6>
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                            <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                            <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="no-padding-right">
                                                <a href="#">
                                                    <img src="{{ asset('public/backend/assets') }}/images/placeholder.jpg" height="60" class="" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-semibold">Covert Jacket</a>
                                                <div class="text-muted text-size-small">
                                                    <span class="status-mark bg-success position-left"></span>
                                                    Shipped
                                                </div>
                                            </td>
                                            <td>XXL</td>
                                            <td>Mocha/Glacier Sierra</td>
                                            <td>
                                                <a href="#">589439</a>
                                            </td>
                                            <td>1</td>
                                            <td>
                                                <h6 class="no-margin text-semibold">&euro; 126.00</h6>
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                            <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                            <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr class="active border-double">
                                            <td colspan="7" class="text-semibold">Cancelled orders</td>
                                            <td class="text-right">
                                                <span class="badge bg-danger">9</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="no-padding-right">
                                                <a href="#">
                                                    <img src="{{ asset('public/backend/assets') }}/images/placeholder.jpg" height="60" class="" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-semibold">Day Hiker Pinnacle 31L Backpack</a>
                                                <div class="text-muted text-size-small">
                                                    <span class="status-mark bg-danger position-left"></span>
                                                    Cancelled
                                                </div>
                                            </td>
                                            <td>42cm x 26.5cm</td>
                                            <td>Blotto Ripstop</td>
                                            <td>
                                                <a href="#">5849305</a>
                                            </td>
                                            <td>1</td>
                                            <td>
                                                <h6 class="no-margin text-semibold">&euro; 130.00</h6>
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                            <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                            <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="no-padding-right">
                                                <a href="#">
                                                    <img src="{{ asset('public/backend/assets') }}/images/placeholder.jpg" height="60" class="" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-semibold">Kids' Gromlet Backpack</a>
                                                <div class="text-muted text-size-small">
                                                    <span class="status-mark bg-danger position-left"></span>
                                                    Cancelled
                                                </div>
                                            </td>
                                            <td>22cm x 20cm</td>
                                            <td>Slime Camo Print</td>
                                            <td>
                                                <a href="#">4438495</a>
                                            </td>
                                            <td>1</td>
                                            <td>
                                                <h6 class="no-margin text-semibold">&euro; 35.00</h6>
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                            <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                            <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="no-padding-right">
                                                <a href="#">
                                                    <img src="{{ asset('public/backend/assets') }}/images/placeholder.jpg" height="60" class="" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-semibold">Tinder Backpack</a>
                                                <div class="text-muted text-size-small">
                                                    <span class="status-mark bg-danger position-left"></span>
                                                    Cancelled
                                                </div>
                                            </td>
                                            <td>42cm x 26cm</td>
                                            <td>Dark Tide Twill</td>
                                            <td>
                                                <a href="#">4759383</a>
                                            </td>
                                            <td>2</td>
                                            <td>
                                                <h6 class="no-margin text-semibold">&euro; 180.00</h6>
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                            <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                            <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="no-padding-right">
                                                <a href="#">
                                                    <img src="{{ asset('public/backend/assets') }}/images/placeholder.jpg" height="60" class="" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-semibold">Almighty Snowboard Boot</a>
                                                <div class="text-muted text-size-small">
                                                    <span class="status-mark bg-danger position-left"></span>
                                                    Cancelled
                                                </div>
                                            </td>
                                            <td>45</td>
                                            <td>Multiweave</td>
                                            <td>
                                                <a href="#">34432</a>
                                            </td>
                                            <td>1</td>
                                            <td>
                                                <h6 class="no-margin text-semibold">&euro; 370.00</h6>
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
                                                            <li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
                                                            <li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /orders history -->

                        </div>
                    </div>
                    <!-- /tab content -->

                </div>
            </div>
            <!-- /detached content -->
        </div>


</div>
@endsection

@section('custom_script')
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pdf/jspdf.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/custom/js/pdf.js') }}"></script>
    <script>$('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
        });</script>
@endsection