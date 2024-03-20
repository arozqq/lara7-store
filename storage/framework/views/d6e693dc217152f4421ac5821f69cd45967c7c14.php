
<?php $__env->startPush('before-script'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="section-header">
      <h1>Products</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-lg">
          <div class="card">
            <div class="card-body p-3">
              <div class="table-responsive">
                <a href="#" class="btn btn-primary mb-3  px-4" id="btn-newProduct">Add Product</a>
                <a href="#" class="btn btn-outline-danger mb-3 px-4 ml-3" id="deleteall">Delete All</a>
                <table class="table table-striped table-bordered" id="products-datatables">
                  <thead class="bg-success">
                      <th>
                      <div class="custom-checkbox custom-control text-center">
                      <input type="checkbox" class="custom-control-input" id="check-all">
                      <label for="check-all" class="custom-control-label">&nbsp;</label>
                      </div>
                      </th>
                      <th class="text-white">Product</th>
                      <th class="text-white">Brand</th>
                      <th class="text-white">Category</th>
                      <th class="text-white">Stock</th> 
                      <th class="text-white">Harga</th>
                      <th class="text-white">Status</th>    
                      <th class="text-white">Action</th>      
                  </thead>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>


<!-- Add and Edit user modal -->
<div class="modal fade" id="product-modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="productModalTitle"></h4>
      </div>
    <div class="modal-body"> 
      <span id="form-result"></span>
      <form name="productForm" id="productForm" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" id="id">
        <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="thumb">Product Image :</label>
            <input type="file" class="form-control" name="image" id="image" accept="image/*"/>
            <input type="hidden" name="hidden_image" id="hidden_image">             
        </div>
        
          <div class="form-group">
          <label for="product_name">Product :</label>
          <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product name">
          </div>  

          <div class="form-group row">
              <div class="col">
                <label for="brand_name">Brand :</label>
                <select name="brand_name" id="brand_name" class="form-control">
                  <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                      
                  <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->brand_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="col">
                <label for="category_name">Category :</label>
                <select name="category_name" id="category_name" class="form-control">
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                      
                  <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="col">
                  <label class="form-label">Gender</label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="gender" value="male" class="selectgroup-input">
                      <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-male" title="Male"></i></span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="gender" value="female" class="selectgroup-input" checked="">
                      <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-female" title="Female"></i></span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="gender" value="unisex" class="selectgroup-input" checked="">
                      <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-venus-mars" title="Unisex"></i></span>
                    </label>
                  </div>
              </div>
          </div>

          <div class="form-group row">
            <div class="col-md-4 mb-3">
              <label for="harga">Harga :</label>
            <input type="text" name="harga" id="harga" class="form-control">
            </div>
            <div class="col">
              <label for="stok">Stock :</label>
            <input type="text" name="stok" id="stok" class="form-control">
            </div>
            <div class="col">
              <label for="status">Status :</label>
              <div class="form-group">
                <label class="mt-2">
                  <input type="checkbox" name="status" class="custom-switch-input" id="status"> 
                 <span class="custom-switch-indicator"></span>
                 <span class="custom-switch-description">Active</span>
               </label>
             </div>
            </div>
            <div class="col">
              <label for="status">Featured :</label>
              <div class="form-group">
                <label class="mt-2">
                  <input type="checkbox" name="featured" class="custom-switch-input" id="featured" disabled> 
                 <span class="custom-switch-indicator"></span>
                 <span class="custom-switch-description">Featured</span>
               </label>
             </div>
            </div>
          </div>  

      

          <div class="form-group">
            <label for="deskripsi">Deskripsi :</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" style="min-height: 200px"></textarea>
          </div>
        </div>
 
        <div class="col-md-12 text-center">
        <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary mr-3">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
      </form>
    </div>
  </div>
  </div>
</div>
<!-- AKHIR MODAL -->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('after-script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>


<script>
    $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });


  $(document).ready(function(){
    $('#products-datatables').DataTable({
      processing:true,
      serverside:true,
      ajax:"<?php echo e(route('product.index')); ?>",
      columns: [
        {data:'checkbox',name:'name', orderable:false},
        {data:'product_name',name:'product_name'},
        {data:'brand_id', name:'brand_name'},
        {data:'category_id', name:'category_name'},
        {data:'stok', name:'stok'},
        {data:'harga', name:'harga'},
        {data:'status', name:'status'},
        {data:'action', name:'action',orderable:false}, 
      ],
      // order: [0, 'ASC'],
      "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4 mb-3 text-center'B><'col-sm-12 col-md-4'f>>"+"<'row'<'col-sm-12'tr>>"+"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
			"paging": true,
			"autoWidth": true,
			"buttons": [
				'copyHtml5',
        'csvHtml5',
				'excelHtml5',
        'pdfHtml5',
				'print'
			],
      order: [0, 'ASC'],
      responsive: true
      });
  });

  /* When click New product button */
$('#btn-newProduct').click(function () {
  $('#btn-save').val("create-product");
  $('#btn-save').html("Save");
  $('#id').val('');
  $('#form-result').html('');
  $('#productForm').trigger("reset");
  $('#productModalTitle').html("Add New Product");
  $('#product-modal').modal('show');
});

// conditinal value checkboxes
let status = $("#status");  
let featured = $("#featured");

status.on("change",function(){
  if(status.is(':checked')) {
        status.val(1);
        featured.val(0)
        status.prop('checked', true);
        featured.prop("disabled", false)
      }else{
        status.prop('checked', false);
        featured.prop('checked', false);
        featured.prop("disabled", true)
        status.val(0);
        featured.val(0);
      }
});

