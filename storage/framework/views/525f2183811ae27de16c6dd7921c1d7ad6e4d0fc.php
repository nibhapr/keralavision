<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="javascript:;">
                <img src="<?php echo e($setting->getLogoImageAttribute()); ?>" height="30px"/>
            </a>
            <div class="menu-toggler sidebar-toggler hide">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">

                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <i class="icon-bell"></i>

                        <?php if(count($pending_applications)>0): ?>
                            <span class="badge badge-default">
                            <?php echo e(count($pending_applications)); ?>

                        </span>
                        <?php endif; ?>

                    </a>


                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3><span class="bold"><?php echo e(count($pending_applications)); ?> pending</span> notifications</h3>

                        </li>
                        <?php if(count($pending_applications)>0): ?>
                            <li>
                                <ul class="dropdown-menu-list scroller" data-handle-color="#637283">
                                    <?php $__currentLoopData = $pending_applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pending): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a data-toggle="modal" href="#static_leave_requests"
                                               onclick="show_application_notification(<?php echo e($pending->id); ?>);return false;">
                                                <span
                                                    class="time"><?php echo e(date('d-M-Y',strtotime($pending->created_at))); ?></span>
                                                <?php if($pending->employeeDetails): ?>
                                                    <span class="details">
                                            <span class="label label-sm label-icon label-success">
                                                <i class="fa fa-bell-o"></i>
                                            </span>
                                            <strong><?php echo e($pending->employeeDetails->fullName); ?> </strong> has applied for
                                            leave on <?php echo e(date('d-M-Y',strtotime($pending->date))); ?></span>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>

                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">

                        <span class="username username-hide-on-mobile">
                            <?php echo e($loggedAdmin->name); ?></span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="<?php echo e(route('admin.profile_settings.edit',Auth::guard('admin')->user()->id)); ?>">
                                <i class="icon-user"></i> My Profile </a>
                        </li>

                        <li class="divider">
                        </li>
                        
                        
                        
                        
                        <li>
                            <a href="<?php echo e(URL::route('admin.logout')); ?> " id="logout-form">
                                <i class="icon-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->

            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->



<?php echo Form::open(['url'=>'','id'=>'edit_form_leave','method'=>'PATCH']); ?>

<div id="static_leave_requests" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <span class="caption-subject font-red-sunglo bold uppercase">Leave Application</span>
            </div>
            <div class="modal-body" id="modal-data-leave">
                
            </div>
        </div>

    </div>
</div>
</div>
<?php echo Form::close(); ?>



<script>
    function show_application_notification(id) {
        $("#modal-data-leave").html('<div class="text-center"><?php echo HTML::image('assets/admin/layout/img/loading-spinner-blue.gif'); ?></div>');
        var editUrl = "<?php echo e(route('admin.leave_applications.update',[':id'])); ?>";
        editUrl = editUrl.replace(':id', id);
        $('#edit_form_leave').attr('action', editUrl);

        var url = "<?php echo e(route('admin.leave_applications.show',[':id'])); ?>";
        url = url.replace(':id', id);
        $('#edit_form_leave').attr('action', url);

        $.ajax({
            type: "GET",
            url: url

        }).done(function (response) {
            $('#modal-data-leave').html(response);
//
        });
    }
</script>
<?php /**PATH C:\xampp\htdocs\keralavision\resources\views/admin/include/header.blade.php ENDPATH**/ ?>