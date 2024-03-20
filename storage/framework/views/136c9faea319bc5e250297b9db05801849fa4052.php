
<?php $__env->startPush('before-script'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
  <div class="section-header">
    <h1>Brands</h1>
  </div>
  <div class="section-body">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body p-3">
              <div class="table-responsive">
                <a href="#" class="btn btn-primary mb-3  px-4" id="btn-newBrand">Add Brand</a>
                <a href="#" class="btn btn-outline-danger mb-3 px-4 ml-3" id="deleteall">Delete All</a>
                <table class="table table-striped table-bordered" id="brands-datatables">
                  <thead class="bg-success">
                      <th>
                      <div class="custom-checkbox custom-control text-center">
                      <input type="checkbox" class="custom-control-input" id="check-all">
                      <label for="check-all" class="custom-control-label">&nbsp;</label>
                      </div>
                      </th>
                      <th class="text-white">Brand</th>
                      <th class="text-white">Logo</th> 
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
<div class="modal fade" id="brand-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="brandModalTitle"></h4>
      </div>
    <div class="modal-body"> 
      <span id="form-result"></span>
      <form name="brandForm" id="brandForm" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" id="id">
        <div class="row">
        <div class="col">
          <div class="form-group">
          <label for="brand_name">Brand :</label>
          <input type="text" name="brand_name" id="brand_name" class="form-control" placeholder="Brand">
          </div>
          <div class="form-group">
          <label for="logo">Logo :</label>
          <input id="logo" type="file" name="logo" accept="image/*" 
          onchange="readURL(this);">
          <input id="hidden_logo" type="hidden" name="hidden_logo">
          <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="100" height="100">
          </div>
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

  <script>
      $(document).ready(function () {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          });


    $(document).ready(function(){
      $('#brands-datatables').DataTable({
        processing:true,
        serverside:true,
        ajax:"<?php echo e(route('brand.index')); ?>",
        columns: [
          {data:'checkbox',name:'name', orderable:false},
          {data:'brand_name',name:'brand_name'},
          {
            data:'logo', name:'logo',
            render: function(data, type, full, meta){
              if(data === null) {
              return '<img src="<?php echo e(asset("assets/img/p-50.png")); ?>" height="50"/>';
              } else {
                return '<img src="<?php echo e(asset("storage/")); ?>/'+ data +'" height="50"/>'
              }
            },
            orderable:false
          },      
          {data:'action', name:'action',orderable:false}, 
        ],
        order: [0, 'ASC'],
        responsive: true
        });
    });

    /* When click New brand button */
  $('#btn-newBrand').click(function () {
    $('#btn-save').val("create-brand");
    $('#btn-save').html("Save");
    $('#id').val('');
    $('#form-result').html('');
    $('#brandForm').trigger("reset");
    $('#brandModalTitle').html("Add New Brand");
    $('#brand-modal').modal('show');
  });

  $('#brand-modal').on('hidden.bs.modal', function (e) {
$("#modal-preview").attr('src','https://via.placeholder.com/150');
})

  // Add & Update
  $("#brandForm").on("submit", function(){
    event.preventDefault();
    var action_url = '';
    if($("#btn-save").val() == 'create-brand') 
    {
      action_url = "<?php echo e(route('brand.store')); ?>";
    }
    if($("#btn-save").val() == 'update') 
    {
      action_url = "<?php echo e(route('brand.update')); ?>";
    }

      $.ajax({  
      url: action_url,
      method: "POST",
      data: new FormData(this),
      dataType: "JSON",
      contentType: false,
      cache: false,
      processData: false,
      success:function(response){
        var html = '';
        if(response.errors){
          html = '<div class="alert alert-danger">';
          for(var count = 0;count<response.errors.length;count++)  {
            html += '<p>' + response.errors[count] + '</p>';
          }
          html += '</div>';
        }

        if(response.success){
          Response(response)
          $("#brandForm").trigger("reset");
          $("#brand-modal").modal("hide");
          $("#btn-save").html("Save");
          $('#brands-datatables').DataTable().ajax.reload();
          }
        $("#form-result").html(html);
      }
      });
  });


  /* Edit brand */
  $(document).on('click', '#edit-brand', function () {
    var id= $(this).data('id');
    $('#form-result').html('');
  $.get('/brand/'+id+'/edit', function (data) {
      $('#brandModalTitle').html("Edit Brand");
      $('#btn-save').html("Update");
      $('#btn-save').val("update");
      $('#brand-modal').modal('show');
      $('#id').val(data.id);
      $('#brand_name').val(data.brand_name);
      $('#modal-preview').attr('alt', 'No image available');
      if(data.logo){
      $('#modal-preview').attr('src','<?php echo e(asset("storage/")); ?>/' +data.logo);    
      $('#hidden_logo').val(data.logo);
      }
    });
  });

  /* Delete brand*/
  // sweeralert delete
  $(document).on('click', '#delete-brand', function () {
          let id = $(this).data('id');
          Swal.fire({
              title: 'Are you sure ?',
              text: "This brand data will be permanently delete",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#47C363',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: "/brand/"+id+"/",
                  type: "POST",
                  data: {
                      '_method': 'DELETE',
                      '_token': '<?php echo e(csrf_token()); ?>',
                      'id': id,
                  },
                  dataType:"JSON",
                  success: function(response) {
                    $('#brands-datatables').DataTable().ajax.reload();
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
            alert("Please Selected Brands Checkbox !")
            } else {
              Swal.fire({
              title: 'Are you sure ?',
              text: "This Brands will be permanently delete",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#47C363',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                var strIds = ids.join(",");
              $.ajax({
                url:"/selected-brands",
                type: "POST",
                data:{
                  _method:"DELETE",
                  _token: '<?php echo e(csrf_token()); ?>',
                  id:strIds
                },
                success:function(response)
                {
                  $('#brands-datatables').DataTable().ajax.reload();
                  Response(response);
                }
              }) 
              }
            });
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

        function readURL(input, id) {
          id = id || '#modal-preview';
          if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
          $(id).attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
          $('#modal-preview').removeClass('hidden');
          $('#start').hide();
            }
          }
    </script>
  <?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin_layout.admin-master', ['title' => 'Brands'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/admin/brand.blade.php ENDPATH**/ ?>