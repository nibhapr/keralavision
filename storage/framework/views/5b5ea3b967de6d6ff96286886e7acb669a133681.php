<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <title><?php echo e($setting->website); ?> - <?php echo e($pageTitle); ?> </title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- CSS Global Compulsory -->
<?php echo HTML::style('front_assets/plugins/bootstrap/css/bootstrap.min.css'); ?>

<?php echo HTML::style('front_assets/css/style.css'); ?>

<!-- CSS Implementing Plugins -->

<?php echo HTML::style('front_assets/plugins/font-awesome/css/font-awesome.min.css'); ?>

<?php echo HTML::style('front_assets/plugins/sky-forms/version-2.0.1/css/custom-sky-forms.css'); ?>


<?php echo HTML::style('front_assets/plugins/scrollbar/src/perfect-scrollbar.css'); ?>

<?php echo HTML::style('front_assets/plugins/fullcalendar/fullcalendar.css'); ?>

<?php echo HTML::style('front_assets/plugins/fullcalendar/fullcalendar.print.css',array('media' => 'print')); ?>



<!-- CSS Page Style -->
<?php echo HTML::style('front_assets/css/pages/profile.css'); ?>


<!-- CSS Theme -->
<?php echo HTML::style('front_assets/css/theme-colors/default.css'); ?>


<!-- CSS Customization -->
    <?php echo HTML::style('front_assets/css/custom.css'); ?>

    <?php echo HTML::style('assets/global/plugins/froiden-helper/helper.css'); ?>


    <?php echo $__env->yieldContent('head'); ?>
    <style>
        .bg {
            text-align: center;
            background: rgb(235, 235, 235);
            padding: 10px;
        }

        .auto {
            height: auto
        }
    </style>

</head>

