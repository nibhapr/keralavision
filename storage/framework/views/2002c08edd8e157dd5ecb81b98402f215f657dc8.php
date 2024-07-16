

<?php $__env->startSection('head'); ?>

    <!-- BEGIN PAGE LEVEL STYLES -->
    <?php echo HTML::style("assets/global/plugins/select2/select2.css"); ?>

    <?php echo HTML::style("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"); ?>

    <!-- END PAGE LEVEL STYLES -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('mainarea'); ?>

    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        <?php echo e($pageTitle); ?>

    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="<?php echo e(route('admin.dashboard.index')); ?>">Home</a>
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

                
                <?php echo $__env->make('admin.common.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                

            </div>

            <a href="<?php echo e(route('admin.expenses.create')); ?>" class="btn green">
                Add New expense Item <i class="fa fa-plus"></i>
            </a>
            <hr>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-database"></i>Expense List
                    </div>

                </div>

                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover" id="expenses">
                        <!-- <thead>
                        <tr>
                            <th>
                                ID.
                            </th>
                            <th>
                                Item Name
                            </th>
                            <th>
                                Purchase From
                            </th>
                            <th>
                                Purchase Date
                            </th>
                            <th>
                                Price ( <?php echo \App\Models\Setting::getCurrency($setting->currency)['symbol']; ?> <?php echo e($setting->currency); ?> )
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody> -->
                    </table>

                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->

        </div>
    </div>
    <!-- END PAGE CONTENT-->

    
    <?php echo $__env->make('admin.include.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footerjs'); ?>

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <?php echo HTML::script("assets/global/plugins/select2/select2.min.js"); ?>

    <?php echo HTML::script("assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"); ?>

    <?php echo HTML::script("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"); ?>


    <!-- END PAGE LEVEL PLUGINS -->

    <script>
        var table = $('#expenses').dataTable({
            "cache": true,
            "bProcessing": true,
            "bServerSide": true,
            "bDestroy": true,
            "order": [[1, "desc"]],
            "ajax": "<?php echo e(URL::route("admin.ajax_expenses")); ?>",
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
                        data: 'itemName',
                        name: 'itemName',
                        title: "Item Name"
                    },                    
                    {
                        data: 'employee',
                        name: 'employee',
                        title: "Employee",
                        searchable: false,
                        orderable: false
                    },                    
                    {
                        data: 'price',
                        name: 'price',
                        title: "Price ( <?php echo \App\Models\Setting::getCurrency($setting->currency)['symbol']; ?> <?php echo e($setting->currency); ?> )"
                    },                    
                    {
                        data: 'purchaseDate',
                        name: 'purchaseDate',
                        title: "Purchase Date"
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

                var url = "<?php echo e(route('admin.expenses.destroy',':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.adminlayouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\keralavision\resources\views/admin/expenses/index.blade.php ENDPATH**/ ?>