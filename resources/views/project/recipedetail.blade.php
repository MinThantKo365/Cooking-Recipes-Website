@extends('project.layout')
@section('content')


<section>
    <div>
        @if(session('success'))
            <div class="alert alert-success text-success alert-dismissible fade show" role="alert">
                <ul class="mb-0" style="list-style-type: square;">

                    {{ session('success') }}

                </ul>
                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
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
    <div class="container-lg">
        <div class="row align-items-center">
            @foreach ($recipes as $r)
            {{-- {{ dd($r->id) }} --}}
            <div class="col-lg-6 mt-5">
                <div class="text-center">
                  <img src="/images/{{ $r['img_name'] }}" alt="" class="img-thumbnail" style="border-color: orange;">
                </div>
                </div>

            <div class="col-lg-6 mt-2">
                <h2 class="mb-2 text-center fw-bold text-uppercase">{{ $r['category'] }}</h2>
                {{-- @endforeach --}}

                {{-- @foreach ($details as $d) --}}
                <div class="d-flex">
                    <label for="t-de" class="fw-bold ms-5">Type:</label>
                    <p id="t-de" class="ms-1 text-capitalize">{{ $r['type_name'] }}</p>
                </div>
                <div class="d-flex">
                <label for="ingredient-de" class="fw-bold ms-1">Ingredient:</label>
                <p id="ingredient-de" class="ms-1 text-capitalize">{{ $r['ingredient'] }}</p>
            </div>
            <form action="{{ route('addBookmarks',$r->id) }}" method="post">
                @csrf
            <div class="d-flex justify-content-center align-items-center mt-2">
                <button type="submit" class="btn btn-outline-dark d-flex align-items-center" id="a-read">
                    Add to Bookmarks <i class="fa-regular fa-bookmark ms-2"></i>
                </button>
            </div>
        </form>
            </div>
            @endforeach
        </div>
            </div>

</section>
<section>
<div class="container mb-3">
<div class="row w-100">

    <div class="col-md-12 text-center fw-bold h3 mt-4">
        Cooking Method
    </div>
    <hr>
</div>
<div class="row p-1 w-100">
    @foreach ($recipes as $r)
    <div class="col-lg-12">
        {{ $r['recipe'] }}
    </div>
    @endforeach
</div>
</div>
</section>


<?php
use App\Http\Controllers\UserController;

$countReview = UserController::countReview($r->id);
?>
    <section class="mb-3 mt-2">
        <hr class=" m-auto text-secondary" style="width: 90%; height:2px; background-color: #fca311;">
        <form action="{{ route('submitReview',$r->id) }}" method="post">
            @csrf
        <div class="container mb-4 mt-2" id="sct-reviews">
            <h2>Comments</h2>
            <div class="row mt-3">
                @if ($countReview > 0)
                @foreach ($reviews as $rev)
            <div class="row-md mt-2 mb-3">
                <div class="card" id="review-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $rev->name }}</h5>
                        <p class="card-text">{{ $rev->review_msg }}</p>
                      </div>
                      <div class="card-footer text-muted" style="padding: 7px">
                        {{ $rev->created_at->todatestring() }}
                      </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="row ms-5 fw-bold">
                There is no comment yet.
            </div>
            @endif

            @if ($countReview > 4)
            @foreach ($recipes as $r)
            <div class="d-flex justify-content-center align-items-center mt-3">
                <a href="{{ route('reviewUser', ['id' => $r->id]) }}" class="btn btn-outline-dark d-flex align-items-center" id="a-read">
                    See more
                </a>
            </div>
            @endforeach
            @endif
        </div>
        </div>


        <div class="container" >
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px; resize: none;" name="review_msg" required></textarea>
            <label for="floatingTextarea2">Add a comment</label>
          </div>
        <div class="text-center mt-3">
        <button type="submit" class="btn btn-outline-dark" id="a-read">Send <i class="fa-solid fa-paper-plane"></i></button>
        <button type="reset"  class="btn btn-outline-dark" id="a-read">Cancel</button>
        </div>
        </div>
    </form>
        </section>

        <section class="mt-2">
            <hr class=" m-auto text-secondary" style="width: 90%; height:2px; background-color: #fca311;">
            <div class="mt-1">
                <div class="container">
                  <div class="row fw-bold text-center">
                    <div class="h2">
                     Our Newest Recipes
                    </div>
                  </div>
                </div>
              </div>

            <div class="row p-2 ms-3 me-3 text-center"  id="card-i">
                @foreach ($newblogs as $blog)
                @csrf

                <div class="col-md-4 mb-4">
                  <div class="bg-light p-2" id ="card-pj">
                  <div class="" style="">
                    <img src="/images/{{ $blog['img_name'] }}" alt="" class="w-100">
                  </div>
                    <h4 class="text-uppercase" id="category-recipes">{{ $blog['category'] }}</h4>
                    <a href="{{ route('detail',$blog->id) }}" class="btn btn-outline " id="a-read">Read Recipe</a>
                </div>
              </div>
              @endforeach

            </div>

            </section>
@endsection
