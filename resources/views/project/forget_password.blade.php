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
</div>
@if (Session::has('message'))
                       <div class="alert alert-success" role="alert">
                          {{ Session::get('message') }}
                      </div>
                  @endif

<section class="container d-flex justify-content-center align-items-center mt-5 md-12 mb-5 p-5" id="login-sec">

    <form class="" action="{{ route('forgotPwdPost') }}" method="post" id="login-form">
    @csrf

  <div class="w-100 m-auto text-center"><h2>Reset Password</h2></div>
    <div class="sm-12 mb-2">
      <label for="exampleInputEmail1" class="form-label h6">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    </div>
<div class="sm-12 text-center">
    <button type="submit" class="btn btn-outline-light mb-2"  >Submit</button>
    <button type="reset" class="btn btn-outline-secondary mb-2">Cancel</button>
</div>

  </form>
</section>

@endsection
