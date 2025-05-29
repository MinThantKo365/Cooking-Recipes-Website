@extends('admin.layout')
@section('content')
<div>
    @if(session('success'))
        <div class="alert alert-success text-success alert-dismissible fade show" role="alert">
            <ul class="mb-0" style="list-style-type: square;">
                {{ session('success') }}
            </ul>
            <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger text-danger bg-dark alert-dismissible fade show" role="alert">
        <ul class="mb-0" style="list-style-type: square;">
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>
<div class="container-lg pb-4">
    <div class="row align-items-center">
@foreach ($admins as $a)
        <div class="col-lg mt-5 mb-1">
            <div class="mb-1 p-2">
              <img src="/imagesAdmin/{{ $a->avatar }}" alt="" id="changePfAdmin" class="" style="border-color: orange;">
            </div>
            <div>
                <h2 class="mb-2 fw-bold">{{ $a->username }}</h2>
            </div>
        </div>

    </div>
    <form action="{{ route('editProfilePost') }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <label for="staticEmail" class="col-sm-2 col-form-label h6">Email</label>
        <div class="col-sm-6">
          <h2 style="user-select: none;" class="h6" id="staticEmail">{{ $a->email }}</h2>
        </div>
      </div>
      <div class="row mb-3">
        <label for="changeUser" class="col-sm-2 col-form-label h6">Username</label>
        <div class="col-sm-6">
          <input type="username" class="form-control" placeholder=" Change username here" id="changeUser" name="username" value="{{ $a->username }}">
          @error('username')
          <span class="alert text-danger">{{$message}}</span>
        @enderror
        </div>
    </div>
        <div class="mb-2 d-flex flex-column">
            <label for="img-pic" class="form-label h6">New Image</label>
           <img src="" alt="" class="mb-2" id="img-pic" style="border: 1px solid black; width:100px; height:100px;">
                <div class="d-flex w-25">
                    <input type="file" class="form-control" id="img-f" name="avatar">
                </div>
            </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary text-dark me-2" id="">Update</button>
            <button type="reset" class="btn btn-outline-danger text-dark" >Cancel</button>
        </div>
    </form>
    @endforeach

      <div class="form-group row mt-3">
            <form action="" method="">
            <h6>Password</h6>
            <a href="{{ route('changeAdminPwd') }}" class="btn" id="a-read">Change Password</a>
        </form>
    </div>
</div>
@endsection
