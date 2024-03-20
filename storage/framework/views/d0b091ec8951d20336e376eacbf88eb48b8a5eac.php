<?php if(Auth::user()->profile->address === null || Auth::user()->profile->phone_number === null ): ?>
    <div class="alert alert-primary alert-dismissible fade show my-3" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      Please complete your personal data.
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/components/notification.blade.php ENDPATH**/ ?>