@extends('admin.adminlayouts.adminlayout')

@section('head')

    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! HTML::style("assets/global/plugins/select2/select2.css") !!}
    {!! HTML::style("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css") !!}
    <!-- END PAGE LEVEL STYLES -->
@stop


@section('mainarea')

    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        {{$pageTitle}}
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('admin.dashboard.index')}}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Expense</a>
                <i class="fa "></i>
            </li>

        </ul>

    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div id="load">

                {{--INLCUDE ERROR MESSAGE BOX--}}
                @include('admin.common.error')
                {{--END ERROR MESSAGE BOX--}}

            </div>

            <a href="{{ route('admin.expenses.create')}}" class="btn green">
                Add New expense Item <i class="fa fa-plus"></i>
            </a>
            <hr>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-database"></i>Operators List
                    </div>

                </div>

                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover" id="expenses">
                        
                    </table>

                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->

        </div>
    </div>
    <!-- END PAGE CONTENT-->

    {{--DELETE MODAL CALLING--}}
    @include('admin.include.delete-modal')
    {{--DELETE MODAL CALLING END--}}
@stop



@section('footerjs')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {!! HTML::script("assets/global/plugins/select2/select2.min.js") !!}
    {!! HTML::script("assets/global/plugins/datatables/media/js/jquery.dataTables.min.js") !!}
    {!! HTML::script("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js") !!}

    <!-- END PAGE LEVEL PLUGINS -->

    <script>
        var table = $('#expenses').dataTable({
            "cache": true,
            "bProcessing": true,
            "bServerSide": true,
            "bDestroy": true,
            "order": [[1, "desc"]],
            "ajax": "{{ URL::route("admin.ajax_expenses") }}",
            // "aoColumns": [
            //     {'sClass': 'center', "bSortable": true},
            //     {'sClass': 'center', "bSortable": true},
            //     {'sClass': 'center', "bSortable": true},
            //     {'sClass': 'center', "bSortable": true},
            //     {'sClass': 'center', "bSortable": true},
            //     {'sClass': 'center', "bSortable": false}
            // ],
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            "sPaginationType": "full_numbers",
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                var row = $(nRow);
                row.attr("id", 'row' + aData['0']);
            },
            "columns": [
                    {
                        name: 'check',
                        data: 'check',
                        title: '<input type="checkbox" class="form-check-input" name="select_all_table" id="select-all-table" data-type="blog" onclick="selectAllTable(this)">',
                        exportable: false,
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'Name',
                        name: 'itemName',
                        title: "Policy Holder Name",
                        width: '15%'
                    },                    
                    {
                        data: 'Patient',
                        name: 'employee',
                        title: "Patient Name",
                        searchable: false,
                        orderable: false,
                        width: '15%'
                    },  
                    {
                        data: 'Relation',
                        name: 'employee',
                        title: "Relation with Holder",
                        searchable: false,
                        orderable: false,
                        width: '15%'
                    },  
                    {
                        data: 'Incident Date',
                        name: 'pincidentdat',
                        title: "Incident Date",
                        width: '15%'
                    },                          
                    {
                        data: 'price',
                        name: 'price',
                        title: "Price ( {!!  \App\Models\Setting::getCurrency($setting->currency)['symbol'] !!} {{$setting->currency}} )",
                        width: '15%'
                    },                    
                               
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        title: "Actions"
                    }
                    
                ]

        });

        // Show Delete Modal
        function del(id, name) {

            $('#deleteModal').modal('show');

            $("#deleteModal").find('#info').html('Are you sure ! You want to delete <strong>' + name + '</strong> ?');

            $('#deleteModal').find("#delete").off().on("click", function () {

                var url = "{{ route('admin.expenses.destroy',':id') }}";
                url = url.replace(':id', id);

                var token = "{{ csrf_token() }}";

                $.easyAjax({
                    type: 'DELETE',
                    url: url,
                    data: {'_token': token},
                    container: "#deleteModal",
                    success: function (response) {
                        if (response.status == "success") {
                            $('#deleteModal').modal('hide');
                            table.fnDraw();
                        }
                    }
                });

            });
        }
    </script>
@stop
