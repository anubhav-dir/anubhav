      <!-- Header -->
      <header class="main-header" id="header">
        <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
          <!-- Sidebar toggle button -->
          <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
          </button>
          {{-- <span class="page-title">dashboard</span> --}}
          <div class="navbar-right ">


            <ul class="nav navbar-nav">
              <!-- User Account -->
              <li class="dropdown user-menu">
                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <img src="{{Auth::user()->getProfileImage()}}" class="user-image rounded-circle" alt="User Image" />
                  <span class="d-none d-lg-inline-block">{{Auth::user()->profile_name}}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li>
                    <a class="dropdown-link-item" href="{{route('user.profile')}}">
                      <i class="mdi mdi-account-outline"></i>
                      <span class="nav-text">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-link-item" href="{{route('user.profile-update')}}">
                      <i class="mdi mdi-settings"></i>
                      <span class="nav-text">Account Setting</span>
                    </a>
                  </li>

                  <li class="dropdown-footer">
                    <a class="dropdown-link-item" href="{{route('logout')}}"> <i class="mdi mdi-logout"></i> Log Out </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>


      </header>
