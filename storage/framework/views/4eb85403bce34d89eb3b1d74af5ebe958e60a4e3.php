<?php echo $__env->make('layouts.front_layout.front-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- Shoping Cart Section Begin -->
    <section class="p-3 my-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="shoping__cart__table" id="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-checkbox custom-control mx-3">
                                        <input type="checkbox" class="custom-control-input" id="check-all">
                                        <label for="check-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th class="shoping__product">Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                               
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $userCartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <form method="POST" id="form-cart">
                                        <?php echo csrf_field(); ?>
                                      <input type="text" name="hidden_cart_id" value="<?php echo e($item->id); ?>">  
                                    <td>
                                        <div class="custom-checkbox custom-control mx-3"><input type="checkbox" class="custom-control-input checkbox-select" id="<?php echo e($item->id); ?>" name="ids" value="<?php echo e($item->id); ?>"><label for="<?php echo e($item->id); ?>" class="custom-control-label"></label></div>
                                    </td>
                                    <td class="shoping__cart__item">
                                        <img src="<?php echo e(asset('/storage/'.$item->product->thumbnail)); ?>" alt="">
                                        <h5><?php echo e($item->product->product_name); ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        Rp. <?php echo number_format($item->product->harga, 0, ',', '.'); ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="<?php echo e($item->jumlah_barang); ?>" name="jumlah_barang" class="qty_val">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php
                                            $totalHargaItem = $item->product->harga * $item->jumlah_barang;
                                        ?>
                                        Rp. <?php echo number_format($totalHargaItem, 0, ',', '.'); ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close" id="delete-item" data-id="<?php echo e($item->id); ?>"></span>
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <td colspan="5" class="text-center">
                                        Keranjang masih kosong <br>
                                        <a href="/" class="text-center btn btn-link">Lihat Produk</a>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="d-flex justify-content-between ">
                        <a href="/" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <button type="submit" class="btn btn-outline-danger d-none">Delete Selected</button>
                        <button type="submit" class="primary-btn cart-btn cart-btn-right btn-update"><span class="icon_loading"></span>
                            Upadate Cart</button>
                    </div>
                </form>

                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>$454.98</span></li>
                            <li>Total <span>$454.98</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
    <?php echo $__env->make('layouts.front_layout.front-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
        <script>
            $('#form-cart .btn-update').on('submit', function(){
                event.preventDefault();
                var ids = [];
                $(".qty_val").each(function(){
                    ids.push($(this).val());
                 });
                
            // console.log(ids);

                // if(ids.length <= 0) {
                //     // cek ketersediaan barang
                //     // kalo kurang kasih alert stok barang tidak cukup
                // }
                $.ajax({
                    url: "<?php echo e(route('cart.update')); ?>",
                    method: "POST",
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        location.reload();
                        Response(response);
                    }
                })
            })
            // Single Delete Product
            $(document).on('click', '#delete-item', function () {
                    let id = $(this).data('id');
                    Swal.fire({
                        title: 'Are you sure ?',
                        text: "This product item will be remove from your cart",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#47C363',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                            url: "/cart/"+id+"/",
                            type: "POST",
                            data: {
                                '_method': 'DELETE',
                                '_token': '<?php echo e(csrf_token()); ?>',
                                'id': id,
                            },
                            dataType:"JSON",
                            success: function(response) {
                                location.reload();
                                Response(response);
                                }
                            })
                        }
                        })
                    });

                
                function Response(response){
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })  
                    Toast.fire({
                    icon: 'success',
                        title: response.success,
                    })
                }
        </script>
<?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/product/cart.blade.php ENDPATH**/ ?>