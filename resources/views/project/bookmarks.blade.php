@extends('project.layout')
@section('content')
<div>
@if($bookmarks->count()>0)
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
<section class="mb-3" id="sct-bookmarks">
<table class="table table-hover p-2">
    <thead>
        <tr  style="background-color: #fca311;">
          <th scope="col">Image</th>
          <th scope="col">Category</th>
          <th scope="col">Detail</th>
          <th scope="col">Remove</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($bookmarks as $bm)
        <tr>
          <th scope="row"><img src="/images/{{ $bm->img_name }}" alt="" id="bm-img" class="border"></th>
          <td class="m-2">{{ $bm->category }}</td>
          <td><a href="{{ route('detail',$bm->id) }}" class="btn btn-outline" id="b-read">View</a></td>
          <td><a href="{{ route('bookRemove',$bm->bookmarks) }}" class="btn btn-outline " id="b-read">Remove</a></td>
        </tr>
        @endforeach
      </tbody>


  </table>
  <div class="d-flex p-2 justify-content-center mt-2">{{ $bookmarks->links() }}</div>
  @else
  <div class="text-center text-dark " style="width: 100%; height: 70vh;"  id='userSrh'><p>No data in the bookmarks</p></div>
  @endif

</section>

@endsection
