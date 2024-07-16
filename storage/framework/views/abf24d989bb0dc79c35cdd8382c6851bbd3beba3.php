

<?php $__env->startSection('content'); ?>
    <h4 style="margin: 0 0 10px 0; font-family: 'Open Sans',sans-serif; font-size: 18px; line-height: 23px; color: #333333; font-weight: normal;">
        Hi <?php echo e(\Illuminate\Support\Str::words($fullName,1,'')); ?>!</h4>
    <b> <?php echo e(\Illuminate\Support\Str::words($fullName,1,'')); ?></b> Your account is created on <?php echo e($website); ?><br/><br/>
    <p>Your Login details as below!</p>

    <p><strong>Email</strong>: <?php echo e($email); ?></p>
    <p><strong>Password</strong>: <?php echo e($password); ?></p>
    <br/>
    <br/>
    <p>Try Logging at <a
            href="<?php echo e(\Illuminate\Support\Facades\URL::to('/')); ?>"><?php echo e(\Illuminate\Support\Facades\URL::to('/')); ?></a></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('callToAction'); ?>
    <tr>
        <td style="padding: 0 40px 30px; font-family: 'Open Sans',sans-serif; font-size: 15px; line-height: 20px; color: #555555;">

        </td>
    </tr>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('emails.email', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\keralavision\resources\views/emails/admin/employee_add.blade.php ENDPATH**/ ?>