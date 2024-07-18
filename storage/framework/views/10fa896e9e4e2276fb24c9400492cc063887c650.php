

<?php $__env->startSection('head'); ?>

    <?php echo HTML::style("assets/global/css/components.css"); ?>

    <?php echo HTML::style("assets/global/css/plugins.css"); ?>

    <?php echo HTML::style("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainarea'); ?>
    <div class="col-md-9">
        <!--Profile Body-->
        <div class="profile-body">
            <div class="row margin-bottom-20">
                <!--Profile Post-->
                <div class="col-sm-12">


                    
                    <div id="alert_message">
                        <?php if(Session::get('success_leave')): ?>
                            <div class="alert alert-success"><i
                                    class="fa fa-check"></i> <?php echo Session::get('success_leave'); ?>

                            </div>
                        <?php endif; ?>

                        <?php if(Session::get('error_leave')): ?>
                            <div class="alert alert-danger alert-dismissable ">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <?php $__currentLoopData = Session::get('error_leave'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p><strong><i class="fa fa-warning"></i></strong> <?php echo e($error); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    


                    <div class="panel panel-grey">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i> My  Applications</h3>
                        </div>
                        <div class="panel-body">

                            <table class="table table-striped table-bordered table-hover" id="applications">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Hospital</th>
                                    <th>Reason</th>
                                    <th>Admitted on</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>


                    <!--End Profile Post-->


                </div>
                <!--/end row-->

                <hr>


            </div>
            <!--End Profile Body-->
        </div>

    </div>


    


    <div class="modal fade show_notice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 id="myLargeModalLabel" class="modal-title">
                        Leave Application
                    </h4>
                </div>
                <div class="modal-body" id="modal-data">
                    
                </div>
            </div>
        </div>
    </div>


    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerjs'); ?>

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <?php echo HTML::script("assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"); ?>

    <?php echo HTML::script("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"); ?>



    <!-- END PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL PLUGINS -->





    <script>
        $('#applications').dataTable({
            "cache": true,
            "bProcessing": true,
            "bServerSide": true,
            "bDestroy": true,
            "order": [[0, "desc"]],
            "ajax": "<?php echo e(route("front.leave_applications")); ?>",
            "aoColumns": [
                {'sClass': 'center', 'bSortable': true},
                {'sClass': 'center', 'bSortable': false},
                {'sClass': 'center', 'bSortable': false},
                {'sClass': 'center', 'bSortable': false},
                {'sClass': 'center', 'bSortable': true},
                {'sClass': 'center', 'bSortable': false},
                {'sClass': 'center', 'bSortable': false}

            ],
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                var row = $(nRow);
                row.attr("id", 'row' + aData['0']);
            },
            "fnDrawCallback": function () {
                $('.highlight').parent('td').parent('tr').addClass('info');
            },
            "sPaginationType": "full_numbers",
            "language": {
                "emptyTable": "No data available"
            }
        });


        function show_application(id) {
            $('#modal-data').html('<div class="text-center"><?php echo HTML::image('front_assets/img/loading-spinner-blue.gif'); ?></div>');
            var url = "<?php echo e(route('dashboard.show',[':id'])); ?>";
            url = url.replace(':id', id);
            $.ajax({
                type: "GET",
                url: url

            }).done(function (response) {
                $('#modal-data').html(response);
//
            });
        }

        <?php if(Session::get('error_leave')): ?>
        $("html, body").animate({scrollTop: $('#applications').height() + 600}, 2000);
        <?php endif; ?>


    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.frontlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\keralavision\resources\views/front/leave.blade.php ENDPATH**/ ?>