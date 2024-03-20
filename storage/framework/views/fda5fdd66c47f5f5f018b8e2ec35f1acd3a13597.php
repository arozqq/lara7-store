
<?php $__env->startPush('before-script'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
  <div class="section-header">
    <h1>User Management</h1>
  </div>
  <div class="section-body">
      <div class="row">
        <div class="col-lg">
          <div class="card">
            <div class="card-body p-3">
              <div class="table-responsive">
                <a href="#" class="btn btn-primary mb-3 px-4" id="new-user" data-target="#crud-modal" data-toggle="modal">Add User</a>
                <a href="#" class="btn btn-outline-danger mb-3 px-4 ml-3" id="deleteall">Delete All</a>
                <table class="table table-striped table-bordered" id="user-datatables">
                  <thead class="bg-success">
                      <th class="text-center">
                      <div class="custom-checkbox custom-control">
                      <input type="checkbox" class="custom-control-input" id="check-all">
                      <label for="check-all" class="custom-control-label">&nbsp;</label>
                      </div>
                      </th>
                      <th class="text-white">Name</th>
                      <th class="text-white">Role</th>
                      <th class="text-white">Username</th>
                      <th class="text-white">Email</th>
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
<div class="modal fade" id="crud-modal" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="userCrudModal"></h4>
      </div>
    <div class="modal-body">
      <form name="userForm" action="<?php echo e(route('admin.app.store_user')); ?>" method="POST">
        <input type="hidden" name="id" id="id" >
        <?php echo csrf_field(); ?>
        <div class="row">
        <div class="col">
          <div class="form-group">
          <strong>Name:</strong>
          <input type="text" name="name" id="name" class="form-control" placeholder="Name" onchange="validate()" >
          </div>
          <div class="form-group">
            <strong>Username:</strong>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" onchange="validate()" >
            </div>
          <div class="form-group">
            <strong>Email:</strong>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" onchange="validate()">
          </div>
          <div class="form-group">
            <strong>Password:</strong>
            <input type="text" name="password" id="password" class="form-control" placeholder="Password" value="password123">
          </div>
          <div class="form-group">
            <strong>Role:</strong>
            <select name="role" id="role" class="form-control">
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>
        </div>
 
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Save</button>
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
  $(document).ready(function(){
    $('#user-datatables').DataTable({
      processing:true,
      serverside:true,
      ajax:"<?php echo e(route('admin.app.user')); ?>",
      columns: [
        {data:'checkbox',name:'name'},
        {data:'name',name:'name'},
        {data:'role',name:'role'},
        {data:'username',name:'username'},
        {data:'email',name:'email'},
        {data:'action', name:'action'}, 
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
      responsive:true
    });
  })

  /* When click New user button */
$('#new-user').click(function () {
  $('#btn-save').val("create-user");
  $('#user').trigger("reset");
  $('#userCrudModal').html("Add New User");
  $('#crud-modal').modal('show');
});

/* Edit user */
$(document).on('click', '#edit-user', function () {
var id= $(this).data('id');
$.get('/user/'+id+'/edit', function (data) {
    $('#userCrudModal').html("Edit User");
    $('#btn-update').html("Update");
    $('#btn-update').val("update");
    $('#btn-save').prop('disabled',false);
    $('#crud-modal').modal('show');
    $('#id').val(data.id);
    $('#name').val(data.name);
    $('#username').val(data.username);
    $('#email').val(data.email);
    $('#role').val(data.role);
  });
});


/* Delete User*/
// sweeralert delete
$(document).on('click', '#delete-user', function () {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure ?',
            text: "This user data will be permanently delete",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#47C363',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: "/application/user/"+id+"/delete",
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': '<?php echo e(csrf_token()); ?>',
                    'id': id,
                },
                dataType:"JSON",
                success: function(response) {
                  $('#user-datatables').DataTable().ajax.reload();
                  Response(response);
                  }
                })
            }
          })
        });

</script>
<script>
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
          alert("Please Selected User Checkbox !")
          } else {
            var strIds = ids.join(",");
            $.ajax({
              url:"<?php echo e(route('admin.deleteSelected')); ?>",
              type: "POST",
              data:{
                _method:"DELETE",
                _token: '<?php echo e(csrf_token()); ?>',
                id:strIds
              },
              success:function(response)
              {
                $('#user-datatables').DataTable().ajax.reload();
                Response(response);
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
      error=false
      function validate()
      {
      if(document.userForm.name.value !='' && document.userForm.email.value !='' )
      document.userForm.btnsave.disabled=false
      else
      document.userForm.btnsave.disabled=true
      }
  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin_layout.admin-master', ['title' => 'User Management'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/admin/user.blade.php ENDPATH**/ ?>