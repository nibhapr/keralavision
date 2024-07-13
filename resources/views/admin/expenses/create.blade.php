@extends('admin.adminlayouts.adminlayout')

@section('head')
    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! HTML::style("assets/global/plugins/bootstrap-datepicker/css/datepicker3.css") !!}
    {!! HTML::style("assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css") !!}
    <!-- BEGIN THEME STYLES -->
@stop

@section('mainarea')


    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        {{$pageTitle}} Claiming Details
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('admin.dashboard.index')}}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{ route('admin.expenses.index') }}">expenses</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="">Add Item</a>
            </li>
        </ul>

    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->

            {{--INLCUDE ERROR MESSAGE BOX--}}
            @include('admin.common.error')
            {{--END ERROR MESSAGE BOX--}}


            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i>Add New item
                    </div>
                    <div class="tools">
                    </div>
                </div>

                <div class="portlet-body form">

                    <!-- BEGIN FORM-->
                    {!! Form::open(array('class'=>'form-horizontal form-bordered','method'=>'POST','files'=>true, 'id' =>
                    'expenses_store_form')) !!}


                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-md-2 control-label">Policy Holder: <span class="required">
                                * </span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="itemName" placeholder="Name policy holder"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Patient’s Name:
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="purchaseFrom" placeholder="Name of the patient"
                                       value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Relationship to Policyholder:
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="purchaseFrom" placeholder="Relationship with policy holder"
                                       value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Description of Treatment:
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="purchaseFrom" placeholder="Description of Treatment"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Date of Incident::
                            </label>
                            <div class="col-md-6">
                                <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy"
                                     data-date-viewmode="years">
                                    <input type="text" class="form-control" name="purchaseDate" readonly>
                                    <span class="input-group-btn">
                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Total Claim Amount:<span class="required"> * </span> {!!  \App\Models\Setting::getCurrency($setting->currency)['symbol'] !!} {{$setting->currency}}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price" placeholder="Price of Item"
                                       value="">
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="col-md-2 control-label">Attach Bill:</label>

                            <div class="col-md-6">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="input-group input-large">
                                        <div class="form-control uneditable-input" data-trigger="fileinput">
                                            <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                class="fileinput-filename">
                                        </span>
                                        </div>
                                        <span class="input-group-addon btn default btn-file">
                                        <span class="fileinput-new">
                                            Select file </span>
                                        <span class="fileinput-exists">
                                            Change </span>
                                        <input type="file" name="bill">
                                    </span>
                                        <a href="#" class="input-group-addon btn btn-sm red fileinput-exists"
                                           data-dismiss="fileinput">
                                            Remove </a>
                                    </div>

                                </div>
                            </div>
                        </div> -->
<div class="row ">
                <div class="col-md-12 col-sm-12">
                    <div class="portlet box purple-wisteria">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Documents
                            </div>

                        </div>
                        <div class="portlet-body">

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Medical Bills/Invoices</label>
                                    <div class="col-md-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                        class="fileinput-filename">
                                            </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                            <span class="fileinput-new">
                                                Select file </span>
                                            <span class="fileinput-exists">
                                                Change </span>
                                            <input type="file" name="resume">
                                        </span>
                                                <a href="#" class="input-group-addon btn btn-sm red fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Medical Reports</label>
                                    <div class="col-md-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                        class="fileinput-filename">
                                            </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                            <span class="fileinput-new">
                                                Select file </span>
                                            <span class="fileinput-exists">
                                                Change </span>
                                            <input type="file" name="offerLetter">
                                        </span>
                                                <a href="#" class="input-group-addon btn btn-sm red fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Prescriptions</label>
                                    <div class="col-md-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                        class="fileinput-filename">
                                            </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                            <span class="fileinput-new">
                                                Select file </span>
                                            <span class="fileinput-exists">
                                                Change </span>
                                            <input type="file" name="joiningLetter">
                                        </span>
                                                <a href="#" class="input-group-addon btn btn-sm red fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Any other document</label>
                                    <div class="col-md-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                        class="fileinput-filename">
                                            </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                            <span class="fileinput-new">
                                                Select file </span>
                                            <span class="fileinput-exists">
                                                Change </span>
                                            <input type="file" name="contract">
                                        </span>
                                                <a href="#" class="input-group-addon btn btn-sm red fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">ID Proof</label>
                                    <div class="col-md-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                        class="fileinput-filename">
                                            </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                            <span class="fileinput-new">
                                                Select file </span>
                                            <span class="fileinput-exists">
                                                Change </span>
                                            <input type="file" name="IDProof">
                                        </span>
                                                <a href="#" class="input-group-addon btn btn-sm red fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> 

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="button" onclick="storeExpenses();return false;" class="btn green"><i
                                            class="fa fa-check"></i> Submit
                                    </button>

                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <!-- END FORM-->

                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->

            </div>
        </div>
        <!-- END PAGE CONTENT-->


    @stop

    @section('footerjs')

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! HTML::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js") !!}
        {!! HTML::script("assets/admin/pages/scripts/components-pickers.js") !!}
        {!! HTML::script("assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js") !!}
        <!-- END PAGE LEVEL PLUGINS -->
            <script>
                jQuery(document).ready(function () {
                    ComponentsPickers.init();
                });

                // Javascript function to update the company info and Bank Info
                function storeExpenses() {
                    var url = "{{ route('admin.expenses.store') }}";
                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        container: '#expenses_store_form',
                        file: true
                    });
                }
            </script>
@stop
