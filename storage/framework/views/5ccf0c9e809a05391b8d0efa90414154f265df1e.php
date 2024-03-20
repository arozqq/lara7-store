   <!-- Featured Section Begin -->
   <section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <?php $__empty_1 = true; $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="featured__item shadow">
                    <div class="featured__item__pic set-bg" data-setbg="<?php echo e(asset('storage/'.$f->thumbnail )); ?>">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text pb-3">
                        <h6><a href="#"><?php echo e($f->product_name); ?></a></h6>
                        <h5>Rp. <?php echo number_format($f->harga, 0, ',', '.'); ?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col">
                <div class="alert alert-info text-center" role="alert">
                    <strong>Empty Featured Products.</strong> Please check product data 
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Featured Section End --><?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/product/featured.blade.php ENDPATH**/ ?>