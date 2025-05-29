@extends('project.layout')
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


<section class="container d-flex justify-content-center align-items-center mt-5 md-12 mb-5 p-5" id="login-sec">

    <form class="" action="{{ route('loginP') }}" method="post" id="login-form">
    @csrf
  <div class="w-100 m-auto text-center"><h2>Login Form</h2></div>
    <div class="sm-12 mb-2">
      <label for="exampleInputEmail1" class="form-label h6">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
    </div>
    <div class="sm-12 mb-3">
      <label for="exampleInputPassword1" class="form-label h6">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
<div class="sm-12 text-center">
    <button type="submit" class="btn btn-outline-light mb-2"  >Submit</button>
    <button type="reset" class="btn btn-outline-secondary mb-2">Cancel</button>
</div>
    <div class="mt-2 text-center">Create a new account?<a href="{{ route('register') }}" class="sign-up">Sign Up</a></div>
    <div class="mt-2 text-center"><a href="{{ route('forgotPWD') }}" class="sign-up p-1">Forget password?</a></div>
  </form>
</section>

@endsection
