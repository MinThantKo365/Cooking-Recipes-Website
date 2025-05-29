@extends('project.layout')
@section('content')
<section>
    <div class="mt-1">
        <div class="container-lg">
          <div class="row fw-bold text-center">
            <div class="h2">
             Western Food
            </div>
          </div>
        </div>
      </div>

    <div class="row p-2 ms-3 me-3 text-center"  id="card-i">
        @foreach ($westernFood as $west)


      <div class="col-md-4 mb-4">
        <div class="bg-light p-2" id ="card-pj">
        <div class="text-center" style="">
          <img src="/images/{{ $west['img_name'] }}" alt="" class="w-100">
        </div>
          <h4 class="text-uppercase" id="category-recipes">{{ $west['category'] }}</h4>
          <a href="{{ route('westernDetail',$west->id) }}" class="btn btn-outline " id="a-read">Read Recipe</a>
      </div>
    </div>
    @endforeach

    </div>
    {{-- <div class="d-flex justify-content-center mt-2">{{ $recipes->links() }}</div> --}}
    </section>
@endsection

