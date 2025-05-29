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

    <form action="{{ route('addBlogPost') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row align-items-center mt-3">
            <div class="row mb-3">
                <label for="changeOther" class="col-sm-2 col-form-label h6">Category</label>
                <div class="col-sm-6">
                  <input type="username" class="form-control" placeholder="Insert category here" id="changeOther" name="category" value="">
                </div>
            </div>
      <div class="row mb-3 ">
        <div class="sm-12 mb-2">
            <label for="ingredient-textarea" class="col-sm-2 col-form-label h6">Food Type</label>
            <div class="form-check form-check-inline ms-1">
                <input class="form-check-input" type="radio" name="type_name" id="typeRadio1" value="asian food">
                <label class="form-check-label" for="roleRadio1">asian food</label>
              </div>
              <div class="form-check form-check-inline p-2 ms-1">
                <input class="form-check-input " type="radio" name="type_name" id="typeRadio2" value="western food">
                <label class="form-check-label" for="roleRadio2">western food</label>
              </div>
          </div>
    </div>
    <div class="row mb-3">
        <label for="ingredient-textarea" class="col-sm-2 col-form-label h6">Ingredients</label>
        <div class="col-sm-6">
          <textarea class="form-control" placeholder="Insert ingredient here" id="ingredient-textarea" name="ingredient"></textarea>
          {{-- @error('username')
          <span class="alert text-danger">{{$message}}</span>
        @enderror --}}
        </div>
    </div>
    <div class="row mb-3">
        <label for="method-textarea" class="col-sm-2 col-form-label h6">Cooking Method</label>
        <div class="col-sm-6">
          <textarea class="form-control" placeholder="Insert recipes here" id="method-textarea" name="recipe" ></textarea>
          {{-- @error('username')
          <span class="alert text-danger">{{$message}}</span>
        @enderror --}}
        </div>
    </div>
        <div class="mb-2 d-flex flex-column">
            <label for="img-pic" class="form-label h6">Add Image</label>
           <img src="" alt="" class="mb-2" id="img-pic" style="border: 1px solid black; width:250px; height:250px;">
                <div class="d-flex w-25">
                    <input type="file" class="form-control" id="img-f" name="img_name">
                </div>
            </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary text-dark me-2" id="">Confirm</button>
            <button type="reset" class="btn btn-outline-danger text-dark" >Cancel</button>
        </div>
    </div>

    </form>
    {{-- @endforeach --}}
</div>
@endsection
