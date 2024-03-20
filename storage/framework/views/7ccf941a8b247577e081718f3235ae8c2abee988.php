<!-- Sweetalert Snackbar -->
<?php if(session()->has('success')): ?> 
  <?php $__env->startPush('after-script'); ?>
  <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      Toast.fire({
        icon: 'success',
        title: `<?php echo e(session()->get('success')); ?>`
      })
</script>
  <?php $__env->stopPush(); ?>
<?php endif; ?>

<!-- Alert BS4 -->
<?php if(session()->has('msg')): ?> 
<div class="row">
  <div class="col">
    <div class="alert alert-success">
      <?php echo e(session()->get('msg')); ?>

    </div>
  </div>
  </div>
<?php endif; ?>

<?php if($errors->any()): ?>
  <div class="row">
    <div class="col-md">
      <div class="alert alert-danger">
        <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="" style="list-style-type: none"><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
    </div>
  </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/components/alert.blade.php ENDPATH**/ ?>