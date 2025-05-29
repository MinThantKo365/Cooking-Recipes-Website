@extends('project.layout')
@section('content')

<section>
<div class="container mb-4" id="sct-reviews">
    <div class="row mt-3">
        @foreach ($reviews as $rev)
    <div class="row-md mt-2 mb-1">
        <div class="card" id="review-card">
            <div class="card-body" >
                <h5 class="card-title">{{ $rev->name }}</h5>
                <p class="card-text">{{ $rev->review_msg }}</p>
              </div>
              <div class="card-footer text-muted" style="padding: 7px">
                {{ $rev->created_at->todatestring() }}
              </div>
        </div>
    </div>
    @endforeach
</div>
</div>
<div class="d-flex justify-content-center mt-2">{{ $reviews->links() }}</div>
</section>

@endsection
