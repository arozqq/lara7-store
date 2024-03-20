<!-- Front Header-->
<?php echo $__env->make('layouts.front_layout.front-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('product.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- User Content-->
<section>
  <div class="container">
      <?php echo $__env->yieldContent('content'); ?>
  </div>
</section>
<!-- Front Footer-->
<?php echo $__env->make('layouts.front_layout.front-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/layouts/user/user-master.blade.php ENDPATH**/ ?>