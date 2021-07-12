<?php $__env->startSection('content'); ?>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2><?php echo e(__('Đặt lại mật khẩu')); ?></h2>
            <?php if(session('status')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('password.email')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <label for="admin_email" class="col-md-12" style="color: #fff; font-weight: normal;"><?php echo e(__('Địa chỉ E-Mail')); ?></label>

                    <div class="col-md-12">
                        <input id="admin_email" type="admin_email" class="ggg <?php $__errorArgs = ['admin_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            name="admin_email" value="<?php echo e(old('admin_email')); ?>" required autocomplete="admin_email" autofocus placeholder="Email">

                        <?php $__errorArgs = ['admin_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <input type="submit" value="<?php echo e(__('Send Password Reset Link')); ?>" name="<?php echo e(__('SendPassword')); ?>">
            </form>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Ecommere_Project\WhyTech\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>