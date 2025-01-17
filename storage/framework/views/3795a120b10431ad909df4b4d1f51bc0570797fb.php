 <!-- Footer Section Begin -->
 <footer class="footer spad mt-5">
  <div class="container">
      <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="footer__about">
                  <div class="footer__about__logo">
                      <a href="./index.html"><img src="<?php echo e(asset("assets/img/logo.png")); ?>" alt=""></a>
                  </div>
                  <ul>
                      <li>Address: 60-49 Road 11378 New York</li>
                      <li>Phone: +65 11.188.888</li>
                      <li>Email: hello@colorlib.com</li>
                  </ul>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
              <div class="footer__widget">
                  <h6>Useful Links</h6>
                  <ul>
                      <li><a href="#">About Us</a></li>
                      <li><a href="#">About Our Shop</a></li>
                      <li><a href="#">Secure Shopping</a></li>
                      <li><a href="#">Delivery infomation</a></li>
                      <li><a href="#">Privacy Policy</a></li>
                      <li><a href="#">Our Sitemap</a></li>
                  </ul>
                  <ul>
                      <li><a href="#">Who We Are</a></li>
                      <li><a href="#">Our Services</a></li>
                      <li><a href="#">Projects</a></li>
                      <li><a href="#">Contact</a></li>
                      <li><a href="#">Innovation</a></li>
                      <li><a href="#">Testimonials</a></li>
                  </ul>
              </div>
          </div>
          <div class="col-lg-4 col-md-12">
              <div class="footer__widget">
                  <h6>Join Our Newsletter Now</h6>
                  <p>Get E-mail updates about our latest shop and special offers.</p>
                  <form action="#">
                      <input type="text" placeholder="Enter your mail">
                      <button type="submit" class="site-btn">Subscribe</button>
                  </form>
                  <div class="footer__widget__social">
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-pinterest"></i></a>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
              <div class="footer__copyright">
                  <div class="footer__copyright__text">
                      <p>
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;
                         <?php echo e(Date('Y')); ?> All rights reserved | Build with
                           <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://github.com/arozqq" target="_blank">Ajib Roziq</a> | Templates By <a
                              href="https://colorlib.com" target="_blank">Colorlib</a>
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      </p>
                  </div>
                  <div class="footer__copyright__payment"><img src="<?php echo e(asset("assets/img/payment-item.png")); ?>" alt=""></div>
              </div>
          </div>
      </div>
  </div>
</footer>
<!-- Footer Section End -->

 <!-- Js Plugins -->
 <script src="<?php echo e(asset("assets/js/jquery-3.3.1.min.js")); ?>"></script>
 <script src="<?php echo e(asset("assets/js/bootstrap.min.js")); ?>"></script>
 <script src="<?php echo e(asset("assets/js/jquery.nice-select.min.js")); ?>"></script>
 <script src="<?php echo e(asset("assets/js/jquery-ui.min.js")); ?>"></script>
 <script src="<?php echo e(asset("assets/js/jquery.slicknav.js")); ?>"></script>
 <script src="<?php echo e(asset("assets/js/mixitup.min.js")); ?>"></script>
 <script src="<?php echo e(asset("assets/js/owl.carousel.min.js")); ?>"></script>
 <script src="<?php echo e(asset("assets/js/main.js")); ?>"></script>

  <!-- Package js-->
 <script src="<?php echo e(asset('js/sweetalert2.all.min.js')); ?>"></script>
 <!-- Page Specific JS File -->
 <?php echo $__env->yieldPushContent('after-script'); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/layouts/front_layout/front-footer.blade.php ENDPATH**/ ?>