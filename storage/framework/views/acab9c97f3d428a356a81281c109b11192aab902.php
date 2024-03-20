<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex bg-dark text-white align-items-center justify-content-between">
                    <div>Silahkan Verifikasi Email Anda</div>
                    <div><?php echo e(Auth::user()->email); ?></div>
                </div>
                
                <div class="card-body pb-5">
                    <?php if(session('resent')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(__('Tautan verifikasi yang baru sudah dikirim ke email anda.')); ?>

                    </div>
                    <?php endif; ?>
                    
                    <?php echo e(__('Sebelum belanja, cek email kamu dulu yuk untuk verifikasi email.')); ?>

                    <?php echo e(__('Jika kamu belum terima email')); ?>,
                    <form class="d-inline" method="POST" action="<?php echo e(route('verification.resend')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline custom__link"><?php echo e(__('Kirim ulang')); ?></button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.user-master', ['title' => 'Verify'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/auth/verify.blade.php ENDPATH**/ ?>