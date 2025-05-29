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
    </div>
<section class="container d-flex justify-content-center align-items-center mt-5 md-12 mb-5 pb-5 ">
<form class=""  action="{{ route('changeAdminPwdPost') }}" method="post" id="register-form">
  @csrf

  <div class="w-100 m-auto text-center"><h2>Change Password</h2></div>
    <div class="sm-12 mb-1">
      <label for="exampleInputPassword1" class="form-label ">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <div class="sm-12 mb-2">
        <label for="exampleInputPassword1" class="form-label ">Confirmed Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
      </div>

      <div class="sm-12 text-center">
        <button type="submit" class="btn btn-outline-light mb-2"  >Change</button>
        <button type="reset" class="btn btn-outline-secondary mb-2">Cancel</button>
</div>
  </form>
</section>
@endsection
