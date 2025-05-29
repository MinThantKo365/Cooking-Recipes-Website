@extends('project.layout')
@section('content')

<section>
    @if (sizeof($userSearch))


    <div class="row p-2 ms-3 me-3 text-center mt-3">
        @foreach ($userSearch as $srh)


      <div class="col-md-4 mb-4">
        <div class="bg-light p-2" id ="card-pj">
        <div class="text-center" style="">
          <img src="/images/{{ $srh['img_name'] }}" alt="" class="w-100">
        </div>
          <h4 class="text-uppercase" id="category-recipes">{{ $srh['category'] }}</h4>
          <a href="{{ route('detail',$srh->id) }}" class="btn btn-outline " id="a-read">Read Recipe</a>
      </div>
    </div>
    @endforeach
    </div>
    @else
    <div class="text-center text-dark" style="width: 100%; height: 70vh;"  id='userSrh'><p><i class="fa fa-search"></i>Data wasn`t found</p></div>
    @endif
    </section>
@endsection
