
<?php $__env->startSection('head'); ?>
    <style>
        .padding-100 {
            padding: 100px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainarea'); ?>
    <div class="col-md-9">
        <!--Profile Body-->
        <div class="profile-body">
            <div class="row margin-bottom-20">
                <!--Profile Post-->
                <div class="col-sm-6">
                    <div class="panel panel-profile no-bg">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i>Operator Personal Details
                            </h2>
                        </div>
                        <div class="panel-body panelHolder">
                            <table class="table table-light margin-bottom-0">
                                <tbody>
                                <tr>
                                    <td>
                                        <span class="primary-link">Name</span>
                                    </td>
                                    <td>
                                        <?php echo e($employee->fullName); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">Location</span>
                                    </td>
                                    <td>
                                        <?php echo e($employee->localAddress); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">Toatl Family Members</span>
                                    </td>
                                    <td>
                                        <?php echo e($employee->fatherName); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">DOB</span>
                                    </td>
                                    <td>
                                        <?php echo e(date('d-M-Y',strtotime($employee->date_of_birth))); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">Gender</span>
                                    </td>
                                    <td>
                                        <?php echo e(ucfirst($employee->gender)); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">Email</span>
                                    </td>
                                    <td>
                                        <?php echo e($employee->email); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">Phone</span>
                                    </td>
                                    <td>
                                        <?php echo e($employee->mobileNumber); ?>

                                    </td>
                                </tr>
                               
                                <tr>
                                    <td>
                                        <span class="primary-link">Permanent Address</span>
                                    </td>
                                    <td>
                                        <?php echo e($employee->permanentAddress); ?>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-profile no-bg margin-top-20">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i>Keral vision Registration Details
                            </h2>
                        </div>
                        <div class="panel-body panelHolder">
                            <table class="table table-light margin-bottom-0">
                                <tbody>
                                <tr>
                                    <td>
                                        <span class="primary-link">Employee ID</span>
                                    </td>
                                    <td>
                                        <?php echo e($employee->employeeID); ?>

                                    </td>
                                </tr>
                               
                                <tr>
                                    <td>
                                        <span class="primary-link">Date of Joining</span>
                                    </td>
                                    <td>
                                        <?php echo e(date('d-M-Y',strtotime($employee->joiningDate))); ?>

                                    </td>
                                </tr>
                               
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-profile no-bg margin-top-20">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i>Bank Details</h2>
                        </div>
                        <div class="panel-body panelHolder">
                            <table class="table table-light margin-bottom-0">
                                <tbody>
                                <tr>
                                    <td>
                                        <span class="primary-link">Account Holder Name</span>
                                    </td>
                                    <td>
                                        <?php echo e($employee->getBankDetail->accountName ?? ''); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">Account Number</span>
                                    </td>
                                    <td>
                                        <?php echo e($employee->getBankDetail->accountNumber ?? ''); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">Bank Name</span>
                                    </td>
                                    <td>
                                        <?php echo e($employee->getBankDetail->bank ?? ''); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">PAN Number</span>
                                    </td>
                                    <td>
                                        <?php echo e($employee->getBankDetail->pan ?? ''); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">IFSC Code</span>
                                    </td>
                                    <td>
                                        <?php echo e($employee->getBankDetail->ifsc ?? ''); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">Branch</span>
                                    </td>
                                    <td>
                                        <?php echo e($employee->getBankDetail->branch ?? ''); ?>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--End Profile Post-->

                <!--Notice Board -->
                <div class="col-sm-6 md-margin-bottom-20">
                    <div class="panel panel-profile no-bg">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-bullhorn"></i>Notice Board</h2>
                        </div>
                        <div id="scrollbar2" class="panel-body contentHolder">
                            <?php if(count($noticeboards)): ?>
                                <?php $__currentLoopData = $noticeboards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="profile-event">
                                        <div class="date-formats">
                                            <span><?php echo e(date('d',strtotime($notice->created_at))); ?></span>
                                            <small><?php echo e(date('m, Y',strtotime($notice->created_at))); ?></small>
                                        </div>
                                        <div class="overflow-h">
                                            <h3 class="heading-xs" onclick="showNotice(<?php echo e($notice->id); ?>);return false;">
                                                <a href="javascript:;"><?php echo e($notice->title); ?></a></h3>
                                            <p><?php echo \Illuminate\Support\Str::words($notice->description, 100,'....'); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </div>
                    </div>

                    <!-- <div class="panel panel-profile margin-top-20">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-send"></i> Any complaints 
                            </h2>
                        </div>
                        <div id="scrollbar3" class="panel-body contentHolder">

                            <?php $__empty_1 = true; $__currentLoopData = $holidays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holiday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                

                                <div
                                    class="alert-blocks alert-blocks-<?php echo e($holiday_color[$holiday->id%count($holiday_color)]); ?>">
                                    <div class="overflow-h">
                                        <strong
                                            class="color-<?php echo e($holiday_font_color[$holiday->id%count($holiday_font_color)]); ?>"><?php echo e($holiday->occassion); ?>

                                            <small class="pull-right">
                                                <em><?php echo e(date('d M Y',strtotime($holiday->date))); ?></em></small>
                                        </strong>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center padding-100">

                                    No Holiday
                                </div>
                            <?php endif; ?>

                        </div>
                    </div> -->

                    <div class="panel panel-profile margin-top-20">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-trophy"></i> Awards</h2>
                        </div>
                        <div id="scrollbar3" class="panel-body contentHolder">

                            <?php $__currentLoopData = $userAwards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $award): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="alert-blocks award-list"
                                     onclick="showAwardDetails(<?php echo e($award->id); ?>);return false;">
                                    <div class="overflow-h">
                                        <strong class="color-dark">
                                            <small class="pull-right">
                                                <em><?php echo e(ucfirst($award->forMonth)); ?> <?php echo e($award->forYear); ?></em></small>
                                        </strong>
                                        <small class="award-name"><?php echo e($award->awardName); ?></small>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>
                    </div>
                </div>
                <!--End Profile Event-->

            </div>
            <!--/end row-->

            <hr>

            <!--Profile Blog-->
            <div class="panel panel-profile">
                <div class="panel-heading overflow-h">
                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>Hospital Admitted Dates</h2>
                </div>
                <div class="panel-body panelHolder">

                    <div class="alert-blocks alert-blocks-info">
                        <div class="overflow-h">
                            <strong class="color-dark">Last absent
                                <small class="pull-right">
                                    <em><?php echo e($employee->lastAbsent($employee->employeeID,'date')); ?></em></small>
                            </strong>
                            <small class="award-name"><?php echo e($employee->lastAbsent($employee->employeeID)); ?></small>
                        </div>
                    </div>

                    <div id='calendar'></div>

                </div>
            </div>
            <!--/end row-->
            <!--End Profile Blog-->

        </div>
        <!--End Profile Body-->
    </div>


    




    <div class="modal fade show_notice in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 id="myLargeModalLabel" class="modal-title show-notice-title">
                        
                    </h4>
                </div>
                <div class="modal-body" id="show-notice-body">
                    
                </div>
            </div>
        </div>
    </div>



    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerjs'); ?>
    <script>
        $(document).ready(function () {

            $('#calendar').fullCalendar({
                //			defaultDate: '2014-11-12',
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                eventRender: function (event, element) {
                    if (event.className == "holiday") {
                        var dataToFind = moment(event.start).format('YYYY-MM-DD');
                        $('.fc-day[data-date="' + dataToFind + '"]').css('background', 'rgba(255, 224, 205, 1)');
                    }
                },
                events: [

                        
                        <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    {

                        title: "<?php echo e($attend->status); ?>",
                        start: '<?php echo e($attend->date); ?>',

                        <?php if($attend->status=='absent'): ?>
                        color: '#e50000',
                        title: "<?php echo e($attend->status); ?>-<?php echo e($attend->leaveType); ?>",
                        <?php endif; ?>


                    },
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php $__currentLoopData = $holidays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holiday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    {
                        className: "holiday",
                        title: "<?php echo e($holiday->occassion); ?>",
                        start: '<?php echo e($holiday->date); ?>',
                        color: 'grey'

                    },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.frontlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\keralavision\resources\views/front/employeeDashboard.blade.php ENDPATH**/ ?>