<nav class="navbar navbar-expand-lg sticky-top" style="border-top:1px solid #fca311;">
    <div class="container-fluid" style="background-color:#fca311;">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="/images/logo.png" alt="" class="mb-1" style="width: 60px;" height="40px;">
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fa-solid fa-bars fs-2 mb-2" style=""></i></span>
      </button>
      <div class="collapse navbar-collapse ms-3" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('guides') }}">Recipes</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="guide-link">
                Food Type
            </a>
            <ul class="dropdown-menu" id="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('asianF') }}">Asian Food</a></li>
              <li><a class="dropdown-item" href="{{ route('westF') }}">Western Food</a></li>
              {{-- <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contactUs') }}">Contact Us</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('reviewUser') }}"> Reviews</a>
          </li> --}}
          @if (session()->get('user'))
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{-- {{ Auth::user()->name }} --}}
              {{ session()->get('user')->name }}
              </a>
              <ul class="dropdown-menu"  id="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('bookmarks')}}"><i class="fa-regular fa-bookmark"></i> Bookmarks</a></li>
                <li><a class="dropdown-item" href="{{route('signOut')}}" ><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
              </ul>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            @endif
        </ul>

        {{-- <div class="me-2 my-2"><a class="btn" aria-disabled="true" id="ldBtn">Light Mode</a></div> --}}
        <form class="d-flex mb-2" role="search" action="{{ route('srch') }}">
          <input class="form-control me-2 bg-transparent " type="search" placeholder="Search" aria-label="Search" id="srch" name="search">
          <button class="btn" type="submit" id="navbar-srh-btn">Search</button>
        </form>
      </div>
    </div>
  </nav>
  {{-- <script>
    $(document).ready(function(){
            $('#ldBtn').click(function(){
                if($('body').hasClass('dark')){
                    $('body').removeClass('dark')
                    $('#ldBtn').html('Light Mode')

                }else{
                    $('body').addClass('dark')
                    $('#ldBtn').html('Dark Mode')
                }
            });
        });
  </script> --}}
