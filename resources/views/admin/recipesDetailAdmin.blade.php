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
</div>
<section>
    {{-- @if ($errors->any())
    <div class="alert alert-danger text-danger bg-dark alert-dismissible fade show" role="alert">
        <ul class="mb-0" style="list-style-type: square;">
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif --}}
    <div class="container-md" style="overflow-x: hidden;">
        <div class="row align-items-center">
            @foreach ($recipes as $r)
            {{-- {{ dd($r->id) }} --}}
            <div class="col-lg-6 mt-5">
                <div class="text-center">
                  <img src="/images/{{ $r['img_name'] }}" alt="" class="img-thumbnail" style="border-color: orange;">
                </div>
                </div>

            <div class="col-lg-6 mt-2">
                <h2 class="mb-2 text-center fw-bold">{{ $r['category'] }}</h2>
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
            {{-- <form action="{{ route('addBookmarks',$r->id) }}" method="post">
                @csrf
            <div class="d-flex justify-content-center align-items-center mt-2">
                <button type="submit" class="btn btn-outline-dark d-flex align-items-center" id="a-read">
                    Add to Bookmarks <i class="fa-regular fa-bookmark ms-2"></i>
                </button>
            </div>
        </form> --}}
            </div>
            @endforeach
        </div>
            </div>

</section>
<section>
<div class="container p-3">
<div class="row w-100">

    <div class="col-md-12 text-center fw-bold h3 mt-4">
        Cooking Method
    </div>
    <hr>
</div>
<div class="row p-1 w-90">
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
    <section class="pb-4 mt-2">
        <hr class=" m-auto text-secondary" style="width: 90%; height:2px; background-color: #fca311;">
            @csrf
        <div class="container mt-2" id="sct-reviews">
            <h2>Comments</h2>
            <div class="row mt-3">
                @if ($countReview > 0)
                @foreach ($reviews as $rev)
            <div class="row-md mt-2 mb-3">
                <div class="card" id="review-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div> <h5 class="card-title">{{ $rev->name }}</h5></div>
                            <div class="">
                                <form action="{{ route('deleteUserCmt',$rev->rid) }}" method="get">
                                <button class="btn" id="a-read">Delete</button>
                            </form>
                            </div>
                        </div>

                        <p class="card-text">{{ $rev->review_msg }}</p>
                      </div>
                      <div class="card-footer text-muted" style="padding: 7px">
                        {{ $rev->created_at->todatestring() }}
                      </div>

                </div>
            </div>
            @endforeach
            @else
            <div class="row fw-bold">
                <p class="ps-5">There is no comment yet.</p>
            </div>
            @endif

        </div>
        </div>
        </section>




@endsection
