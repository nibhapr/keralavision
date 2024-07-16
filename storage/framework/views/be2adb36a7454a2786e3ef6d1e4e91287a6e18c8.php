

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
                <a href=""> Email Setting</a>
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
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cog"></i>Email Notifications
                    </div>
                    <div class="tools">
                    </div>
                </div>

                <div class="portlet-body form">

                    <!------------------------ BEGIN FORM ---------------------->
                    <?php echo Form::model($setting, ['method' => 'PUT','id' => 'notificationSettings_form',
                    'class'=>'form-horizontal form-bordered']); ?>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Award : </label>
                            <div class="col-md-6">
                                <input type="checkbox" value="1" class="make-switch" name="award_notification"
                                       <?php if($setting->award_notification==1): ?>checked <?php endif; ?> data-on-color="success"
                                       data-on-text="Yes" data-off-text="No" data-off-color="danger">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Attendance Marked:</label>
                            <div class="col-md-6">
                                <input type="checkbox" value="1" class="make-switch" name="attendance_notification"
                                       <?php if($setting->attendance_notification==1): ?>checked <?php endif; ?> data-on-color="success"
                                       data-on-text="Yes" data-off-text="No" data-off-color="danger">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Notice Board:</label>
                            <div class="col-md-6">
                                <input type="checkbox" value="1" class="make-switch" name="notice_notification"
                                       <?php if($setting->notice_notification==1): ?>checked <?php endif; ?> data-on-color="success"
                                       data-on-text="Yes" data-off-text="No" data-off-color="danger">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label">Leave Application:</label>
                            <div class="col-md-6">
                                <input type="checkbox" value="1" class="make-switch" name="leave_notification"
                                       <?php if($setting->leave_notification==1): ?>checked <?php endif; ?> data-on-color="success"
                                       data-on-text="Yes" data-off-text="No" data-off-color="danger">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Employee Add:</label>
                            <div class="col-md-6">
                                <input type="checkbox" value="1" class="make-switch" name="employee_add"
                                       <?php if($setting->employee_add==1): ?>checked <?php endif; ?> data-on-color="success"
                                       data-on-text="Yes" data-off-text="No" data-off-color="danger">
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="button" onclick="updateNotification(<?php echo e($setting->id); ?>);"
                                            class="btn green"><i class="fa fa-check"></i> Submit
                                    </button>

                                </div>
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

                    <!------------------------- END FORM ----------------------->

                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->

            </div>

        </div>
        <!-- END PAGE CONTENT-->


    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('footerjs'); ?>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
            <?php echo HTML::script("assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"); ?>

            <?php echo HTML::script('assets/global/plugins/bootstrap-select/bootstrap-select.min.js'); ?>

            <?php echo HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"); ?>

            <?php echo HTML::script('assets/global/plugins/select2/select2.min.js'); ?>

            <?php echo HTML::script('assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js'); ?>

            <?php echo HTML::script('assets/admin/pages/scripts/components-dropdowns.js'); ?>




            <script>
                jQuery(document).ready(function () {
                    ComponentsDropdowns.init();
                });

                function updateNotification(id) {
                    var url = "<?php echo e(route('admin.notificationSettings.update',':id')); ?>";
                    url = url.replace(':id', id);
                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        container: '#notificationSettings_form',
                        data: $('#notificationSettings_form').serialize(),
                    });
                }
            </script>
            <!-- END PAGE LEVEL PLUGINS -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.adminlayouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\keralavision\resources\views/admin/notificationSettings/edit.blade.php ENDPATH**/ ?>