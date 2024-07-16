

<?php $__env->startSection('head'); ?>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <?php echo HTML::style("assets/global/plugins/bootstrap-select/bootstrap-select.min.css"); ?>

    <?php echo HTML::style("assets/global/plugins/select2/select2.css"); ?>

    <?php echo HTML::style("assets/global/plugins/jquery-multi-select/css/multi-select.css"); ?>

    <!-- BEGIN THEME STYLES -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainarea'); ?>
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Award page
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="<?php echo e(route('admin.dashboard.index')); ?>">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo e(route('admin.awards.index')); ?>">Awards</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="">Give an Awards</a>
            </li>
        </ul>

    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->

            
            <?php echo $__env->make('admin.common.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            


            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-trophy"></i>Give an Award
                    </div>
                    <div class="tools">
                    </div>
                </div>

                <div class="portlet-body form">

                    <!-- BEGIN FORM-->
                    <?php echo Form::open(array('class'=>'form-horizontal form-bordered','method'=>'POST', 'id' =>
                    'award_store_form')); ?>



                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-md-2 control-label">Award Name: <span class="required">
                                * </span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="awardName" placeholder="Award Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Gift Item: <span class="required">
                                * </span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="gift" placeholder="Gift">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Cash price: <?php echo \App\Models\Setting::getCurrency($setting->currency)['symbol']; ?> <?php echo e($setting->currency); ?></label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="cashPrice" placeholder="CashPrice"
                                       value="<?php echo e(\Illuminate\Support\Facades\Request::old('cashPrice')); ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label">Employee name:</label>

                            <div class="col-md-8">
                                <?php echo Form::select('employeeID', $employees,null,['class' => 'form-control input-xlarge
                                select2me','data-placeholder'=>'Select Employee...']); ?>

                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Month:</label>

                                <div class="col-md-3">
                                    <select class="form-control  select2me" name="forMonth">
                                        <option value="" selected="selected">Month</option>
                                        <option value="january"
                                                <?php if(strtolower(date('F'))=='january' ): ?>selected='selected'
                                            <?php endif; ?>>January
                                        </option>
                                        <option value="february"
                                                <?php if(strtolower(date('F'))=='february' ): ?>selected='selected'
                                            <?php endif; ?>>February
                                        </option>
                                        <option value="march" <?php if(strtolower(date('F'))=='march' ): ?>selected='selected'
                                            <?php endif; ?>>March
                                        </option>
                                        <option value="april" <?php if(strtolower(date('F'))=='april' ): ?>selected='selected'
                                            <?php endif; ?>>April
                                        </option>
                                        <option value="may"
                                                <?php if(strtolower(date('F'))=='may' ): ?>selected='selected' <?php endif; ?>>May
                                        </option>
                                        <option value="june"
                                                <?php if(strtolower(date('F'))=='june' ): ?>selected='selected' <?php endif; ?>>
                                            June
                                        </option>
                                        <option value="july"
                                                <?php if(strtolower(date('F'))=='july' ): ?>selected='selected' <?php endif; ?>>
                                            July
                                        </option>
                                        <option value="august" <?php if(strtolower(date('F'))=='august' ): ?>selected='selected'
                                            <?php endif; ?>>August
                                        </option>
                                        <option value="september" <?php if(strtolower(date('F'))=='september'
                                        ): ?>selected='selected' <?php endif; ?>>September
                                        </option>
                                        <option value="october"
                                                <?php if(strtolower(date('F'))=='october' ): ?>selected='selected'
                                            <?php endif; ?>>October
                                        </option>
                                        <option value="november"
                                                <?php if(strtolower(date('F'))=='november' ): ?>selected='selected'
                                            <?php endif; ?>>November
                                        </option>
                                        <option value="december"
                                                <?php if(strtolower(date('F'))=='december' ): ?>selected='selected'
                                            <?php endif; ?>>December
                                        </option>
                                    </select>
                                </div>

                                <label class="col-md-2 control-label">Year:</label>

                                <div class="col-md-3">
                                    <?php echo Form::selectYear('forYear', 2020, date('Y')+1,date('Y'),['class' => 'form-control
                                    select2me']); ?>


                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="button" onclick="storeAward();return false;" class="btn green"><i
                                            class="fa fa-check"></i> Submit
                                    </button>

                                </div>
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

                    <!-- END FORM-->
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->

            </div>
        </div>
        <!-- END PAGE CONTENT-->

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('footerjs'); ?>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <?php echo HTML::script("assets/global/plugins/bootstrap-select/bootstrap-select.min.js"); ?>

        <?php echo HTML::script("assets/global/plugins/select2/select2.min.js"); ?>

        <?php echo HTML::script("assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"); ?>

        <!-- END PAGE LEVEL PLUGINS -->

            <script>
                // Javascript function to update the company info and Bank Info
                function storeAward() {
                    var url = "<?php echo e(route('admin.awards.store')); ?>";
                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        container: '#award_store_form',
                        data: $('#award_store_form').serialize()
                    });
                }
            </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.adminlayouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\keralavision\resources\views/admin/awards/create.blade.php ENDPATH**/ ?>