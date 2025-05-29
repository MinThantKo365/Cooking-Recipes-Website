@extends('admin.layout')
@section('content')

<div class="container-fluid">
    <div class="row">
        <h3 class="text-center">Messages</h3>
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
        @foreach ($messages as $msg)
        <div class="row-md px-4 mb-4 mt-2">
            <div class="bg-light p-2 rounded" id ="card-msg">
                <h5 class="text h5" id="">{{ $msg['name'] }} <span class="text h6 text-muted" id="">({{ $msg['email'] }})</span>
            </h5>
            <h5 class="h6 " id="">{{ $msg['msg']}}</h5>
                <h5 class="text h6 text-muted" id="">{{ $msg['created_at']->todatestring()}}</h5>
                <form action="{{ route('deleteMsg',$msg->id) }}" method="get">
                    @csrf
                    <button class="btn" id="a-read">Remove Message</button>
                </form>
            </div>
        </div>

        @endforeach
    </div>

</div>


@endsection
