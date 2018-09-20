@extends('layouts.app')

@section('title','Income & Expense')

@section('assetFile')
    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/form_layouts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/datatables_basic.js') }}"></script>

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
        <div class="panel border-purple-400">
            <div class="panel-heading bg-purple-300 ">
                <h5 class="panel-title">Add New Income & Expense Head</h5>

            </div>
            <div class="panel-body">
                <form action="#"  class="form-horizontal">
                    <div class="row " >
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-lg-3 control-label" >IE Head: <span class="text-danger text-bold ">*</span></label>
                                <div class="col-md-8">
                                    <div class="input-group-xs">
                                        <input type="text" name="iE_head" class="form-control required " required placeholder="IE Transition Head">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" >Activation Status: <span class="text-danger text-bold">*</span></label>
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
                                <label class="col-lg-3 control-label" >Short Note: </label>
                                <div class="col-md-8">
                                    <div class="">
                                        <textarea name="short_note"  cols="4" rows="3" class="form-control " placeholder="Short Note "></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Submit <i class="icon-check position-right"></i></button>
                </form>

            </div>
        </div>

        <!-- Column selectors -->
        <div class="panel border-teal-400">
            <div class="panel-heading bg-teal-300 ">
                <h5 class="panel-title">Income & Expense Head List</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>
            <div class="table-responsive" >
                <table class="table table-xs table-bordered table-hover  datatable-basic ">
                    <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Head Name</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Enright</td>
                        <td>Traffic Court Referee</td>
                        <td>Enright</td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li style="color: #fff;"><a href="#" title="Change Status" class="label label-warning"><i class="icon-eye"></i> Active</a></li>
                                <li class="text-primary-600"><a href="#" title="Edit"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" title="Delete"><i class="icon-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /column selectors -->

    </div>
@endsection

@section('custom_script')


@endsection