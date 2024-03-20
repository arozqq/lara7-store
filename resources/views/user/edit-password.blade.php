@extends('layouts.user.user-master', ['title' => 'Ubah Password'])
@section('content')
<div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-dark text-white">
          Ubah Password
        </div>
        <div class="card-body">
          <form action="{{route('password.change')}}" method="POST">
            @csrf
            @method("PATCH")
            <div class="form-group">
              <label for="old-password">Password Lama</label>
              <input type="password" name="old-password" id="old-password" value="" class="form-control">
              @error('old-password')
              <div class="text-danger mt-2">{{$message}}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password Baru</label>
              <input type="password" name="password" id="" value="" class="form-control">
              @error('password')
              <div class="text-danger mt-2">{{$message}}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password_confirmation">Konfirmasi Password</label>
              <input type="password" name="password_confirmation" id="password_confirmation" value="" class="form-control">
              @error('password_confirmation')
              <div class="text-danger mt-2">{{$message}}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-success mt-2">Ubah</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection
