@extends('admin.layout')
@section('content')
<section>
    @if (sizeof($adminSearch))
    <div class="row p-2 ms-3 me-3 text-center mt-3">
        @foreach ($adminSearch as $srh)
      <div class="col-md-4 mb-4">
        <div class="bg-light p-2" id ="card-pj">
        <div class="text-center" style="">
          <img src="/images/{{ $srh['img_name'] }}" alt="" class="w-100">
        </div>
          <h4 class="text-uppercase" id="category-recipes">{{ $srh['category'] }}</h4>
          <a href="{{ route('recipesDetailAdmin',$srh->id) }}" class="btn btn-outline " id="a-read">Read Recipe</a>
      </div>
    </div>
    @endforeach

    @else
    <div class="container-fluid">
    <div class="text-center text-dark" id='userSrh'>
        <p><i class="fa fa-search"></i>Data wasn`t found</p>
    </div>
</div>
</div>
    @endif
    </section>
@endsection
