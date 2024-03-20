<section class="categories">
  <div class="container">
      <div class="row">
          <div class="categories__slider owl-carousel">
            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                  
            <div class="col-lg-3">
                <div class="categories__item set-bg" data-setbg="<?php echo e(asset('/storage/'. $brand->logo)); ?>">
                    <h5><a href="<?php echo e(route('brand.show', $brand->slug)); ?>"><?php echo e($brand->brand_name); ?></a></h5>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
      </div>
  </div>
</section><?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/product/brands.blade.php ENDPATH**/ ?>