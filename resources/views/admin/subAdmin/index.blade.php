@extends('layouts.app')

@section('title','Designation')

@section('assetFile')
    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
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

        <!-- Column selectors -->
        <div class="panel border-teal-400">
            <div class="panel-heading bg-teal-300 ">
                <h5 class="panel-title">Admin Information List</h5>
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
                            <th>Admin Name</th>
                            <th>User Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Traffic Court Referee</td>
                            <td>Enright</td>
                            <td>email@address.com</td>
                            <td>0123456789</td>
                            <td><label class="label label-warning">De-Active</label></td>
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