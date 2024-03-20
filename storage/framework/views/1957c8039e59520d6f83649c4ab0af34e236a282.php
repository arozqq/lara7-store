<section class="featured spad">
<div class="container">
 <!-- Featured Section Begin -->
 <div class="row">
  <div class="col-lg-12">
      <div class="section-title">
        <?php if(isset($category)): ?>
    <h2><?php echo e($category->category_name); ?></h2>
      <?php endif; ?> 

      <?php if(isset($brand)): ?>
      <h2><?php echo e($brand->brand_name); ?></h2>
        <?php endif; ?> 

      <?php if(!isset($brand) && !isset($category)): ?>
          <h2>Produk Unggulan</h2>
      <?php endif; ?>
      </div>
    </div>
  </div>
        <div class="scrolling-pagination">
          <div class="row featured__filter">
              <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="featured__item">
                      <div class="featured__item__pic">
                        <img src="<?php echo e(asset('/storage/'.$product->thumbnail)); ?>" alt="product-image">
                          <ul class="featured__item__pic__hover">
                              <li title="Tambah Ke Favorit"><a href="#"><i class="fa fa-heart"></i></a></li>
                          </ul>
                      </div>
                      <div class="featured__item__text pb-3">
                          <h6><a href="<?php echo e(route("product.show", $product->slug)); ?>"><?php echo e($product->product_name); ?></a></h6>
                          <h5>Rp. <?php echo number_format($product->harga, 0, ',', '.'); ?></h5>
                      </div>
                  </div>
              </div>
              <?php echo e($products->links()); ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <div class="col">
                  <div class="alert alert-info text-center" role="alert">
                      <strong>Empty Products.</strong> Please check products data field!
                  </div>
              </div>
              <?php endif; ?>
              
          </div>
        </div>
        </div>
  </section>
  <!-- Featured Section End -->

  <!-- Loading More Data-->
   <div class="load-wrapp d-none">
      <div class="load-3">
          <p>Please Wait</p>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </div>
  

<?php $__env->startPush('after-script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script>
 $('ul.pagination').hide();
    $(function() {
        $('.scrolling-pagination').jscroll({
            loadingHtml: "<div class=\"load-wrapp\"><div class=\"load-3\"><p>Please Wait</p><div class=\"line\"></div><div class=\"line\"></div><div class=\"line\"></div></div></div>",
            autoTrigger: true,
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scrolling-pagination',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/product/product.blade.php ENDPATH**/ ?>