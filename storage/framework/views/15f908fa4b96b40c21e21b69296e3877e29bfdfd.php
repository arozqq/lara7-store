
<?php $__env->startSection('content'); ?>
<div class="row ">
  <div class="col-lg-4 col-md-4 col-sm-12">
    <a href="<?php echo e(route('admin.app.user')); ?>">
    <div class="card card-statistic-2">
      <div class="card-icon shadow-primary bg-primary">
        <i class="fas fa-user"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>User Registered</h4>
        </div>
        <div class="card-body">
          <?php echo e(count($users)); ?>

        </div>
      </div>
    </div>
  </a>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12">
    <a href="<?php echo e(route('product.index')); ?>">
    <div class="card card-statistic-2">
      <div class="card-icon shadow-primary bg-success">
        <i class="fas fa-shopping-cart"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Products</h4>
        </div>
        <div class="card-body">
          <?php echo e(count($product)); ?>

        </div>
      </div>
    </div>
  </a>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12">
    <a href="<?php echo e(route('brand.index')); ?>">
    <div class="card card-statistic-2">
      <div class="card-icon shadow-primary bg-success">
        <i class="fas fa-shopping-cart"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Brands</h4>
        </div>
        <div class="card-body">
          <?php echo e(count($brand)); ?>

        </div>
      </div>
    </div>
  </a>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout.admin-master', ['title' => 'Dashboard'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/admin/admin-dashboard.blade.php ENDPATH**/ ?>