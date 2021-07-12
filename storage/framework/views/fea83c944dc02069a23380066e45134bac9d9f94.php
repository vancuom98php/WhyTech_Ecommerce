<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <title>Why-Tech | <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- bootstrap-css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/bootstrap.min.css')); ?>">

    <!-- Custom CSS -->
    <link href="<?php echo e(asset('public/backend/css/style.css')); ?>" rel='stylesheet' type='text/css' />
    <link href="<?php echo e(asset('public/backend/css/admin_login_style.css')); ?>" rel='stylesheet' type='text/css' />
    <link href="<?php echo e(asset('public/backend/css/style-responsive.css')); ?>" rel="stylesheet" />

    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>

    <!-- font-awesome icons -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/font.css')); ?> type="text/css" />
    <link href="<?php echo e(asset('public/backend/css/font-awesome.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- //font-awesome icons -->
    <script src="<?php echo e(asset('public/backend/js/jquery2.0.3.min.js')); ?>"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('public/backend/images/favicon.ico')); ?>" type="image/x-icon">
</head>

<body>
    <div id="app">
        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script src="<?php echo e(asset('public/backend/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('public/backend/js/jquery.dcjqaccordion.2.7.js')); ?>"></script>
    <script src="<?php echo e(asset('public/backend/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('public/backend/js/jquery.slimscroll.js')); ?>"></script>
    <script src="<?php echo e(asset('public/backend/js/jquery.nicescroll.js')); ?>"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="<?php echo e(asset('public/backend/js/jquery.scrollTo.js')); ?>"></script>
</body>

</html>
<?php /**PATH D:\xampp\htdocs\Ecommere_Project\WhyTech\resources\views/layouts/app.blade.php ENDPATH**/ ?>