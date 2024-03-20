
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card text-left px-3">
            <div class="card-body"> 
                <h4 class="pt-3">My Profile</h4>
                <p>Manage your profile information to control, and protect your account.</p>
                <hr class="mt-0">
                <div class="row p-3">
                    <div class="col-lg-7 col-md order-lg-first order-md-last">
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
                      <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.notification','data' => []]); ?>
<?php $component->withName('notification'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                        <form action="/account/profile/<?php echo e(Auth::user()->profile->id); ?>/update" method="post" enctype="multipart/form-data">
                            <?php echo method_field('patch'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <input type="hidden" name="id" id="id" value="<?php echo e(Auth::user()->id); ?>">
                                <div class="col-lg-2"><label class="text-secondary" for="username">Username</label></div>
                                <div class="col-lg"><label><?php echo e(Auth::user()->username); ?></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2"><label class="text-secondary" for="name">Fullname</label></div>
                                    <div class="col-lg"><input type="text" name="name" id="name" class="form-control" value="<?php echo e(Auth::user()->name); ?>"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2"><label class="text-secondary" for="email">Email</label></div>
                                    <div class="col-lg"><input type="text" name="email" id="email" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo e(Auth::user()->email); ?>"><a href="javascript:void(0)" class="custom__link" ><small>Change</small></a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2"><label class="text-secondary" for="email">Password</label></div>
                                    <div class="col-lg"><input type="password"  name="password" id="password" class="form-control-plaintext" value="<?php echo e(Auth::user()->password); ?>" readonly><a href="<?php echo e(route('password.change')); ?>" class="custom__link"><small>Change</small></a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2"><label class="text-secondary" for="email">Gender</label></div>
                                    <div class="col-lg">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="gender" id="gender" value="Pria" <?php echo e(Auth::user()->profile->gender === "Pria" ? "checked='checked'" : ""); ?>>Pria
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Wanita" <?php echo e(Auth::user()->profile->gender === "Wanita" ? "checked='checked'" : ""); ?>>Wanita
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2"><label class="text-secondary" for="address">Address</label></div>
                            <div class="col-lg"><input type="text" name="address" id="address" class="form-control" value="<?php echo e(Auth::user()->profile->address); ?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2"><label class="text-secondary" for="phone_number">Phone</label></div>
                            <div class="col-lg"><input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo e(Auth::user()->profile->phone_number); ?>"></div>
                        </div>
                        <button type="submit" class="btn btn-success offset-lg-2 px-4">Save</button>
                    </div>
                    <div class="col-lg-5 d-flex justify-content-center align-items-center order-first">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="avatar"/>
                                <label for="imageUpload"></label>
                                <span class="icon-upload fas fa-upload"></span>
                            </div>
                            <div class="avatar-preview mb-3">
                                <div id="imagePreview" style="background-image: url('<?php echo e(Auth::user()->profile->TakeAvatar); ?>')">
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('after-script'); ?>
    <script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(800);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    (readURL(this));
});
    </script>
<?php $__env->stopPush(); ?>    

<?php echo $__env->make('layouts.user.user-master', ['title' => 'My Profile'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/user/profile.blade.php ENDPATH**/ ?>