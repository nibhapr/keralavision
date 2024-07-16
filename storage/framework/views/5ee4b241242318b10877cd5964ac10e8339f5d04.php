<meta charset="utf-8"/>
<title><?php echo e($setting->website); ?> - <?php echo e($pageTitle); ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?php echo HTML::style("https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all"); ?>

<?php echo HTML::style("assets/global/plugins/font-awesome/css/font-awesome.min.css"); ?>

<?php echo HTML::style("assets/global/plugins/simple-line-icons/simple-line-icons.min.css"); ?>

<?php echo HTML::style("assets/global/plugins/bootstrap/css/bootstrap.min.css"); ?>

<?php echo HTML::style("assets/global/plugins/uniform/css/uniform.default.css"); ?>

<?php echo HTML::style("assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"); ?>


<?php echo $__env->yieldContent('head'); ?>

<?php echo HTML::style("assets/global/css/components.css"); ?>

<?php echo HTML::style("assets/global/css/plugins.css"); ?>

<?php echo HTML::style("assets/admin/layout/css/layout.css"); ?>

<?php echo HTML::style("assets/admin/layout/css/themes/darkblue.css"); ?>

<?php echo HTML::style("assets/admin/layout/css/custom.css"); ?>

<?php echo HTML::style('assets/global/plugins/froiden-helper/helper.css'); ?>

<?php /**PATH C:\Users\Milan\Desktop\Work\keralavision\resources\views/admin/include/head.blade.php ENDPATH**/ ?>