

<?php $__env->startSection('title', 'Admin - Login'); ?>

<?php $__env->startSection('content'); ?>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Đăng nhập</h2>
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="input-box <?php $__errorArgs = ['admin_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <i class="input-icon fas fa-envelope"></i>
                    <input id="admin_email" type="email" class="ggg <?php $__errorArgs = ['admin_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        name="admin_email" value="<?php echo e(old('admin_email')); ?>" required autocomplete="email" autofocus
                        placeholder="Email">
                </div>
                <div class="input-box <?php $__errorArgs = ['admin_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <i class="input-icon fas fa-lock"></i>
                    <input id="admin_password" type="password" class="ggg" name="password" required
                        autocomplete="current-password" placeholder="Password">
                    <span class="eye" style="margin-top: 5px;" onclick="myFunction()">
                        <i id="hide1" class="input-icon far fa-eye"></i>
                        <i id="hide2" class="input-icon far fa-eye-slash"></i>
                    </span>
                </div>
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
                <span>
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        <?php echo e(old('remember') ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="remember">
                        <?php echo e(__('Nhớ đăng nhập')); ?>

                    </label>
                </span>
                <?php if(Route::has('password.request')): ?>
                    <h6>
                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                            <?php echo e(__('Quên mật khẩu?')); ?>

                        </a>
                    </h6>
                <?php endif; ?>
                <div class="clearfix"></div>
                <input type="submit" value="Đăng nhập" name="login">
                <div class="form-group row" style="margin-bottom: 50px;">
                    <div class="col-md-6">
                        <a href="<?php echo e(route('admin.facebook')); ?>" class="btn btn-primary" style="height: 40px;">
                            <i class="auth-form__socials-icon fab fa-facebook-square" style="line-height: 25px;"></i>
                            Đăng nhập với Facebook
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo e(route('admin.google')); ?>" class="btn btn-danger" style="height: 40px;">
                            <i style="line-height: 25px;"><img class="btn__google-logo"
                                    src="<?php echo e(asset('backend/images/google-logo.png')); ?>" style="width:18px;"
                                    alt=""></i>
                            Đăng nhập với Google
                        </a>
                    </div>
                </div>
            </form>
            <p style="text-align: left;">Bạn chưa có tài khoản?<a href="<?php echo e(route('register')); ?>" class="link">Đăng ký
                    ngay.</a></p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Ecommere_Project\WhyTech\resources\views/auth/login.blade.php ENDPATH**/ ?>