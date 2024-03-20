@extends('layouts.user.user-master', ['title' => 'My Profile'])
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card text-left px-3">
            <div class="card-body"> 
                <h4 class="pt-3">My Profile</h4>
                <p>Manage your profile information to control, and protect your account.</p>
                <hr class="mt-0">
                <div class="row p-3">
                    <div class="col-lg-7 col-md order-lg-first order-md-last">
                     <x-alert></x-alert>
                     <x-notification></x-notification>
                        <form action="/account/profile/{{Auth::user()->profile->id}}/update" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group row">
                                <input type="hidden" name="id" id="id" value="{{Auth::user()->id}}">
                                <div class="col-lg-2"><label class="text-secondary" for="username">Username</label></div>
                                <div class="col-lg"><label>{{Auth::user()->username}}</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2"><label class="text-secondary" for="name">Fullname</label></div>
                                    <div class="col-lg"><input type="text" name="name" id="name" class="form-control" value="{{Auth::user()->name}}"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2"><label class="text-secondary" for="email">Email</label></div>
                                    <div class="col-lg"><input type="text" name="email" id="email" readonly class="form-control-plaintext" id="staticEmail" value="{{Auth::user()->email}}"><a href="javascript:void(0)" class="custom__link" ><small>Change</small></a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2"><label class="text-secondary" for="email">Password</label></div>
                                    <div class="col-lg"><input type="password"  name="password" id="password" class="form-control-plaintext" value="{{Auth::user()->password}}" readonly><a href="{{route('password.change')}}" class="custom__link"><small>Change</small></a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2"><label class="text-secondary" for="email">Gender</label></div>
                                    <div class="col-lg">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="gender" id="gender" value="Pria" {{Auth::user()->profile->gender === "Pria" ? "checked='checked'" : ""}}>Pria
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Wanita" {{Auth::user()->profile->gender === "Wanita" ? "checked='checked'" : ""}}>Wanita
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2"><label class="text-secondary" for="address">Address</label></div>
                            <div class="col-lg"><input type="text" name="address" id="address" class="form-control" value="{{Auth::user()->profile->address}}"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2"><label class="text-secondary" for="phone_number">Phone</label></div>
                            <div class="col-lg"><input type="text" name="phone_number" id="phone_number" class="form-control" value="{{Auth::user()->profile->phone_number}}"></div>
                        </div>
                        <button type="submit" class="btn btn-success offset-lg-2 px-4">Save</button>
                    </div>
                    <div class="col-lg-5 d-flex justify-content-center align-items-center order-first">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="avatar"/>
                                <label for="imageUpload"></label>
                                <span class="icon-upload fas fa-upload"></span>
                            </div>
                            <div class="avatar-preview mb-3">
                                <div id="imagePreview" style="background-image: url('{{Auth::user()->profile->TakeAvatar}}')">
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
    <script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(800);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    (readURL(this));
});
    </script>
@endpush    
