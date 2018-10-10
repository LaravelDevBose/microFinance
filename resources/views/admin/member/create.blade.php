@extends('layouts.app')

@section('title', 'Create Member')

@section('assetFile')
    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/wizards/stepy.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/libraries/jasny_bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/validation/validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/wizard_stepy.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/uploader_bootstrap.js') }}"></script>
    <!-- /theme JS files -->
@endsection

@section('content')
<div class="content">


    <!-- Wizard with validation -->
    <div class="panel border-success">
        <div class="panel-heading bg-success-400">
            <h6 class="panel-title">Add New Member</h6>

        </div>

        <form class="stepy-validation" action="{{ route('member.store') }}"  method="POST" enctype="multipart/form-data">
            {{ csrf_field()  }}
            <fieldset title="A">

                <legend class="text-semibold ">Account Information </legend>
                <div class="row" >
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Member Id: <span class="text-danger">*</span></label>
                            <input type="text" name="mem_code" value="{{ $m_id }}" class="form-control required" required placeholder="Member Id">
                        </div>

                        <div class="form-group  has-feedback">
                            <label>Opening Date: <span class="text-danger">*</span></label>
                            <input type="text" name="opening_date" value="{{ old('opening_date') }}" required class="form-control required datepicker" placeholder="Account Opening Date">
                            <div class="form-control-feedback" style="background-color: #ddd; top: 27px;">
                                <i class="icon-calendar2"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Area: </label>
                            <input type="text" name="area" value="{{ old('area') }}" required class="form-control required" placeholder="Area Name">

                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Instalment Type: <span class="text-danger">*</span></label>
                            <select name="instalment_type" required data-placeholder="Select position" class="select required">
                                <option></option>
                                <optgroup label="North America" >
                                    <option value="1">United States</option>
                                    <option value="2">Canada</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inst_amount">Instalment Amount: <span class="text-danger">*</span> </label>
                            <input type="number" id="inst_amount" name="inst_amount" value="{{ old('inst_amount') }}" required class="form-control required" placeholder="0.00 Tk">
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
                            <input type="text" name="m_name" value="{{ old('m_name') }}" required placeholder="Account Name" class="form-control required input-sm">
                        </div>
                        <div class="form-group">
                            <label>Mother Name: <span class="text-danger">*</span></label>
                            <input type="text" name="mother_name"  value="{{ old('mother_name') }}" required placeholder="Mother Name" class="form-control required input-sm">
                        </div>
                        <div class="form-group  has-feedback">
                            <label>Date Of Birth: <span class="text-danger">*</span></label>
                            <input type="text" name="dob" value="{{ old('dob') }}" required class="form-control required datepicker input-sm" placeholder="Date of Birth">
                            <div class="form-control-feedback" style="background-color: #ddd; top: 27px;">
                                <i class="icon-calendar2"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>NID Number: <span class="text-danger">*</span></label>
                            <input type="number" name="nid_number" value="{{ old('nid_number') }}" required placeholder="Account Holder NID Number" class="form-control input-sm required">
                        </div>

                        <div class="form-group">
                            <label>Phone Number: <span class="text-danger">*</span></label>
                            <input type="number" name="phone_number" value="{{ old('phone_number') }}" required placeholder="Phone Number" class="form-control required input-sm">
                        </div>
                        <div class="form-group">
                            <label>Email Address: </label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" class="form-control input-sm ">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Father Name: <span class="text-danger">*</span></label>
                            <input type="text" name="father_name" value="{{ old('father_name') }}" required placeholder="Father Name" class="form-control required input-sm">
                        </div>

                        <div class="form-group">
                            <label>Spouse Name: <span class="text-danger">*</span></label>
                            <input type="text" name="spouce_name" value="{{ old('spouce_name') }}" required placeholder="Spouse Name" class="form-control required input-sm">
                        </div>

                        <div class="form-group">
                            <label>Present Address: <span class="text-danger">*</span></label>
                            <textarea name="present_address" rows="4" cols="4" placeholder="Account holder Present Address" class="form-control required input-sm"> {{ old('present_address') }} </textarea>
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
                            <textarea name="premanent_address" rows="4" cols="4" placeholder="Account holder Permanent Address" class="form-control input-sm">{{ old('premanent_address') }}</textarea>
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
                                <input type="text" name="e_name" value="{{ old('e_name') }}" required placeholder="Name" class="form-control required input-sm">
                            </div>

                            <div class="form-group">
                                <label>Relation: <span class="text-danger">*</span></label>
                                <input type="text" name="e_relation" value="{{ old('e_relation') }}" required placeholder="Relation with account holder" class="form-control required input-sm">
                            </div>

                            <div class="form-group">
                                <label>Phone Number: <span class="text-danger">*</span></label>
                                <input type="number" name="e_phone_number" value="{{ old('e_phone_number') }}" required placeholder="Phone number" class="form-control required input-sm">
                            </div>
                            <div class="form-group">
                                <label>Email Address: </label>
                                <input type="email" name="e_email" value="{{ old('e_email') }}"  placeholder="Email address" class="form-control input-sm ">
                            </div>

                            <div class="form-group">
                                <label>Address: <span class="text-danger">*</span></label>
                                <textarea name="e_address" rows="2" cols="2" placeholder="Account holder present address" class="form-control required input-sm">{{ old('e_address') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="well">
                            <label class="text-semibold" style="background-color: #9ed9fbe3; color: #0D47A1; padding: 10px; display: block; border-radius: 5px;">Nominee Information </label>
                            <div class="form-group">
                                <label>Name: <span class="text-danger">*</span></label>
                                <input type="text" name="n_name" value="{{ old('n_name') }}" required placeholder="Nominee name" class="form-control required input-sm">
                            </div>

                            <div class="form-group">
                                <label>Relation: <span class="text-danger">*</span></label>
                                <input type="text" name="n_relation" value="{{ old('n_relation') }}" required placeholder="Relation with account holder" class="form-control required input-sm">
                            </div>

                            <div class="form-group">
                                <label>Phone Number: <span class="text-danger">*</span></label>
                                <input type="number" name="n_phone_number" value="{{ old('n_phone_number') }}" required placeholder="Phone number" class="form-control required input-sm">
                            </div>
                            <div class="form-group">
                                <label>Email Address: </label>
                                <input type="email" name="n_email" value="{{ old('n_email') }}"  placeholder="Email address" class="form-control input-sm ">
                            </div>

                            <div class="form-group">
                                <label>Address: <span class="text-danger">*</span></label>
                                <textarea name="n_address" rows="2" cols="2" placeholder="Account holder Present Address" class="form-control required input-sm">{{ old('n_address') }} </textarea>
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
                            <label class="display-block">Member Image: <span class="text-danger">*</span></label>
                            <input type="file" class="file-input required" name="member_image"  required  data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
                            <span class="help-block">Select member image in max 2 mb.</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="display-block">Member Nid: <span class="text-danger">*</span></label>
                            <input type="file" class="file-input required" name="mamber_nid" required data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
                            <span class="help-block">Select member NID Copy in max 2 mb.</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="display-block">Nominee Image: </label>
                            <input type="file" class="file-input" name="n_image" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
                            <span class="help-block">Select nominee image in max 2 mb.</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Extra Note:</label>
                            <textarea name="extra_note" rows="5" cols="5" placeholder="If you want to add any info, do it here." class="form-control">{{ old('extra_note') }}</textarea>
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