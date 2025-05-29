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
<div class="container-lg pb-3">
      <div class="row align-items-center">
            @foreach ($recipes as $r)
            {{-- {{ dd($r->id) }} --}}
            <div class="col-lg-6 mt-5">
                <div class="text-center">
                  <img src="/images/{{ $r['img_name'] }}" alt="" class="img-thumbnail" style="border-color: orange;">
                </div>
                </div>
    </div>
    <form action="{{ route('editBlogPost',$r->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row align-items-center mt-3">
            <div class="row mb-3">
                <label for="changeOther" class="col-sm-2 col-form-label h6">Category</label>
                <div class="col-sm-6">
                  <input type="username" class="form-control" placeholder=" Change category here" id="changeOther" name="category" value="{{ $r->category }}">
                </div>
            </div>
      <div class="row mb-3 ">
        <label for="changeOther" class="col-sm-2 col-form-label h6">Type</label>
        <div class="col-sm-6">
          <input type="username" class="form-control" placeholder="asian food or western food" id="changeOther" name="type_name" value="{{ $r->type_name }}">
          {{-- @error('username')
          <span class="alert text-danger">{{$message}}</span>
        @enderror --}}
        </div>
    </div>
    <div class="row mb-3">
        <label for="ingredient-textarea" class="col-sm-2 col-form-label h6">Ingredients</label>
        <div class="col-sm-6">
          <textarea class="form-control" placeholder=" Change ingredient here" id="ingredient-textarea" name="ingredient">{{ $r->ingredient }}</textarea>
          {{-- @error('username')
          <span class="alert text-danger">{{$message}}</span>
        @enderror --}}
        </div>
    </div>
    <div class="row mb-3">
        <label for="method-textarea" class="col-sm-2 col-form-label h6">Cooking Method</label>
        <div class="col-sm-6">
          <textarea class="form-control" placeholder=" Change ingredient here" id="method-textarea" name="recipe" >{{ $r->recipe }}</textarea>
          {{-- @error('username')
          <span class="alert text-danger">{{$message}}</span>
        @enderror --}}
        </div>
    </div>
        <div class="mb-2 d-flex flex-column">
            <label for="img-pic" class="form-label h6">New Image</label>
           <img src="" alt="" class="mb-2" id="img-pic" style="border: 1px solid black; width:250px; height:250px;">
                <div class="d-flex w-25">
                    <input type="file" class="form-control" id="img-f" name="img_name">
                </div>
            </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary text-dark me-2" id="">Update</button>
            <button type="reset" class="btn btn-outline-danger text-dark" >Cancel</button>
        </div>
    </div>

    </form>
    @endforeach
    {{--
    @if ( auth('admin')->user()->role=="SuperAdmin")
    <hr>
    <div class="form-group row mt-2 text-center">
        <form action="" method="">
        <h3>Wanna Delete Post?</h3>
        <a href="" class="btn btn-outline-danger" >Delete Now!!!</a>
    </form>
</div> --}}
{{-- @endif --}}
</div>
@endsection
