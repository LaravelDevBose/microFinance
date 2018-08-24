@extends('layouts.app')

@section('title', 'Add New Employee')

@section('assetFile')
    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/wizards/stepy.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/libraries/jasny_bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/validation/validate.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/wizard_stepy.js') }}"></script>
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


        <!-- Wizard with validation -->
        <div class="panel border-success">
            <div class="panel-heading bg-success-400">
                <h6 class="panel-title">Add New Employee</h6>

            </div>

            <form class="stepy-validation" action="#">
                <fieldset title="A">

                    <legend class="text-semibold ">Job Information </legend>

                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Employee Id: <span class="text-danger">*</span></label>
                                <div class="input-group-xs">
                                    <input type="text" name="emply_id" class="form-control required" required placeholder="Employee Id">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Employee Name: <span class="text-danger">*</span></label>
                                <div class="input-group-xs">
                                    <input type="text" name="emply_name" class="form-control required" required placeholder="Employee Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Designation: <span class="text-danger">*</span></label>
                                <div class="input-group-xs">
                                    <select name="desig" data-placeholder="Select a Designation" required class="select required">
                                        <option></option>
                                        <optgroup label="North America">
                                            <option value="1">United States</option>
                                            <option value="2">Canada</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Department: <span class="text-danger">*</span></label>
                                <div class="input-group-xs">
                                    <select name="department" data-placeholder="Select a Department" required class="select required">
                                        <option></option>
                                        <optgroup label="North America">
                                            <option value="1">United States</option>
                                            <option value="2">Canada</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group  has-feedback">
                                <label>Joining Date: <span class="text-danger">*</span></label>
                                <div class="input-group input-group-xs">
                                    <input type="text" name="joining_date" class="form-control datepicker required " placeholder="Joining Date">
                                    <span class="input-group-addon datepicker"><i class="icon-calendar2"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Salary Range: </label>
                                <div class="input-group-xs">
                                    <input type="number" name="salary" class="form-control required" required placeholder="0.00 Tk">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Activation Status: <span class="text-danger">*</span></label>
                                <div class="input-group-xs">
                                    <select name="status" data-placeholder="Select a Status" required class="select required">
                                        <option></option>
                                        <optgroup label="North America">
                                            <option value="1">United States</option>
                                            <option value="2">Canada</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <fieldset title="P">
                    <legend class="text-semibold">Personal Information</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Father Name: <span class="text-danger">*</span></label>
                                <div class="input-group-xs">
                                    <input type="text" name="father_name" placeholder="Father Name" required class="form-control required input-sm">
                                </div>
                            </div>
                            <div class="form-group  has-feedback">
                                <label>Date Of Birth: <span class="text-danger">*</span></label>
                                <div class="input-group input-group-xs">
                                    <input type="text" name="joining_date" class="form-control datepicker required " required placeholder="Joining Date">
                                    <span class="input-group-addon datepicker"><i class="icon-calendar2"></i></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Gender: <span class="text-danger">*</span></label>
                                <div class="input-group-xs">
                                    <select name="desig" data-placeholder="Select a Designation" required class="select required">
                                        <option></option>
                                        <optgroup label="North America">
                                            <option value="1">United States</option>
                                            <option value="2">Canada</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mother Name: <span class="text-danger">*</span></label>
                                <div class="input-group-xs">
                                    <input type="text" name="mother_name" placeholder="Mother Name" required class="form-control required input-sm">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Marital Status: <span class="text-danger">*</span></label>
                                <div class="input-group-xs">
                                    <select name="desig" data-placeholder="Select a Designation" required class="select required">
                                        <option></option>
                                        <optgroup label="North America">
                                            <option value="1">United States</option>
                                            <option value="2">Canada</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <fieldset title="C">
                    <legend class="text-semibold">Contact Information</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NID Number: <span class="text-danger">*</span></label>
                                <div class="input-group-xs">
                                    <input type="number" name="nid_num" placeholder="NID Number" required class="form-control required input-sm">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Phone Number: <span class="text-danger">*</span></label>
                                <div class="input-group-xs">
                                    <input type="number" name="phone_no" placeholder="Phone Number" class="form-control required input-sm">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Address: </label>
                                <div class="input-group-xs">
                                    <input type="email" name="email" placeholder="Email Address" class="form-control input-sm ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Present Address: <span class="text-danger">*</span></label>
                                <textarea name="present_address" rows="4" cols="4" placeholder="Employee Present Address" class="form-control required input-sm"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="styled" checked="checked">
                                        Same as Present Address
                                    </label>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Permanent Address: </label>
                                <textarea name="per_address" rows="4" cols="4" placeholder="Employee Permanent Address" class="form-control input-sm"></textarea>
                            </div>
                        </div>

                    </div>
                </fieldset>

                <button type="submit" class="btn btn-primary stepy-finish">Submit <i class="icon-check position-right"></i></button>
            </form>
        </div>
        <!-- /wizard with validation -->

    </div>
@endsection

@section('custom_script')

    <script>$('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
        });</script>
@endsection