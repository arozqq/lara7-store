<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="/" target="_blank">LARA7 STORE</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="/"  target="_blank">L7S</a>
    </div>
    <ul class="sidebar-menu">
      <?php if(Auth::user()->role === 'super-admin' || 'admin'): ?>
      <li class="menu-header">Dashboard</li>
      <li class="<?php echo e(Request::is('dashboard') ? "active" : ""); ?>">
        <a href="/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Application</li>
      <li class="<?php echo e(Request::is('/user') ? "active" : ""); ?>">
        <a class="nav-link" href="/user"><i class="fas fa-users"></i> <span>User</span></a>
      </li>
      <li class="<?php echo e(Request::is('product') ? "active" : ""); ?>">
        <a class="nav-link" href="/product"><i class="fas fa-cart-arrow-down"></i> <span>Product</span></a>
      </li>
      <li class="<?php echo e(Request::is('brand') ? "active" : ""); ?>">
        <a class="nav-link" href="/brand"><i class="fas fa-store-alt"></i> <span>Brand</span></a>
      </li>
      <li class="<?php echo e(Request::is('categories') ? "active" : ""); ?>">
        <a class="nav-link" href="/categories"><i class="fas fa-tags"></i> <span>Categories</span></a>
      </li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Management</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="layout-default.html">User</a></li>
          <li><a class="nav-link" href="layout-transparent.html">Product</a></li>
          <li><a class="nav-link" href="layout-top-navigation.html">Brand</a></li>
        </ul>
      </li>
      <?php endif; ?>
      <li class="menu-header">My Account</li>
      <li class="<?php echo e(Request::is('profile') ? "active" : ""); ?>">
        <a href="/account/profile" class="nav-link"><i class="far fa-user"></i><span>Profile</span></a>
      </li>
    </ul>
      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="javascript:void(0)" class="btn btn-success btn-lg btn-block btn-icon-split" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
          <?php echo csrf_field(); ?>
      </form>
      </div>
  </aside>
</div><?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/layouts/admin_layout/admin-sidebar.blade.php ENDPATH**/ ?>