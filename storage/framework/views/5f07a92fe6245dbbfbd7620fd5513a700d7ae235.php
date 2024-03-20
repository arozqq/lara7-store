    <!-- Header Section Begin -->
   <?php echo $__env->make('layouts.front_layout.front-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- Header Section End -->
     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.alert','data' => []]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
   <!-- Hero Section Begin -->
   <?php echo $__env->make('product.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- Hero Section End -->
   
   <!-- Categories Section Begin -->
   <?php echo $__env->make('product.brands', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Categories Section End -->

    <!-- product Section Begin -->
   <?php echo $__env->make('product.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- product Section End -->

    <!-- Banner Begin -->
    
    <!-- Banner End -->


    <!-- Footer Section Begin -->
  <?php echo $__env->make('layouts.front_layout.front-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Footer Section End -->

   <?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/layouts/front_layout/front-master.blade.php ENDPATH**/ ?>