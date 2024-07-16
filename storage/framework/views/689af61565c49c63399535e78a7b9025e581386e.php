<!DOCTYPE html>

<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title> HRM | Login </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- BEGIN  STYLES -->
<?php echo HTML::style("assets/global/plugins/font-awesome/css/font-awesome.min.css"); ?>

<?php echo HTML::style("assets/global/plugins/bootstrap/css/bootstrap.min.css"); ?>

<?php echo HTML::style("assets/admin/pages/css/login-soft.css"); ?>

<?php echo HTML::style("assets/global/css/components.css"); ?>

<?php echo HTML::style("assets/admin/layout/css/layout.css"); ?>

<?php echo HTML::style("assets/admin/layout/css/themes/darkblue.css"); ?>

<?php echo HTML::style('assets/global/plugins/froiden-helper/helper.css'); ?>

<!-- END STYLES -->

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="javacript:;">
        <img src="<?php echo e($setting->getLogoImageAttribute()); ?>" width="117px"/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <?php echo Form::open(array('url' => '','id'=> 'adminLogin', 'class' =>'login-form')); ?>


    <h3 class="form-title">Login to your Admin account</h3>
    <div id="alert">

    </div>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <div class="input-icon">
            <i class="fa fa-user"></i>
            <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email"
                   name="email"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password"
                   name="password"/>
        </div>
    </div>

    <div class="form-actions">

        <button type="submit" class="btn blue pull-right" id="submitbutton" onclick="login();return false;">
            Login <i class="m-icon-swapright m-icon-white"></i>
        </button>
    </div>
    <hr>
    <div class="form-group text-center">
        <a href="<?php echo e(route('front.login')); ?>"><label class="btn btn-sm green ">Go to Employee Panel</label></a>
    </div>

<?php echo Form::close(); ?>

<!-- END LOGIN FORM -->


</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
    <?php echo e(date('Y')); ?> &copy; <?php echo e($setting->website); ?>

</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<?php echo HTML::script('assets/global/plugins/respond.min.js'); ?>

<?php echo HTML::script('assets/global/plugins/excanvas.min.js'); ?>

<![endif]-->
<?php echo HTML::script("js/jquery-3.6.0.min.js"); ?>

<?php echo HTML::script("assets/global/plugins/bootstrap/js/bootstrap.min.js"); ?>

<?php echo HTML::script("assets/global/plugins/backstretch/jquery.backstretch.min.js"); ?>

<?php echo HTML::script("assets/global/scripts/metronic.js"); ?>

<?php echo HTML::script("assets/admin/layout/scripts/demo.js"); ?>

<?php echo HTML::script('assets/global/plugins/froiden-helper/helper.js'); ?>


<!-- END PAGE LEVEL SCRIPTS -->

<script>

    jQuery(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Metronic.init(); // init metronic core components

        // init background slide images
        $.backstretch([
                "<?php echo e(URL::asset('assets/admin/pages/media/bg/1.jpg')); ?>",
                "<?php echo e(URL::asset('assets/admin/pages/media/bg/2.jpg')); ?>",
                "<?php echo e(URL::asset('assets/admin/pages/media/bg/3.jpg')); ?>",
                "<?php echo e(URL::asset('assets/admin/pages/media/bg/4.jpg')); ?>"
            ], {
                fade: 1000,
                duration: 8000
            }
        );
    });
</script>


<script>
    function login() {
        $.easyAjax({
            type: 'POST',
            url: "<?php echo e(route('admin.login')); ?>",
            data: $('#adminLogin').serialize(),
            container: "#adminLogin",
            messagePosition: 'inline',
            success: function (response) {
                if (response.status == "success") {
                    $('#login-form')[0].reset();
                }
            }
        });
        return false;
    }

</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
<?php /**PATH C:\Users\Milan\Desktop\Work\keralavision\resources\views/admin/login.blade.php ENDPATH**/ ?>