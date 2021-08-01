

<?php $__env->startSection('home_title', 'Home'); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('pages.include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('home_content'); ?>
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">Sản phẩm mới nhất</h2>
        <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('product.detail', ['id' => $product->product_id])); ?>">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper product-image-wrapper-index">
                            <div class="single-products">
                                <div class="productinfo text-center product-info-index">
                                    <img src="<?php echo e(asset($product->product_image_path)); ?>" alt="<?php echo e($product->product_name); ?>" />
                                    <h2><?php echo e(number_format($product->product_price)); ?> VNĐ</h2>
                                    <p><?php echo e($product->product_name); ?></p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm
                                        giỏ
                                        hàng</a>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="row">
            <div class="col-sm-7 offset-sm-4 text-right text-center-xs">
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>
    <!--features_items-->

    
    <!--/category-tab-->

    
    <!--/recommended_items-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Ecommere_Project\WhyTech\resources\views/pages/home.blade.php ENDPATH**/ ?>