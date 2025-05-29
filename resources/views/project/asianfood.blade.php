@extends('project.layout')
@section('content')
<section>
    <div class="mt-1">
        <div class="container-lg">
          <div class="row fw-bold text-center">
            <div class="h2">
             Asian Food
            </div>
          </div>
        </div>
      </div>

    <div class="row p-2 ms-3 me-3 text-center">
        @foreach ($asianFood as $asia)


      <div class="col-md-4 mb-4"  id="card-i">
        <div class="bg-light p-2" id ="card-pj">
        <div class="text-center" style="">
          <img src="/images/{{ $asia['img_name'] }}" alt="" class="w-100">
        </div>
          <h4 class="text-uppercase" id="category-recipes">{{ $asia['category'] }}</h4>
          <a href="{{ route('asianDetail',$asia->id) }}" class="btn btn-outline " id="a-read">Read Recipe</a>
      </div>
    </div>
    @endforeach

    </div>
    {{-- <div class="d-flex justify-content-center mt-2">{{ $recipes->links() }}</div> --}}
    </section>
@endsection