<body>
<div class="wrapper">
    <!--=== Header ===-->
    <div class="header">
        <!-- Navbar -->
        <div class="navbar navbar-default mega-menu" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo e(URL::to('dashboard')); ?>">
                        <img src="<?php echo e($setting->getLogoImageAttribute()); ?>" height="30px" id="logo-header"
                             class="logo-default"/>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">

                        <!-- Home -->
                        <li class="<?php echo e($homeActive ?? ''); ?>">
                            <a href="<?php echo e(URL::to('dashboard')); ?>">
                                Home
                            </a>
                        </li>
                        <!-- End Home -->

                        <!-- Leave -->
                        <li class="dropdown <?php echo e($leaveActive ?? ''); ?>">
                            <a href="" href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                Hospital Admit
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="" data-toggle="modal" data-target=".apply_modal">Admit Hospital</a></li>
                                <li><a href="<?php echo e(route('front.leave')); ?>">Admitted details</a></li>

                            </ul>
                        </li>
                        <!-- End Leave -->
                        <!-- My Account -->
                        <li class="dropdown">
                            <a href="" href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                My Account
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="" data-toggle="modal" data-target=".change_password_modal"
                                       id="change_password_link">Change Password</a></li>
                                <!-- Logout -->
                                <?php if(Auth::guard('employees')->check()): ?>
                                    <li>
                                        <a href="<?php echo e(route('front.logout')); ?>">
                                            Logout
                                        </a>

                                    </li>
                            <?php endif; ?>
                            <!-- End Logout -->

                            </ul>
                        </li>
                        <!-- End Leave -->

                    </ul>
                </div>
                <!--/navbar-collapse-->
            </div>
        </div>
        <!-- End Navbar -->
    </div>
    <!--=== End Header ===-->

    <!--=== Profile ===-->
    <div class="profile container content">
        <div class="row">
            <!--Left Sidebar-->
            <div class="col-md-3 md-margin-bottom-40">
                <img class="img-responsive profile-img margin-bottom-20" src="<?php echo e($employee->profile_image_url); ?>"
                     alt="">
                <p>
                <h3 class="text-center"><?php echo e($employee->fullName); ?></h3>

                     
                </p>
                <!-- <hr> -->
                <div class="service-block-v3 service-block-u">
                    <!-- STAT -->
                    <div class="row profile-stat">
                        <p class= "text-center">Location</p>
                        <!-- <div class="col-md-4 col-sm-4 col-xs-6" data-toggle="tooltip" data-placement="bottom"
                             title="<?php echo e(date('F')); ?>">
                            <div class="uppercase profile-stat-title">
                                <?php echo e(round($attendance_count,2)); ?>

                            </div>
                            <div class="uppercase profile-stat-text">
                                Attendance
                            </div>
                        </div> -->
                        <!-- <div class="col-md-4 col-sm-4 col-xs-6" data-toggle="tooltip" data-placement="bottom"
                             title="Leaves">
                            <div class="uppercase profile-stat-title">
                                <?php echo e($leaveLeft); ?>

                            </div>
                            <div class="uppercase profile-stat-text">
                                Leave
                            </div>
                        </div> -->
                        <!-- <div class="col-md-4 col-sm-4 col-xs-6" data-toggle="tooltip" data-placement="bottom"
                             title="Total Award Won">
                            <div class="uppercase profile-stat-title">
                                <?php echo e(count($employee->getAwards)); ?>

                            </div>
                            <div class="uppercase profile-stat-text">
                                Awards
                            </div>
                        </div> -->
                    </div>
                    <!-- END STAT -->
                </div>


                <!--Notification-->
                <?php if(count($current_month_birthdays)>0): ?>
                    <div class="panel-heading-v2 overflow-h">
                        <h2 class="heading-xs pull-left"><i class="fa fa-birthday-cake"></i> Birthdays</h2>
                    </div>
                    <ul id="scrollbar5" class="list-unstyled contentHolder margin-bottom-20 auto">
                        <?php $__currentLoopData = $current_month_birthdays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $birthday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="notification">
                                <?php echo HTML::image($birthday->profile_image_url,'ProfileImage',['class'=>"rounded-x"]); ?>


                                <div class="overflow-h">
                                    <span><strong><?php echo e($birthday->fullName); ?></strong> has birthday on</span>
                                    <strong><?php echo e(date('d F',strtotime($birthday->date_of_birth))); ?></strong>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
            <?php endif; ?>
            <!--End Notification-->


                <div class="margin-bottom-50"></div>
            </div>
            <!--End Left Sidebar-->

            
            <?php echo $__env->yieldContent('mainarea'); ?>
            


        </div>
        <!--/end row-->


    </div>
    <!--=== End Profile ===-->

    <!--=== Footer Version 1 ===-->
    <div class="footer-v1">

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p class="text-center">
                            <?php echo e(date('Y')); ?> &copy; <?php echo e($setting->website); ?>


                        </p>
                    </div>

                    <!-- Social Links -->
                    <div class="col-md-4">

                    </div>
                    <!-- End Social Links -->
                </div>
            </div>
        </div>
        <!--/copyright-->
    </div>
    <!--=== End Footer Version 1 ===-->


    

    <div class="modal fade apply_modal in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 id="myLargeModalLabel" class="modal-title">
                        Add admitted date
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="portlet-body form">

                        <!------------------------------ BEGIN FORM ----------------------------------------->
                        <?php echo Form::open(array('route'=>"front.leave_store",'class'=>'sky-form','id'=>'leave-form','method'=>'POST')); ?>


                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label class="input">
                                    <i class="icon-append fa fa-calendar"></i>
                                    <input type="text" name="date[0]" id="leave" placeholder="Admitted date">
                                </label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input class="form-control form-control-inline" type="text" name="reason[0]"
                                       placeholder="Hospital Name"/>
                            </div>
                            <!-- <div class="col-md-2 form-group">
                                <?php echo Form::select('leaveType[0]', $leaveTypes,null,['class' => 'form-control
                                leaveType','id'=>'leaveType0','onchange'=>'halfDayToggle(0,this.value)'] ); ?>

                            </div>
                            <div class="col-md-2 form-group">
                                <?php echo Form::select('halfleaveType[0]', $leaveTypeWithoutHalfDay,null,['class' =>
                                'form-control halfLeaveType','id'=>'halfLeaveType0'] ); ?>

                            </div> -->
                            <div class="col-md-5 form-group">
                                <input class="form-control form-control-inline" type="text" name="reason[0]"
                                       placeholder="Reason"/>
                            </div>
                        </div>
                        <div id="insertBefore"></div>

                        <!-- <button type="button" id="plusButton" class="btn-u btn-u-green">
                            Add More <i class="fa fa-plus"></i>
                        </button> -->
                        <div class="row">
                            <div class="col-md-offset-4 col-md-8">
                                <button type="button" class="btn-u btn-u-sea" onclick="submitLeave()"><i
                                        class="fa fa-check"></i> Submit
                                </button>

                            </div>

                        </div>
                    <?php echo Form::close(); ?>

                    <!------------------------ END FORM ------------------------------------------>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    

    <div class="modal fade change_password_modal in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">
                        Change Password
                    </h4>
                </div>
                <div class="modal-body" id="change_password_modal_body">
                    

                </div>
            </div>
        </div>
    </div>
    
    <?php echo $__env->make('include.show-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</div>
<!--/wrapper-->


<!-- JS Global Compulsory -->
<?php echo HTML::script("js/jquery-3.6.0.min.js"); ?>

<?php echo HTML::script('front_assets/plugins/jquery/jquery-migrate.min.js'); ?>

<?php echo HTML::script('front_assets/plugins/bootstrap/js/bootstrap.min.js'); ?>


<!-- JS Implementing Plugins -->
<?php echo HTML::script('front_assets/plugins/back-to-top.js'); ?>


<!-- Scrollbar -->
<?php echo HTML::script('front_assets/plugins/scrollbar/src/jquery.mousewheel.js'); ?>

<?php echo HTML::script('front_assets/plugins/scrollbar/src/perfect-scrollbar.js'); ?>

<!-- JS Customization -->
<?php echo HTML::script('front_assets//plugins/sky-forms/version-2.0.1/js/jquery-ui.min.js'); ?>

<?php echo HTML::script('front_assets/plugins/sky-forms/version-2.0.1/js/jquery.form.min.js'); ?>

<!-- JS Page Level -->
<?php echo HTML::script('front_assets/plugins/lib/moment.min.js'); ?>

<?php echo HTML::script('front_assets/plugins/fullcalendar/fullcalendar.min.js'); ?>

<?php echo HTML::script('assets/global/plugins/froiden-helper/helper.js'); ?>


<script>
    jQuery(document).ready(function ($) {
        "use strict";
        $('.contentHolder').perfectScrollbar();


    });
</script>
<?php echo $__env->yieldContent('footerjs'); ?>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<!--[if lt IE 9]>
<?php echo HTML::script('front_assets/plugins/respond.js'); ?>

<?php echo HTML::script('front_assets/plugins/html5shiv.js'); ?>


<![endif]-->
<script>
    <?php
        $j=0
    ?>
    
    $('#leave').datepicker({minDate: 0});
    $('.halfLeaveType').hide();
    var $insertBefore = $('#insertBefore');
    var $i = 0;

    $('#plusButton').on("click", function () {

        $i = $i + 1;

        $(' <div class="row" id="row' + $i + '"> ' +
            '<div class="col-md-3"><label class="input"><i class="icon-append fa fa-calendar"></i><input type="text" name="date[' + $i + ']" id="leave' + $i + '" placeholder="Leave Date"></label></div>' +
            '<div class="col-md-2"><?php echo Form::select('leaveType[]', $leaveTypes,null,['class' => 'form-control leaveType','id'=>'leaveType','onchange'=>'halfDayToggle(0,this.value)'] ); ?></div>' +
            '<div class="col-md-2"><?php echo Form::select('halfleaveType[]', $leaveTypeWithoutHalfDay,null,['class' => 'form-control halfLeaveType','id'=>'halfLeaveType'] ); ?></div>' +
            '<div class="col-md-5"><input class="form-control form-control-inline" name="reason[' + $i + ']" type="text" value="" placeholder="Reason"/></div></div>').insertBefore($insertBefore);

        $("#row" + $i + " .leaveType").attr('id', 'leaveType' + $i);
        $("#row" + $i + " .halfLeaveType").hide();
        $("#row" + $i + " .halfLeaveType").attr('id', 'halfLeaveType' + $i);
        $("#row" + $i + " .leaveType").attr('onchange', 'halfDayToggle(' + $i + ',this.value)');

        $('#leave' + $i).datepicker({
            minDate: 0,
        });
    });

    function halfDayToggle(id, value) {
        if (value == 'half day') {
            $('#halfLeaveType' + id).show(100);
        } else {
            $('#halfLeaveType' + id).hide(100);
        }
    }

    // Show change password modal body
    $('#change_password_link').on("click", function () {

        $('#change_password_modal_body').css("padding", "100px");
        $('#change_password_modal_body').html('<?php echo HTML::image('front_assets/img/loading-spinner-blue.gif'); ?>');
        $('#change_password_modal_body').attr('class', 'text-center');

        $.ajax({
            type: 'GET',
            url: "<?php echo e(route('front.change_password_modal')); ?>",

            data: {},
            success: function (response) {

                $('#change_password_modal_body').css("padding", "0px");
                $('#change_password_modal_body').removeClass('text-center');
                $('#change_password_modal_body').html(response);
            },

            error: function (xhr, textStatus, thrownError) {
                $('#change_password_modal_body').html('<div class="alert alert-danger">Error Fetching data</div>');
            }
        });

    });


    function change_password() {
        $.easyAjax({
            type: 'POST',
            url: "<?php echo e(route('front.change_password')); ?>",
            data: $('#change_password_form').serialize(),
            container: "#change_password_form",
            success: function (response) {
                if (response.status == "success") {
                    $('.change_password_modal').modal('hide');
                }
            }
        });
        return false;
    }

    function submitLeave() {

        $.easyAjax({
            type: 'POST',
            url: "<?php echo e(route('front.leave_store')); ?>",
            data: $('#leave-form').serialize(),
            container: "#leave-form",
            messagePosition: 'inline',
        });
        return false;
    }

    //COMMENT VIEW ON QUESTION
    function showNotice(noticeID) {
        $('#showModal .modal-dialog').removeClass("modal-md").addClass("modal-lg");
        var url = "<?php echo e(route('front.show_notice',[':id'])); ?>";
        url = url.replace(':id', noticeID);
        $.ajaxModal('#showModal', url);
        $('#user_' + noticeID).removeClass('info');
        $('#contact_manager_' + noticeID).parent('li').removeClass('notification');
    }

    function showAwardDetails(awardID) {
        $('#showModal .modal-dialog');
        var url = "<?php echo e(route('front.show_award_details',[':id'])); ?>";
        url = url.replace(':id', awardID);
        $.ajaxModal('#showModal', url);
    }
</script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\keralavision\resources\views/front/layouts/frontlayout.blade.php ENDPATH**/ ?>