<!-- Sweetalert Snackbar -->
@if (session()->has('success')) 
  @push('after-script')
  <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      Toast.fire({
        icon: 'success',
        title: `{{session()->get('success')}}`
      })
</script>
  @endpush
@endif

<!-- Alert BS4 -->
@if (session()->has('msg')) 
<div class="row">
  <div class="col">
    <div class="alert alert-success">
      {{session()->get('msg')}}
    </div>
  </div>
  </div>
@endif

@if ($errors->any())
  <div class="row">
    <div class="col-md">
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        <li class="" style="list-style-type: none">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    </div>
  </div>
@endif