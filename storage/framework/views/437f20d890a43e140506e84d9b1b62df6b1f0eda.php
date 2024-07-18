<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>

            
            <li class="start <?php echo e($dashboardActive ?? ''); ?>">
                <a href="<?php echo e(URL::to('admin')); ?>">
                    <i class="fa fa-home"></i>
                    <span class="title"><?php echo Lang::get('menu.dashboard'); ?></span>
                    <span class="selected"></span>
                </a>
            </li>
            


            
            <li class="<?php echo e($employeesActive ?? ''); ?>">
                <a href="<?php echo e(route('admin.employees.index')); ?>">
                    <i class="fa fa-users"></i>
                    <span class="title"><?php echo Lang::get('menu.employees'); ?></span>
                </a>
            </li>
            

            
            <li class="<?php echo e($inventoryActive ?? ''); ?>">
                <a href="<?php echo e(route('admin.expenses.index')); ?>">
                    <i class="fa fa-money"></i>
                    <span class="title"><?php echo Lang::get('menu.expense'); ?></span>
                </a>
            </li>
            


            
            <!-- <li class="<?php echo e($departmentActive ?? ''); ?>">
                <a href="<?php echo e(route('admin.departments.index')); ?>">
                    <i class="fa fa-briefcase"></i>
                    <span class="title"><?php echo Lang::get('menu.department'); ?></span>
                </a>
            </li> -->
            

            
            <li class="<?php echo e($awardsActive ?? ''); ?>">
                <a href="<?php echo e(route('admin.awards.index')); ?>">
                    <i class="fa fa-trophy"></i>
                    <span class="title"><?php echo Lang::get('menu.award'); ?></span>
                </a>
            </li>
            


          


            
            <!-- <li class="<?php echo e($holidayActive ?? ''); ?>">
                <a href="<?php echo e(route('admin.holidays.index')); ?>">
                    <i class="fa fa-send"></i>
                    <span class="title"><?php echo Lang::get('menu.holiday'); ?></span>
                </a>
            </li> -->
            


            
            <!-- <li class="<?php echo e($attendanceOpen ?? ''); ?>">
                <a href="javascript:;">
                    <i class="fa fa-user"></i>
                    <span class="title"><?php echo Lang::get('menu.attendance'); ?></span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo e($markAttendanceActive ?? ''); ?>">
                        <a href="<?php echo e(route('admin.attendances.create')); ?>">
                            <i class="fa  fa-check"></i>
                            Mark Attendance</a>
                    </li>
                    <li class="<?php echo e($viewAttendanceActive ?? ''); ?>">
                        <a href="<?php echo e(route('admin.attendances.index')); ?>">
                            <i class="fa  fa-eye"></i>
                            <?php echo Lang::get('menu.viewAttendance'); ?></a>
                    </li>
                    <li class="<?php echo e($leaveTypeActive ?? ''); ?>">
                        <a href="<?php echo e(route('admin.leavetypes.index')); ?>">
                            <i class="fa fa-sitemap"></i>
                            <?php echo Lang::get('menu.leaveTypes'); ?></a>
                    </li>
                </ul>
            </li> -->

            

            
            <!-- <li class="<?php echo e($leaveApplicationActive ?? ''); ?>">
                <a href="<?php echo e(route('admin.leave_applications.index')); ?>">
                    <i class="fa fa-rocket"></i>
                    <span class="title"><?php echo Lang::get('menu.leaveApplication'); ?></span>
                </a>
            </li> -->

            


            
            <li class="<?php echo e($noticeBoardActive ?? ''); ?>">
                <a href="<?php echo e(route('admin.noticeboards.index')); ?>">
                    <i class="fa fa-clipboard"></i>
                    <span class="title"><?php echo Lang::get('menu.noticeBoard'); ?></span>
                </a>
            </li>

            

            
            <li class="<?php echo e($adminActive ?? ''); ?>">
                <a href="<?php echo e(route('admin.admin.index')); ?>">
                    <i class="fa fa-users"></i>
                    <span class="title"><?php echo Lang::get('menu.admin'); ?></span>
                </a>
            </li>
            
            
            <li class="<?php echo e($settingOpen ?? ''); ?>">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span class="title"><?php echo Lang::get('menu.settings'); ?></span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo e($settingActive ?? ''); ?>">
                        <a href="<?php echo e(route('admin.settings.edit','setting')); ?>">
                            <i class="fa  fa-cog"></i>
                            <?php echo Lang::get('menu.generalSetting'); ?></a>
                    </li>

                    <li class="<?php echo e($profileSettingActive ?? ''); ?>">
                        <a href="<?php echo e(route('admin.profile_settings.edit','setting')); ?>">
                            <i class="fa fa-user"></i>
                            <?php echo Lang::get('menu.profileSetting'); ?></a>
                    </li>
                    <li class="<?php echo e($notificationSettingActive ?? ''); ?>">
                        <a href="<?php echo e(route('admin.notificationSettings.edit','setting')); ?>">
                            <i class="fa fa-bell"></i>
                            <?php echo Lang::get('menu.notificationSetting'); ?></a>
                    </li>

                    <li class="<?php echo e($emailSettingActive ?? ''); ?>">
                        <a href="<?php echo e(route('admin.email_settings.edit','setting')); ?>">
                            <i class="fa fa-bell"></i>
                            <?php echo Lang::get('menu.emailSetting'); ?></a>
                    </li>
                </ul>
            </li>

            

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->
<?php /**PATH C:\xampp\htdocs\keralavision\resources\views/admin/include/sidebar.blade.php ENDPATH**/ ?>