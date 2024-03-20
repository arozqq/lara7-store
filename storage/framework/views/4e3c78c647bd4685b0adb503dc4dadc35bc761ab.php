<?php
    use App\Category;
    $categories = Category::get();
?>
<section class="hero">
  <div class="container">
      <div class="row">
          <div class="col-lg-3">
              <div class="hero__categories">
                  <div class="hero__categories__all">
                      <i class="fa fa-bars"></i>
                      <span>Kategori</span>
                  </div>
                  <ul>
                      <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                      <li><a href="<?php echo e(route('categories.show', $category->slug)); ?>"><?php echo e($category->category_name); ?></a></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <li>Belum ada kategori.</li>
                      <?php endif; ?>
          
                  </ul>
              </div>
          </div>
          <div class="col-lg-9">
              <div class="hero__search">
                  <div class="hero__search__form">
                      <form action="#">
                          <input type="text" placeholder="Mau belanja apa hari ini?">
                          <button type="submit" class="site-btn">Cari</button>
                      </form>
                  </div>
              </div>
              <div class="hero__item set-bg mb-5" data-setbg="<?php echo e(asset("assets/img/hero/banner.jpg")); ?>">
                  <div class="hero__text">
                      <span>FRUIT FRESH</span>
                      <h2>Vegetable <br />100% Organic</h2>
                      <p>Free Pickup and Delivery Available</p>
                      <a href="#" class="primary-btn">SHOP NOW</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section><?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/product/hero.blade.php ENDPATH**/ ?>