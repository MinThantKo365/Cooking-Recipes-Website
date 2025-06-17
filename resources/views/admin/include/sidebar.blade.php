<div class="Adminsidebar">
    <div class="logo-details">
        <img src="/images/logo.png" alt="" class="mb-1" style="width: 60px;" height="40px;">
      <span class="logo_name">LetMeCook</span>
    </div>
      <ul class="ad">
        <li>
          <a href="{{ route('adminDashboard') }}" class="active">
            <i class="fa-solid fa-table-columns"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('allRecipes') }}">
            <i class='bx bx-box' ></i>
            <span class="links_name">All Recipes</span>
          </a>
        </li>
        <li>
          <a href="{{ route('addBlog') }}">
            <i class="fa-solid fa-plus"></i>
            <span class="links_name">Add Blogs</span>
          </a>
        </li>
        <li>
          <a href="{{ route('editBlog') }}">
            <i class="fa-regular fa-pen-to-square"></i>
            <span class="links_name">Edit Post</span>
          </a>
        </li>
        <li>
          <a href="{{ route('allUsers') }}">
            <i class="fa-solid fa-users"></i>
            <span class="links_name">Users</span>
          </a>
        </li>
        <li>
          <a href="{{ route('contactMsg') }}">
            <i class="fa-regular fa-envelope"></i>
            <span class="links_name">Contact Messages</span>
          </a>
        </li>
        {{-- <li>
          <a href="{{ route('comments') }}">
            <i class="fa-regular fa-comments"></i>
            <span class="links_name">Comments</span>
          </a>
        </li> --}}
        <li>
            <a href="{{ route('adminTeam') }}">
                <i class="fa-solid fa-user"></i>
              <span class="links_name">Admin Team</span>
            </a>
          </li>
          @if ( auth('admin')->user()->role=="SuperAdmin")
        <li>
          <a href="{{ route('addAdmins') }}">
            <i class="fa-solid fa-user-plus"></i>
            <span class="links_name">Add Admin</span>
          </a>
        </li>
        @endif
        <li>
          <a href="{{ route('setting') }}">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        {{-- <li>
            <a href="#">
              <i class='bx ' ></i>
              <span class="links_name">Setting</span>
            </a>
          </li> --}}
        <li class="log_out">
          <a href="{{ route('adminLogout') }}">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Logout</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-sectionAdmin">
    <nav>
        <div class="sidebar-button" class="search-box-ad">
          <i class='bx bx-menu sidebarBtn'></i>
          {{-- <span class="dashboard">Dashboard</span> --}}
        </div>
        <form class="input-group search-box-ad" action="{{ route('searchAdmin') }}">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button button type="submit" class="btn btn-outline-dark" data-mdb-ripple-init>Search</button>
            </form>
        {{-- <div class="search-box-ad">
            <form action="{{ route('searchAdmin') }}">
          <input type="text" placeholder="Search..."  name="search">
          <button  type="submit" id="navbar-srh-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        </div> --}}

        <div class="profile-details">
          <img src="/imagesAdmin/{{ auth('admin')->user()->avatar}}" alt="">
          <span class="admin_name">{{ auth('admin')->user()->username}}</span>
          {{-- <i class='bx bx-chevron-down' ></i> --}}
        </div>

      </nav>
      <div class="home-content">
        {{-- <div class="overview-boxes"> --}}

       @yield('content')
    {{-- </div> --}}
    </div>
</section>
