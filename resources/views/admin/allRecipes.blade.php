@extends('admin.layout')
@section('content')
<div class="container p-2">
    <div class="row-lg">
            <h6 class="text-center h4">Total Recipes: [{{ $countRecipes }}]</h6>
</div>
</div>
<div class="row p-2 ms-3 me-3 text-center"  id="card-i">
    @foreach ($allBlog as $blogs)
    @csrf
    <div class="col-md-4 mb-4">
      <div class="bg-light p-2" id ="card-pj">
      <div class="" style="">
        <img src="/images/{{ $blogs['img_name'] }}" alt="" class="w-100">
      </div>
        <h4 class="text-uppercase" id="category-recipes">{{ $blogs['category'] }}</h4>
        <a href="{{ route('recipesDetailAdmin',$blogs->id) }}" class="btn btn-outline " id="a-read">Read Recipe</a>
    </div>
  </div>
  @endforeach
</div>


@endsection
