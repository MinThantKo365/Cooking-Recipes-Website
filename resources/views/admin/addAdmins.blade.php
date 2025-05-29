@extends('admin.layout')
@section('content')

<div>
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
    @if(session('success'))
        <div class="alert alert-success text-success alert-dismissible fade show" role="alert">
            <ul class="mb-0" style="list-style-type: square;">

                {{ session('success') }}

            </ul>
            <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    </div>
<section class="container d-flex justify-content-center align-items-center mt-5 md-12 mb-5 pb-5 ">
<form class=""  action="{{ route('newAdminPost') }}" method="post" id="register-form">
  @csrf

  <div class="w-100 m-auto text-center"><h2>Add New Admin</h2></div>
    <div class="sm-12 mb-1">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">

      </div>
    <div class="sm-12 mb-1">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">

    </div>
    <div class="sm-12 mb-1">
      <label for="exampleInputPassword1" class="form-label ">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <div class="sm-12 mb-2">
        <label for="exampleInputPassword1" class="form-label ">Confirmed Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
      </div>
      <div class="sm-12 mb-2">
        <label for="name" class="form-label ">Admin Role:</label>
        <div class="form-check form-check-inline ms-1">
            <input class="form-check-input" type="radio" name="role" id="roleRadio1" value="SuperAdmin">
            <label class="form-check-label" for="roleRadio1">SuperAdmin</label>
          </div>
          <div class="form-check form-check-inline p-2 ms-1">
            <input class="form-check-input " type="radio" name="role" id="roleRadio2" value="NormalAdmin">
            <label class="form-check-label" for="roleRadio2">NormalAdmin</label>
          </div>
      </div>
      <div class="sm-12 text-center">
        <button type="submit" class="btn btn-outline-light mb-2"  >Create</button>
        <button type="reset" class="btn btn-outline-secondary mb-2">Cancel</button>
</div>
  </form>
</section>


@endsection
