<style>
  #sidebar {
    background-color: #132035 !important;
  }
  .content-side.content-side-user {
      background-color: #132035;
  }

  .nav-main-link {
      color: #b9b9b9;
      padding: 0.8rem 1.5rem;
  } 
  .nav-main-link,
  .nav-main-link .nav-main-link-icon {
    font-size: 13px;
  }
  a.text-dual:focus,
   a.text-dual:hover,
   .nav-main-link:hover{
      color: #0284c7!important;
  }
  .nav-main-submenu {
      padding-left: 4.375rem;
      background-color: transparent;
  }

  .nav-main-item.open>.nav-main-link-submenu {
      color: #0284c7  ;
  }


</style>
<!-- Sidebar -->
<nav id="sidebar">
  <!-- Sidebar Content -->
  <div class="sidebar-content">

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
      <!-- Side User -->
      <div class="content-side content-side-user px-0 py-0">
        <!-- Visible only in mini mode -->
        <div class="smini-visible-block animated fadeIn px-3">
          <img class="img-avatar img-avatar32" src="/fav.svg" alt="">
        </div>
        <!-- END Visible only in mini mode -->

        <!-- Visible only in normal mode -->
        <div class="smini-hidden text-center mx-auto">
          <a class="img-link" href="/">
            <img class="img-avatar" src="/fav.svg" alt="" style="width: 25%; height: auto;">
          </a>
          <ul class="list-inline mt-3 mb-0">
            <li class="list-inline-item">
              <a class="link-fx text-white fs-sm fw-semibold text-uppercase">{{Auth::user()->name}}</a>
            </li>
            <li class="list-inline-item">
              <a class="link-fx text-white text-muted fs-sm fw-semibold text-uppercase">({{Auth::user()->role}})</a>
            </li>
            <li class="list-inline-item">
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <a class="link-fx text-white" href="{{route('mode-change')}}">
                <i class="fa fa-burn"></i>
              </a>
            </li>
          </ul>
        </div>
        <!-- END Visible only in normal mode -->
      </div>
      <!-- END Side User -->

      <!-- Side Navigation -->
      <div class="content-side content-side-full">
        <ul class="nav-main">
          @if(Auth::check())
            @if(Auth::user()->role === 'admin')
              <li class="nav-main-item">
                <a class="nav-main-link" href="{{ route('admin.dashboard') }}">
                  <i class="nav-main-link-icon fa fa-house-user"></i>
                  <span class="nav-main-link-name">Dashboard</span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="{{route('department.index')}}">
                  <i class="nav-main-link-icon fa fa-sitemap"></i>
                  <span class="nav-main-link-name">Department</span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="{{route('doctor.index')}}">
                  <i class="nav-main-link-icon fa fa-user-md"></i>
                  <span class="nav-main-link-name">Doctor</span>
                </a>
              </li>
            @else
              <li class="nav-main-item">
                <a class="nav-main-link" href="{{ route('doctor.dashboard') }}">
                  <i class="nav-main-link-icon fa fa-house-user"></i>
                  <span class="nav-main-link-name">Dashboard</span>
                </a>
              </li>
            @endif
            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'doctor')
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <i class="nav-main-link-icon fa fa fa-pencil-alt"></i>
                  <span class="nav-main-link-name">Appointment</span>
                </a>
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="{{route('appointment.create')}}">
                      <span class="nav-main-link-name">Add Appointment</span>
                    </a>
                  </li>

                  <li class="nav-main-item">
                    <a class="nav-main-link" href="{{route('appointment.index')}}">
                      <span class="nav-main-link-name">Appointment List</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <i class="nav-main-link-icon fa fa-book"></i>
                  <span class="nav-main-link-name">Prescription</span>
                </a>
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                      <span class="nav-main-link-name">Add Patient Case Study</span>
                    </a>
                  </li>

                  <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                      <span class="nav-main-link-name">Patient Case Study List</span>
                    </a>
                  </li>

                  <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                      <span class="nav-main-link-name">Prescription List</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <i class="nav-main-link-icon fa fa-wheelchair"></i>
                  <span class="nav-main-link-name">Patient</span>
                </a>
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="{{route('patient.index')}}">
                      <span class="nav-main-link-name">Patient</span>
                    </a>
                  </li>

                  <li class="nav-main-item">
                    <a class="nav-main-link" href="{{route('documents.index')}}">
                      <span class="nav-main-link-name">Patient Documents</span>
                    </a>
                  </li>
                </ul>
              </li>
            @endif
            @if (Auth::user()->role === 'admin')
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <i class="nav-main-link-icon fa fa-calendar"></i>
                  <span class="nav-main-link-name">Schedule</span>
                </a>
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="{{route('schedule.create')}}">
                      <span class="nav-main-link-name">Add Schedule</span>
                    </a>
                  </li>

                  <li class="nav-main-item">
                    <a class="nav-main-link" href="{{route('schedule.index')}}">
                      <span class="nav-main-link-name">Schedule List</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <i class="nav-main-link-icon fas fa-bed"></i>
                  <span class="nav-main-link-name">Bed Management</span>
                </a>
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="{{route('floors.index')}}">
                      <span class="nav-main-link-name">Floor</span>
                    </a>
                  </li>

                  <li class="nav-main-item">
                    <a class="nav-main-link" href="{{route('rooms.index')}}">
                      <span class="nav-main-link-name">Room</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="{{route('wards.index')}}">
                      <span class="nav-main-link-name">Ward</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="{{route('bed-types.index')}}">
                      <span class="nav-main-link-name">Bed Type</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="{{route('beds.index')}}">
                      <span class="nav-main-link-name">Bed</span>
                    </a>
                  </li>
                </ul>
              </li>
            @endif
          @endif
        </ul>
      </div>
      <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
  </div>
  <!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->