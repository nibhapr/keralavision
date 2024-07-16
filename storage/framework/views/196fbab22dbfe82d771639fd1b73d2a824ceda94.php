

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

        <small>Operator List</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="<?php echo e(route('admin.dashboard.index')); ?>">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo e(route('admin.employees.index')); ?>">Operators</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Operators List</a>
            </li>
        </ul>

    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->

    <div class="row">
        <div class="col-md-12">
          
            <div id="load">

                <?php if(Session::get('success')): ?>
                    <div class="alert alert-success"><?php echo Session::get('success'); ?></div>
                <?php endif; ?>

            </div>
            <a href="<?php echo e(route('admin.employees.create')); ?>" class="btn green">
                Add New Operator <i class="fa fa-plus"></i>
            </a>

            <hr>
            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i>Operators List
                    </div>
                    <div class="tools">
                        <div class="btn-group pull-right">
                            <a href="javascript:exportEmployees()" class="btn yellow">
                                <i class="fa fa-file-excel-o"></i> Export
                            </a>
                        </div>
                    </div>
                </div>

                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover" id="sample_employees">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 30px;">
                                ID
                            </th>
                            <th class="text-center" style="width: 40px;">
                                Image
                            </th>
                            <th class="text-center">
                                Name
                            </th>
                            
                            <th class="text-center">
                             firmName
                            </th>
                            <th class="text-center">
                                Status
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
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
        var table = $('#sample_employees').dataTable({
            "cache": true,
            "bProcessing": true,
            "bServerSide": true,
            "bDestroy": true,
            "order": [[0, "desc"]],

            "ajax": "<?php echo e(route("admin.employees.ajaxlist")); ?>",
            "aoColumns": [
                {'sClass': 'center', 'bSortable': true},
                {'sClass': 'center', 'bSortable': false},
                {'sClass': 'center', 'bSortable': false},
                {'sClass': 'center', 'bSortable': false},
                {'sClass': 'center', 'bSortable': false},
                {'sClass': 'center', 'bSortable': false},
                 //{'sClass': 'center', 'bSortable': false}

            ],

            "fnDrawCallback": function () {
                Metronic.init();
            },
            "sPaginationType": "full_numbers",
            "language": {
                "emptyTable": "No data available"
            },
            "fnInitComplete": function (oSettings, json) {
                Metronic.init();
            }
        });

        // export employees
        function exportEmployees() {
            var searchValue = $('.dataTables_filter input').val();
            window.location.href = 'employees/export?s=' + searchValue;
        }

        // Show Delete Modal
        function del(id) {

            $('#deleteModal').modal('show');

            $("#deleteModal").find('#info').html('Are you sure you want to delete');

            $('#deleteModal').find("#delete").off().on("click", function () {

                var url = "<?php echo e(route('admin.employees.destroy',':id')); ?>";
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

<?php echo $__env->make('admin.adminlayouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\keralavision\resources\views/admin/employees/index.blade.php ENDPATH**/ ?>