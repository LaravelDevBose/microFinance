@extends('layouts.app')

@section('title', 'Edit Member')

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
    <div class="panel border-info">
        <div class="panel-heading bg-info-400">
            <h6 class="panel-title">Edit Member Information</h6>

        </div>

        <form class="stepy-validation" action="{{ route('member.update', $member->id) }}"  method="POST" enctype="multipart/form-data">
            {{ method_field('PUT')}}
            {{ csrf_field()  }}
            <fieldset title="A">

                <legend class="text-semibold ">Account Information </legend>
                <div class="row" >
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Member Id: <span class="text-danger">*</span></label>
                            <input type="text" name="mem_code" value="{{ $member->account_info->mem_code }}" class="form-control required" required placeholder="Member Id" readonly>
                        </div>

                        <div class="form-group  has-feedback">
                            <label>Opening Date: <span class="text-danger">*</span></label>
                            <?php $date = new DateTime($member->account_info->opening_date); ?>
                            <input type="text" name="opening_date" value="{{ date_format($date, 'd/m/Y') }}" required class="form-control required datepicker" placeholder="Account Opening Date" data-date-format='YYYY-MM-DD'>
                            <div class="form-control-feedback" style="background-color: #ddd; top: 27px;">
                                <i class="icon-calendar2"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Area: </label>
                            <input type="text" name="area" value="{{ $member->account_info->area }}" required class="form-control required" placeholder="Area Name">

                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Instalment Type: <span class="text-danger">*</span></label>
                            <select name="instalment_type" required data-placeholder="Select position" class="select required">
                                <option></option>
                                <optgroup label="North America" >
                                    <option value="1" {{ ($member->account_info->instalment_type == 1)? 'Selected': ' '}}>United States</option>
                                    <option value="2" {{ ($member->account_info->instalment_type == 2)? 'Selected': ' '}} >Canada</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inst_amount">Instalment Amount: <span class="text-danger">*</span> </label>
                            <input type="number" id="inst_amount" name="inst_amount" value="{{ $member->account_info->inst_amount }}" required class="form-control required" placeholder="0.00 Tk">
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
                            <input type="text" name="m_name" value="{{ $member->m_name }}" required placeholder="Account Name" class="form-control required input-sm">
                        </div>
                        <div class="form-group">
                            <label>Mother Name: <span class="text-danger">*</span></label>
                            <input type="text" name="mother_name"  value="{{ $member->mother_name }}" required placeholder="Mother Name" class="form-control required input-sm">
                        </div>
                        <div class="form-group  has-feedback">
                            <label>Date Of Birth: <span class="text-danger">*</span></label>
                            <?php //$date = new DateTime($member->dob); ?>
                            <!-- <input type="text" name="dob" value="{{ date_format($date, 'Y-m-d') }}" required class="form-control required datepicker input-sm" placeholder="Date of Birth"> -->
                            <input type="text" name="dob" value="{{ $member->dob }}" required class="form-control required datepicker input-sm" placeholder="Date of Birth">
                            <div class="form-control-feedback" style="background-color: #ddd; top: 27px;">
                                <i class="icon-calendar2"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>NID Number: <span class="text-danger">*</span></label>
                            <input type="number" name="nid_number" value="{{ $member->nid_number }}" required placeholder="Account Holder NID Number" class="form-control input-sm required">
                        </div>

                        <div class="form-group">
                            <label>Phone Number: <span class="text-danger">*</span></label>
                            <input type="number" name="phone_number" value="{{ $member->phone_number }}" required placeholder="Phone Number" class="form-control required input-sm">
                        </div>
                        <div class="form-group">
                            <label>Email Address: </label>
                            <input type="email" name="email" value="{{ $member->email }}" placeholder="Email Address" class="form-control input-sm ">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Father Name: <span class="text-danger">*</span></label>
                            <input type="text" name="father_name" value="{{ $member->father_name }}" required placeholder="Father Name" class="form-control required input-sm">
                        </div>

                        <div class="form-group">
                            <label>Spouse Name: <span class="text-danger">*</span></label>
                            <input type="text" name="spouce_name" value="{{ $member->spouce_name }}" required placeholder="Spouse Name" class="form-control required input-sm">
                        </div>

                        <div class="form-group">
                            <label>Present Address: <span class="text-danger">*</span></label>
                            <textarea name="present_address" rows="4" cols="4" placeholder="Account holder Present Address" class="form-control required input-sm"> {{ $member->present_address }} </textarea>
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
                            <textarea name="premanent_address" rows="4" cols="4" placeholder="Account holder Permanent Address" class="form-control input-sm">{{ $member->premanent_address }}</textarea>
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
                                <input type="text" name="e_name" value="{{ $member->emergency->e_name }}" required placeholder="Name" class="form-control required input-sm">
                            </div>

                            <div class="form-group">
                                <label>Relation: <span class="text-danger">*</span></label>
                                <input type="text" name="e_relation" value="{{ $member->emergency->e_relation }}" required placeholder="Relation with account holder" class="form-control required input-sm">
                            </div>

                            <div class="form-group">
                                <label>Phone Number: <span class="text-danger">*</span></label>
                                <input type="number" name="e_phone_number" value="{{ $member->emergency->e_phone_number }}" required placeholder="Phone number" class="form-control required input-sm">
                            </div>
                            <div class="form-group">
                                <label>Email Address: </label>
                                <input type="email" name="e_email" value="{{ $member->emergency->e_email }}"  placeholder="Email address" class="form-control input-sm ">
                            </div>

                            <div class="form-group">
                                <label>Address: <span class="text-danger">*</span></label>
                                <textarea name="e_address" rows="2" cols="2" placeholder="Account holder present address" class="form-control required input-sm">{{ $member->emergency->e_address }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="well">
                            <label class="text-semibold" style="background-color: #9ed9fbe3; color: #0D47A1; padding: 10px; display: block; border-radius: 5px;">Nominee Information </label>
                            <div class="form-group">
                                <label>Name: <span class="text-danger">*</span></label>
                                <input type="text" name="n_name" value="{{ $member->nominee->n_name }}" required placeholder="Nominee name" class="form-control required input-sm">
                            </div>

                            <div class="form-group">
                                <label>Relation: <span class="text-danger">*</span></label>
                                <input type="text" name="n_relation" value="{{ $member->nominee->n_relation }}" required placeholder="Relation with account holder" class="form-control required input-sm">
                            </div>

                            <div class="form-group">
                                <label>Phone Number: <span class="text-danger">*</span></label>
                                <input type="number" name="n_phone_number" value="{{ $member->nominee->n_phone_number }}" required placeholder="Phone number" class="form-control required input-sm">
                            </div>
                            <div class="form-group">
                                <label>Email Address: </label>
                                <input type="email" name="n_email" value="{{ $member->nominee->n_email }}"  placeholder="Email address" class="form-control input-sm ">
                            </div>

                            <div class="form-group">
                                <label>Address: <span class="text-danger">*</span></label>
                                <textarea name="n_address" rows="2" cols="2" placeholder="Account holder Present Address" class="form-control required input-sm">{{ $member->nominee->n_address }} </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset title="Ad">
                <legend class="text-semibold">Additional info</legend>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group col-md-8">
                            <label class="display-block">Member Image: <span class="text-danger">*</span></label>
                            <input type="file" class="file-input" name="member_image" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
                            <input type="hidden" name="old_member_image" value="{{ $member->member_image }}">
                            <span class="help-block">Select member image in max 2 mb.</span>
                        </div>
                        <div class="col-md-4">
                            <?php 
                                $image = 'public/images/user_profile.jpg';
                                if($member->member_image){ 
                                    $image = $member->member_image; 
                                    if(!@getimagesize($image)){
                                        $image = 'public/images/user_profile.jpg'; 
                                        }
                                    } ?>
                            <img src="{{ asset($image) }}" alt="" style="height: 60px; width: 60px; border: 1px solid #ddd; border-radius: 3px; "> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group col-md-8">
                            <label class="display-block">Member Nid: <span class="text-danger">*</span></label>
                            <input type="file" class="file-input " name="mamber_nid"  data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
                            <input type="hidden" name="old_nid" value="{{ $member->mamber_nid }}">
                            <span class="help-block">Select member NID Copy in max 2 mb.</span>
                        </div>
                        <div class="col-md-4">
                            <?php 
                                $image = 'public/images/user_profile.jpg';
                                if($member->mamber_nid){ 
                                    $image = $member->mamber_nid; 
                                    if(!@getimagesize($image)){
                                        $image = 'public/images/user_profile.jpg'; 
                                        }
                                    } ?>
                            <img src="{{ asset($image) }}" alt="" style="height: 60px; width: 60px; border: 1px solid #ddd; border-radius: 3px; "> 
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group col-md-8">
                            <label class="display-block">Nominee Image: </label>
                            <input type="file" class="file-input" name="n_image" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
                            <input type="hidden" name="old_n_image" value="{{ $member->nominee->n_image }}">
                            <span class="help-block">Select nominee image in max 2 mb.</span>
                        </div>
                        <div class="col-md-4">
                            <?php 
                                $image_n = 'public/images/user_profile.jpg';
                                if($member->nominee->n_image){
                                    $image_n = $member->nominee->n_image;
                                    if(!@getimagesize($image)){
                                        $image_n = 'public/images/user_profile.jpg';
                                        }
                                    } ?>
                            <img src="{{ asset($image_n) }}" alt="" style="height: 60px; width: 60px; border: 1px solid #ddd; border-radius: 3px; ">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Extra Note:</label>
                            <textarea name="extra_note" rows="5" cols="5" placeholder="If you want to add any info, do it here." class="form-control">{{ $member->extra_note }}</textarea>
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