featured.on("change",function(){
  if(featured.is(':checked')) {
        featured.prop('checked', true);
        featured.val(1);
      }else{
        featured.prop('checked', false);
        featured.val(0);
      }
});



// add
$('#productForm').on('submit', function(){
  event.preventDefault();

  var action_url = '';
  if($('#btn-save').val() == 'create-product'){
    action_url = "<?php echo e(route('product.store')); ?>"
  }
  if($("#btn-save").val() == 'update') 
    {
      action_url = "<?php echo e(route('product.update')); ?>";
    }

  $.ajax({  
    url: action_url,
    method: "POST",
    data: new FormData(this),
    dataType: "JSON",
    contentType: false,
    cache: false,
    processData: false,
    success: function(response) {
      var html = '';
      if(response.errors) {
        html = '<div class="alert alert-danger">';
        for(var count = 0;count<response.errors.length;count++){
          html += '<p>' + response.errors[count] + '</p>';
        }  
        html += '</div>';
      }

      if(response.success) {
        Response(response)
        $('#productForm').trigger("reset");
        $('#product-modal').modal("hide");
        $('#btn-save').html("Save");
        $('#products-datatables').DataTable().ajax.reload();
      }
      $('#form-result').html(html);
    }
  })
})


// Edit Product
$(document).on("click", "#edit-product", function(){
  var id = $(this).data('id');
  $("#form-result").html("");
  $.get('/product/'+id+'/edit', function(data) {
    $("#productModalTitle").html("Detail Product");
    $("#btn-save").html("Update");
    $("#btn-save").val("update");
    $("#product-modal").modal('show');
    $("#id").val(data.id);
    $("#product_name").val(data.product_name);
    $("#brand_name").val(data.brand_id);
    $("#category_name").val(data.category_id);
    $("#gender").val(data.gender);
    $("#harga").val(data.harga);
    $("#stok").val(data.stok);
    $("#deskripsi").val(data.deskripsi);
    var f = $("#featured").val(data.featured)
    var s = $("#status").val(data.status)

    if(s.val() == 0 && f.val() == 0) {
      s.prop("checked", false);
      f.prop("checked", false);
      f.prop("disabled", true);
    } else if(s.val() == 1 && f.val() == 0) {
      s.prop("checked", true)
      f.prop("disabled", false) 
      f.prop("checked", false)   
    } else if(s.val() == 1 && f.val() == 1) {
      s.prop("checked", true)
      f.prop("checked", true)
    } 
  
    // preview img
    var thumbs = data.thumbnail;
      $("<div class=\"img-thumb-wrapper card shadow\">" +
            "<img class=\"img-thumb\" src=\"<?php echo e(asset('storage')); ?>/" + thumbs + "\" title=\"" + thumbs + "\"/>"+
          "<br/><span class=\"remove\">Remove</span>" +
          "</div>").insertAfter("#image");
        $(".remove").click(function(){
          $(this).parent(".img-thumb-wrapper").remove();
        });
    $('#hidden_image').val(thumbs);

  });
});

// Hapus preview thumb edit when close
$('#product-modal').on('hidden.bs.modal', function (e) {
$(".img-thumb-wrapper").remove();
})

// Single Delete Product
$(document).on('click', '#delete-product', function () {
          let id = $(this).data('id');
          Swal.fire({
              title: 'Are you sure ?' + id,
              text: "This Product data will be permanently delete",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#47C363',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: "/product/"+id+"/",
                  type: "POST",
                  data: {
                      '_method': 'DELETE',
                      '_token': '<?php echo e(csrf_token()); ?>',
                      'id': id,
                  },
                  dataType:"JSON",
                  success: function(response) {
                    $('#products-datatables').DataTable().ajax.reload();
                    Response(response);
                    }
                  })
              }
            })
          });


// Delete Selected
$(function(){
      $('#check-all').on('click', function(){
        $('.checkbox-select').prop('checked', $(this).prop('checked'))
      });

      $('#deleteall').on('click', function(e){
        e.preventDefault();
        var ids = [];
        $(".checkbox-select:checked").each(function(){
          ids.push($(this).val());
        });

        
        if(ids.length <= 0)
        {
          alert("Please Selected Products Checkbox !")
          } else {
            var strIds = ids.join(",");
            Swal.fire({
              title: 'Are you sure delete selected data?',
              text: "Products data will be permanently delete",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#47C363',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) =>
            {
              if (result.isConfirmed) {
                  $.ajax({
                url:"/selected-products",
                type: "POST",
                data:{
                  _method:"DELETE",
                  _token: '<?php echo e(csrf_token()); ?>',
                  id:strIds
                },
                success:function(response)
                {
                  $('#products-datatables').DataTable().ajax.reload();
                  Response(response);
                }
                }); 
              }
            })
          }
        });
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

  <script>
    // custom upload multi img
   function readURL(input) {
     if(input.files && input.files[0]){
      var file = input.files[0],
      reader = new FileReader();
      reader.onload = (function(e) {
        $("<div class=\"img-thumb-wrapper card shadow\">" +
          "<img class=\"img-thumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
          "<br/><span class=\"remove\">Remove</span>" +
          "</div>").insertAfter("#image");
        $(".remove").click(function(){
          $(this).parent(".img-thumb-wrapper").remove();
        });
      });
      reader.readAsDataURL(file);
     }
    
   }
     
   $("#image").change(function(){
    (readURL(this));
   });
     
</script>


<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.admin_layout.admin-master', ['title' => 'Products'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/admin/product.blade.php ENDPATH**/ ?>