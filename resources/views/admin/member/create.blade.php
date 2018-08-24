@extends('layouts.app')

@section('title', 'Create Member')

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
@endsection

@section('content')
<div class="content">


    <!-- Wizard with validation -->
    <div class="panel border-success">
        <div class="panel-heading bg-success-400">
            <h6 class="panel-title">Add New Member</h6>

        </div>

        <form class="stepy-validation" action="#">
            <fieldset title="A">

                <legend class="text-semibold ">Account Information </legend>
                <div class="row" >
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Member Id: <span class="text-danger">*</span></label>
                            <input type="text" name="member_id" class="form-control required" placeholder="Member Id">
                        </div>

                        <div class="form-group  has-feedback">
                            <label>Opening Date: <span class="text-danger">*</span></label>
                            <input type="text" name="opening_date" class="form-control required datepicker" placeholder="Account Opening Date">
                            <div class="form-control-feedback" style="background-color: #ddd; top: 27px;">
                                <i class="icon-calendar2"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Area: </label>
                            <input type="text" name="area" class="form-control required" placeholder="Area Name">

                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Instalment Type: <span class="text-danger">*</span></label>
                            <select name="location" data-placeholder="Select position" class="select required">
                                <option></option>
                                <optgroup label="North America">
                                    <option value="1">United States</option>
                                    <option value="2">Canada</option>
                                </optgroup>

                                <optgroup label="Latin America">
                                    <option value="3">Chile</option>
                                    <option value="4">Argentina</option>
                                    <option value="5">Colombia</option>
                                    <option value="6">Peru</option>
                                </optgroup>

                                <optgroup label="Europe">
                                    <option value="8"><Cro> </Cro>atia</option>
                                    <option value="9">Hungary</option>
                                    <option value="10">Ukraine</option>
                                    <option value="11">Greece</option>
                                </optgroup>

                                <optgroup label="Middle East &amp; Africa">
                                    <option value="21">Egypt</option>
                                    <option value="22">Israel</option>
                                    <option value="23">Nigeria</option>
                                    <option value="24">United Arab Emirates</option>
                                </optgroup>

                                <optgroup label="Asia Pacific">
                                    <option value="26">Australia</option>
                                    <option value="27">China</option>
                                    <option value="28">India</option>
                                    <option value="29">Singapore</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Instalment Amount: <span class="text-danger">*</span> </label>
                            <input type="number" name="inst_amount" class="form-control required" placeholder="0.00 Tk">
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset title="P">
                <legend class="text-semibold">Personal Information</legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Account Holder Name: <span class="text-danger">*</span></label>
                            <input type="text" name="name" placeholder="Account Name" class="form-control required input-sm">
                        </div>
                        <div class="form-group">
                            <label>Mother Name: <span class="text-danger">*</span></label>
                            <input type="text" name="mother_name" placeholder="Mother Name" class="form-control required input-sm">
                        </div>
                        <div class="form-group  has-feedback">
                            <label>Date Of Birth: <span class="text-danger">*</span></label>
                            <input type="text" name="birth_date" class="form-control required datepicker input-sm" placeholder="Date of Birth">
                            <div class="form-control-feedback" style="background-color: #ddd; top: 27px;">
                                <i class="icon-calendar2"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>NID Number: <span class="text-danger">*</span></label>
                            <input type="number" name="nid_num" placeholder="Account Holder NID Number" class="form-control input-sm required">
                        </div>

                        <div class="form-group">
                            <label>Phone Number: <span class="text-danger">*</span></label>
                            <input type="number" name="phone_no" placeholder="Phone Number" class="form-control required input-sm">
                        </div>
                        <div class="form-group">
                            <label>Email Address: </label>
                            <input type="email" name="email" placeholder="Email Address" class="form-control input-sm ">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Father Name: <span class="text-danger">*</span></label>
                            <input type="text" name="father_name" placeholder="Father Name" class="form-control required input-sm">
                        </div>

                        <div class="form-group">
                            <label>Spouse Name: <span class="text-danger">*</span></label>
                            <input type="text" name="spouse_name" placeholder="Spouse Name" class="form-control required input-sm">
                        </div>

                        <div class="form-group">
                            <label>Present Address: <span class="text-danger">*</span></label>
                            <textarea name="present_address" rows="4" cols="4" placeholder="Account holder Present Address" class="form-control required input-sm"></textarea>
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
                            <textarea name="per_address" rows="4" cols="4" placeholder="Account holder Permanent Address" class="form-control input-sm"></textarea>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset title="E & N">
                <legend class="text-semibold">Emergency & Nominee Information</legend>
                <div class="row">
                    <div class="col-md-6">

                        <div class="well">

                            <label class="text-semibold" style="background-color: #9ed9fbe3; color: #0D47A1; padding: 10px; display: block; border-radius: 5px;">Emergency Contact </label>
                            <div class="form-group">
                                <label>Name: <span class="text-danger">*</span></label>
                                <input type="text" name="emg_name" placeholder="Name" class="form-control required input-sm">
                            </div>

                            <div class="form-group">
                                <label>Relation: <span class="text-danger">*</span></label>
                                <input type="text" name="emg_relation" placeholder="Relation with account holder" class="form-control required input-sm">
                            </div>

                            <div class="form-group">
                                <label>Phone Number: <span class="text-danger">*</span></label>
                                <input type="number" name="emg_phone_no" placeholder="Phone number" class="form-control required input-sm">
                            </div>
                            <div class="form-group">
                                <label>Email Address: </label>
                                <input type="email" name="emg_email" placeholder="Email address" class="form-control input-sm ">
                            </div>

                            <div class="form-group">
                                <label>Address: <span class="text-danger">*</span></label>
                                <textarea name="emg_address" rows="2" cols="2" placeholder="Account holder present address" class="form-control required input-sm"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="well">
                            <label class="text-semibold" style="background-color: #9ed9fbe3; color: #0D47A1; padding: 10px; display: block; border-radius: 5px;">Nominee Information </label>
                            <div class="form-group">
                                <label>Name: <span class="text-danger">*</span></label>
                                <input type="text" name="nomi_name" placeholder="Nominee name" class="form-control required input-sm">
                            </div>

                            <div class="form-group">
                                <label>Relation: <span class="text-danger">*</span></label>
                                <input type="text" name="nomi_relation" placeholder="Relation with account holder" class="form-control required input-sm">
                            </div>

                            <div class="form-group">
                                <label>Phone Number: <span class="text-danger">*</span></label>
                                <input type="number" name="nomi_phone_no" placeholder="Phone number" class="form-control required input-sm">
                            </div>
                            <div class="form-group">
                                <label>Email Address: </label>
                                <input type="email" name="nomi_email" placeholder="Email address" class="form-control input-sm ">
                            </div>

                            <div class="form-group">
                                <label>Address: <span class="text-danger">*</span></label>
                                <textarea name="nomi_address" rows="2" cols="2" placeholder="Account holder Present Address" class="form-control required input-sm"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset title="Ad">
                <legend class="text-semibold">Additional info</legend>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="display-block">Applicant resume:</label>
                            <input type="file" name="resume" class="file-styled">
                            <span class="help-block">Accepted formats: pdf, doc. Max file size 2Mb</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Where did you find us? <span class="text-danger">*</span></label>
                            <select name="source" data-placeholder="Choose an option..." class="select-simple required">
                                <option></option>
                                <option value="monster">Monster.com</option>
                                <option value="linkedin">LinkedIn</option>
                                <option value="google">Google</option>
                                <option value="adwords">Google AdWords</option>
                                <option value="other">Other source</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Availability: <span class="text-danger">*</span></label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="availability" class="styled required">
                                    Immediately
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="availability" class="styled">
                                    1 - 2 weeks
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="availability" class="styled">
                                    3 - 4 weeks
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="availability" class="styled">
                                    More than 1 month
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Additional information:</label>
                            <textarea name="additional-info" rows="5" cols="5" placeholder="If you want to add any info, do it here." class="form-control"></textarea>
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