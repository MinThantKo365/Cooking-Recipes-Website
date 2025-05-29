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
        <h3 class="text-center">Users</h3>
        @foreach ($users as $user)


        <div class="col-md-3 mb-3 mt-2">
            <div class="bg-light p-2 rounded" id ="card-pj">
                <h5 class="text h5" id="">{{ $user['name'] }}</h5>
                <h5 class="text h6 text-muted" id="">{{ $user['email'] }}</h5>
                <h5 class="text h6 text-muted" id="" style="user-select: none;">Register Date: {{ $user['created_at']->todatestring()}}</h5>
                 <form action="{{ route('deleteUser',$user->id) }}" method="get">
                    @csrf
                    <button class="btn" id="a-read">Remove User</button>
                </form>
            </div>
        </div>

        @endforeach
    </div>

</div>

@endsection
