@extends('layouts.app')

@section('title','Edit Admin Information')

@section('assetFile')
    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/form_layouts.js') }}"></script>

    <!-- /theme JS files -->
    <style>
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
        <div class="panel border-info-400">
            <div class="panel-heading bg-info-300 ">
                <h5 class="panel-title">Edit Admin Information</h5>

            </div>
            <div class="panel-body">
                <form action="#"  class="form-horizontal">
                    <div class="row " >
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-lg-4 control-label" >Full Name: <span class="text-danger text-bold ">*</span></label>
                                <div class="col-md-8">
                                    <div class="input-group-xs">
                                        <input type="text" name="full_name" class="form-control required " required placeholder="Full Name">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label" >Email Address: <span class="text-danger text-bold ">*</span></label>
                                <div class="col-md-8">
                                    <div class="input-group-xs">
                                        <input type="email" name="email" class="form-control required " required placeholder="Email Address">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label" >Password: <span class="text-danger text-bold ">*</span></label>
                                <div class="col-md-8">
                                    <div class="input-group-xs">
                                        <input type="password" name="password" minlength="6" class="form-control required " required placeholder="Your Password">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-lg-4 control-label" >Activation Status: <span class="text-danger text-bold">*</span></label>
                                <div class="col-md-8 input-group-sm">
                                    <div class="input-group-xs">
                                        <select name="status"  data-placeholder="Select a Activation Status" required class="select required">
                                            <option></option>
                                            <option value="0">De-Active</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-lg-4 control-label" >User Name: <span class="text-danger text-bold ">*</span></label>
                                <div class="col-md-8">
                                    <div class="input-group-xs">
                                        <input type="text" name="username" class="form-control required " minlength="3" required placeholder="User Name">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label" >Phone Number: <span class="text-danger text-bold ">*</span></label>
                                <div class="col-md-8">
                                    <div class="input-group-xs">
                                        <input type="number" name="phone_num" class="form-control required " required placeholder="Phone Number">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label" >Confirm Password: <span class="text-danger text-bold ">*</span></label>
                                <div class="col-md-8">
                                    <div class="input-group-xs">
                                        <input type="password" name="password_confirmation" class="form-control required " minlength="6" required placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Submit <i class="icon-check position-right"></i></button>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('custom_script')


@endsection