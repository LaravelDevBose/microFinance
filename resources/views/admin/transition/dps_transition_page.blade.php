@extends('layouts.app')

@section('title','DPS Transaction')

@section('assetFile')
    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/form_layouts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/form_input_groups.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/datatables_extension_buttons_html5.js') }}"></script>

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
                <h5 class="panel-title">Make New Deposit Transaction</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="dps_trans">
                    <div class="row " >
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="trans_id" >Transaction Id: </label>
                                <div class="col-md-7">
                                    <div class="input-group-xs">
                                        <input type="text" name="trans_id" required id="trans_id" value="{{ $trans_id }}" class="form-control  " readonly placeholder="Transaction Id">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-5">
                            <div class="form-group  has-feedback">
                                <label class="col-lg-4 control-label" for="trans_date">Transaction Date: <span class="text-danger text-bold">*</span></label>
                                <div class="col-md-7">
                                    <div class="input-group input-group-xs">
                                        <input type="text" name="trans_date" id="trans_date" value="{{ date('d/m/Y') }}" required  class="form-control datepicker required " placeholder="Transaction Date">
                                        <span class="input-group-addon datepicker"><i class="icon-calendar2"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row" >
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="payment_type" >Transaction Type: <span class="text-danger text-bold">*</span></label>
                                <div class="col-md-7 input-group-sm">
                                    <div class="input-group-xs">
                                        <select name="payment_type" id="payment_type" required data-placeholder="Select a type" class="select required">
                                            <option></option>
                                            <option selected value="1">Received</option>
                                            <option value="0">Payment</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="member_id" >Member: <span class="text-danger text-bold ">*</span></label>
                                <div class="col-md-7 input-group-sm">
                                    <div class="input-group-xs">
                                        <select name="member_id" id="member_id" required  data-placeholder="Select a Member" class="select required">
                                            <option value="0">Select A member </option>
                                            @if(isset($members) && $members)
                                                @foreach($members as $member)
                                                <option value="{{ $member->id }}">{{ $member->account_info->mem_code.'-'.$member->m_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="member_name" >Member Name: </label>
                                <div class="col-md-7">
                                    <div class="input-group-xs">
                                        <input type="text" name="member_name" required id="member_name" class="form-control  " readonly placeholder="Member Name">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="crt_balance">Current Balance: </label>
                                <div class="col-md-7">
                                    <div class="input-group-xs">
                                        <input type="text" name="crt_balance" id="crt_balance" class="form-control  " readonly placeholder="Current Balance">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="inst_amount" >Instalment:</label>
                                <div class="col-md-7">
                                    <div class="input-group-xs">
                                        <input type="text" name="inst_amount" id="inst_amount" readonly class="form-control  " placeholder="Instalment amount">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="amount" >Amount:  <span class="text-danger text-bold">*</span></label>
                                <div class="col-md-7">
                                    <div class="input-group-xs">
                                        <input type="number" name="amount" id="amount" required class="form-control required "  placeholder="0.00 Tk">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="short_note" >Short Note: </label>
                                <div class="col-md-7">
                                    <div class="input-group-xs">
                                        <input type="text" name="short_note" id="short_note" class="form-control "  placeholder="Short Note ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary pull-right dps_submit">Submit <i class="icon-check position-right"></i></button>
                </form>

            </div>
        </div>

        <!-- Column selectors -->
        <div class="panel border-teal-400">
            <div class="panel-heading bg-teal-300 ">
                <h5 class="panel-title">Deposit Transaction List</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>
            
            <table class="table table-xs table-bordered  datatable-button-html5-columns ">
                <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Member Name</th>
                    <th>Date</th>
                    <th>Transaction Type</th>
                    <th>Amount</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="tBody">
                    @if(isset($dps_trans) && $dps_trans)
                    @foreach($dps_trans as $trans)
                    <tr>
                        <td>{{ $trans->trans_id }}</td>
                        <td><a href="#">Enright</a></td>
                        <td>Traffic Court Referee</td>
                        <td>22 Jun 1972</td>
                        <td><span class="label label-success">Active</span></td>
                        <td>$85,600</td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="text-teal-600"><a href="#" title="View"><i class="icon-eye"></i></a></li>
                                <li class="text-primary-600"><a href="#" title="Edit"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" title="Delete"><i class="icon-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /column selectors -->

    </div>
@endsection 

@section('custom_script')
@include('admin/ajax/dps_tran_ajax')

<script>
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
    });    
</script>
@endsection