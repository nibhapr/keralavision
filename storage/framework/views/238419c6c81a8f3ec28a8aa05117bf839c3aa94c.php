

<?php $__env->startSection('head'); ?>

    <?php echo HTML::style("assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"); ?>

    <?php echo HTML::style("assets/global/plugins/bootstrap-select/bootstrap-select.min.css"); ?>

    <?php echo HTML::style("assets/global/plugins/select2/select2.css"); ?>

    <?php echo HTML::style("assets/global/plugins/jquery-multi-select/css/multi-select.css"); ?>


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
                <a href="<?php echo e(route('admin.settings.edit','setting')); ?>">Settings</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href=""> Setting</a>
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
                        <i class="fa fa-cogs"></i>Edit <?php echo e($pageTitle); ?>

                    </div>
                    <div class="tools">
                    </div>
                </div>

                <div class="portlet-body form">

                    <!------------------------ BEGIN FORM---------------------->
                    <?php echo Form::model($setting, ['method' => 'PUT','files' => true,'class'=>'form-horizontal form-bordered' ,
                    'id' => 'edit_setting_form']); ?>


                    <div class="form-body">

                        <div class="form-group">
                            <label class="control-label col-md-2">Website Logo</label>
                            <div class="col-md-6">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">

                                        <img src="<?php echo e($setting->getLogoImageAttribute()); ?>" height="30px" width="117px"/>

                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail">
                                    </div>
                                    <div>
                                    <span class="btn default btn-file">
                                        <span class="fileinput-new">
                                            Change image </span>
                                        <span class="fileinput-exists">
                                            Change </span>
                                        <input type="file" name="logo">
                                    </span>
                                        <a href="#" class="btn btn-sm red fileinput-exists" data-dismiss="fileinput">
                                            Remove </a>
                                    </div>
                                </div>
                                <div class="clearfix margin-top-10">
                                <span class="label label-danger">
                                    NOTE! </span> Image Size must be 117px x 30px

                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Website: <span class="required">
                                * </span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="website" placeholder="Website Title"
                                       value="<?php echo e($setting->website); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Email: <span class="required">
                                * </span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" placeholder="Email"
                                       value="<?php echo e($setting->email); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Name: <span class="required"> * </span></label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Name"
                                       value="<?php echo e($setting->name); ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-2">Currency</label>
                            <div class="col-md-6">
                                <select class="bs-select form-control" data-show-subtext="true" name="currency">
                                    <?php $__currentLoopData = \App\Models\Setting::CURRENCIES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($setting->currency == $currency['code']): ?> selected
                                                <?php endif; ?> value="<?php echo e($currency['code']); ?>"><?php echo $currency['symbol']; ?>  <?php echo e($currency['code']); ?>

                                            (<?php echo e($currency['name']); ?>)
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="button" onclick="updateSetting(<?php echo e($setting->id); ?>)" class="btn green"><i
                                            class="fa fa-check"></i> Submit
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


            <?php echo HTML::script('assets/global/plugins/select2/select2.min.js'); ?>

            <?php echo HTML::script('assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js'); ?>

            <?php echo HTML::script('assets/admin/pages/scripts/components-dropdowns.js'); ?>




            <script>
                jQuery(document).ready(function () {
                    ComponentsDropdowns.init();
                });

                function updateSetting(id) {

                    let url = "<?php echo e(route('admin.settings.update',':id')); ?>";
                    url = url.replace(':id', id);
                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        container: '#edit_setting_form',
                        file: true
                    });
                }
            </script>
            <!-- END PAGE LEVEL PLUGINS -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.adminlayouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\keralavision\resources\views/admin/settings/edit.blade.php ENDPATH**/ ?>