@extends('project.layout')
@section('content')
<div>
    @if ($errors->any())
    <div class="alert alert-success text-success alert-dismissible fade show" role="alert">
        <ul class="mb-0" style="list-style-type: square;">
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

</div>
<section>
<div class="contact-bigbox">
    <form action="{{ route('submitMsg') }}" class="contact-box" method="post">
        @csrf
    <div class="contact-row"><h1 label class="text-light">Contact Us</h1></div>
                <div class="contact-row"><label class="text-light">Username:</label><p>{{ session()->get('user')->name }}</p></div>
                <div class="contact-row"><label class="text-light">Email:</label><p>{{ session()->get('user')->email }}</p></div>
                <div class="contact-row"><textarea name="msg" cols="30" rows="10" placeholder="Write a message for us" required></textarea></div>
                <div class="contact-row"><button type="submit" name="submitmsg" id="signup" class="btn">Submit</button><br></div>
                {{-- <div class="contact-row"><a href="privacy&policy.php">Privacy&Policy</a></div> --}}
    </form>
    </div>
    </section>
@endsection
