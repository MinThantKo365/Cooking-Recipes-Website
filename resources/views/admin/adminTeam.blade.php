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
<div class="container">
    <div class="row">
        <h3 class="text-center">Admins</h3>
        @foreach ($admins as $a)


        <div class="col-md-4 mb-3 mt-2">
            <div class="bg-light p-2 rounded" id ="card-pj">
                <h5 class="text h5" id="">{{ $a['username'] }}
                    @if ( auth('admin')->user()->role=="SuperAdmin")
                    <span class="text h6 text-muted " id="">({{ $a['email'] }})</span></h5>
                     @endif
                <h5 class="text h6 text-muted" id="">{{ $a['role'] }}</h5>
                <h5 class="text h6 text-muted" id="">Register Date: {{ $a['created_at']->todatestring()}}</h5>
                @if ( auth('admin')->user()->role=="SuperAdmin")
                 <form action="{{ route('deleteAdmin',$a->id) }}" method="get">
                    @csrf
                    <button class="btn" id="a-read">Remove Admin</button>
                </form>
                @endif
            </div>
        </div>

        @endforeach
    </div>

</div>

@endsection
