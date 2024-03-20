@extends('layouts.admin_layout.admin-master', ['title' => 'Categories'])
@push('before-script')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
@endpush
@section('content')
  <div class="section-header">
    <h1>Categories</h1>
  </div>
  <div class="section-body">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body p-3">
              <div class="table-responsive">
                <a href="#" class="btn btn-primary mb-3 px-4" id="new-category" data-target="#category-modal" data-toggle="modal">Add Category</a>
                <a href="#" class="btn btn-outline-danger mb-3 px-4 ml-3" id="deleteall">Delete All</a>
                <table class="table table-striped table-bordered" id="categories-datatables">
                  <thead class="bg-success">
                      <th>
                      <div class="custom-checkbox custom-control text-center">
                      <input type="checkbox" class="custom-control-input" id="check-all">
                      <label for="check-all" class="custom-control-label">&nbsp;</label>
                      </div>
                      </th>
                      <th class="text-white">Category</th>
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
<div class="modal fade" id="category-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="categoryCrudModal"></h4>
      </div>
    <div class="modal-body">
      <form name="categoryForm" action="{{route('admin.app.store_category')}}" method="POST">
        <input type="hidden" name="id" id="id">
        @csrf
        <div class="row">
        <div class="col">
          <div class="form-group">
          <label for="category_name">Category :</label>
          <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Category" onchange="validate()">
          </div>
          </div>
        </div>
 
        <div class="col-md-12 text-center">
        <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary mr-3" disabled>Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
      </form>
    </div>
  </div>
  </div>
</div>
<!-- AKHIR MODAL -->

@endsection
@push('after-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

<script>
  $(document).ready(function(){
    $('#categories-datatables').DataTable({
      processing:true,
      serverside:true,
      ajax:"{{route('admin.app.category')}}",
      columns: [
        {data:'checkbox',name:'name', orderable:false},
        {data:'category_name',name:'category_name'},
        {data:'action', name:'action', orderable:false}, 
      ],
      order: [0, 'ASC'],
      responsive:true,
      });
  })

  /* When click New user button */
$('#new-category').click(function () {
  $('#btn-save').val("create-category");
  $('#user').trigger("reset");
  $('#categoryCrudModal').html("Add New Category");
  $('#category-modal').modal('show');
});

/* Edit user */
$(document).on('click', '#edit-category', function () {
  var id= $(this).data('id');
$.get('/categories/'+id+'/edit', function (data) {
    $('#categoryCrudModal').html("Edit Cateogory");
    $('#btn-update').html("Update");
    $('#btn-update').val("Update");
    $('#btn-save').prop('disabled',false);
    $('#category-modal').modal('show');
    $('#id').val(data.id);
    $('#category_name').val(data.category_name);
  });
});


/* Delete User*/
// sweeralert delete
$(document).on('click', '#delete-category', function () {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure ?',
            text: "This Category will be permanently delete",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#47C363',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: "/categories/"+id+"/delete",
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': '{{csrf_token()}}',
                    'id': id,
                },
                dataType:"JSON",
                success: function(response) {
                  $('#categories-datatables').DataTable().ajax.reload();
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
          alert("Please Selected Categories Checkbox !")
          } else {
            Swal.fire({
            title: 'Are you sure ?',
            text: "This Categories will be permanently delete",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#47C363',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              var strIds = ids.join(",");
            $.ajax({
              url:"/selected-categories",
              type: "POST",
              data:{
                _method:"DELETE",
                _token: '{{csrf_token()}}',
                id:strIds
              },
              success:function(response)
              {
                $('#categories-datatables').DataTable().ajax.reload();
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
  </script>
  <script>
      error=false
      function validate()
      {
      if(document.categoryForm.name.value !='' )
      document.categoryForm.btnsave.disabled=false
      else
      document.categoryForm.btnsave.disabled=true
      }
  </script>
@endpush