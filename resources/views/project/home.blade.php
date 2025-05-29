@extends('project.layout')
@section('content')
{{-- <div class="head-container" id="con1">
    <iframe
        title="Learn To Cook In Less Than 1 Hour"
        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
        src="https://www.youtube.com/embed/zhI7bQyTmHw?autoplay=1&loop=1&playlist=zhI7bQyTmHw&mute=1"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin"
        allowfullscreen class="mt-5 pt-2">
    </iframe>
</div> --}}
<section class="" id="home">
    <div class="h-con">
        <img src="./images/homeimg.jpg" alt="">
        <div class="home-top">
        <h2>Let Me Cook</h2>
        <h3>Learn about Cooking</h3>

        <a href="{{ route('guides') }}" class="watch-now">Learn Now</a>

    </div>
    </div>

</section>

<section class="mt-2">
    <div class="mt-1">
        <div class="container-lg">
          <div class="row fw-bold text-center">
            <div class="h2">
             New Recipes
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
    <section class="mt-2">
        <div class="mt-1">
            <div class="container-lg">
              <div class="row fw-bold text-center">
                <div class="h2">
                 Recommend Recipes
                </div>
              </div>
            </div>
          </div>

        <div class="row p-2 ms-3 me-3 text-center"  id="card-i">
            @foreach ($randomBlogs as $random)
            @csrf

            <div class="col-md-4 mb-4">
              <div class="bg-light p-2" id ="card-pj">
              <div class="" style="">
                <img src="/images/{{ $random['img_name'] }}" alt="" class="w-100">
              </div>
                <h4 class="text-uppercase" id="category-recipes">{{ $random['category'] }}</h4>
                <a href="{{ route('detail',$random->id) }}" class="btn btn-outline " id="a-read">Read Recipe</a>
            </div>
          </div>
          @endforeach
        </div>

        </section>
        <section>

        </section>
        @if (session()->get('user'))
        <section>
            <div class="mt-1">
                <div class="container-lg">
                  <div class="row fw-bold text-center">
                    <div class="h2">
                        Gift for all Members
                    </div>
                  </div>
                </div>
              </div>
            <div class="row-lg p-2 ms-3 me-3 d-flex align-items-center justify-content-center mb-2"  id="card-i">

                    <div class="bg-light p-3 text-center" id ="card-pj">
                        <div class="" style="">
                            <img src="/images/download.png" alt="" class="card-down">
                          </div>
                      <h4 class="text-uppercase" id="category-recipes">Our six special recipes</h4>
                      <a href="/download/FreeRecipeGuides.pdf" class="btn btn-outlin" id="a-read" download>Download</a>
                  </div>
            </div>

        </section>
        @endif
@endsection

