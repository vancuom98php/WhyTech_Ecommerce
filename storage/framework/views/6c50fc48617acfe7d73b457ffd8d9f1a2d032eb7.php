<?php $__env->startSection('title', 'Admin - Register'); ?>

<?php $__env->startSection('content'); ?>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Đăng ký</h2>
            <?php if(session()->has('notification')): ?>
                <div class="notification" style="color: green; font-weight: bold; font-style: italic;">
                    <?php echo session('notification'); ?>

                </div>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                <input id="admin_name" type="text" class="ggg <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                    value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus placeholder="Tên hiển thị">
                <?php $__errorArgs = ['admin_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <input id="admin_email" type="email" class="ggg <?php $__errorArgs = ['admin_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="admin_email"
                    value="<?php echo e(old('admin_email')); ?>" required autocomplete="email" autofocus placeholder="Email">
                <?php $__errorArgs = ['admin_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <input id="admin_phone" type="text" class="ggg <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone"
                    value="<?php echo e(old('phone')); ?>" required autocomplete="phone" autofocus placeholder="Số điện thoại">
                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <input id="admin_password" type="password" class="ggg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    name="password" required autocomplete="new-password" placeholder="Mật khẩu mới">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <input id="password-confirm" type="password" class="ggg" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Xác nhận mật khẩu">

                <div class="clearfix"></div>
                <input type="submit" value="Đăng ký" name="register">
                <div class="form-group row">
                    <div class="col-md-6">
                        <a href="<?php echo e(url('/admin')); ?>" class="btn btn-success" style="height: 40px;">
                            <i class="auth-form__socials-icon fas fa-chevron-circle-left" style="line-height: 25px;"></i>
                            Quay lại
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Ecommere_Project\WhyTech\resources\views/auth/register.blade.php ENDPATH**/ ?>