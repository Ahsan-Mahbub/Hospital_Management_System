<!-- Sidebar -->
<nav id="sidebar">
<!-- Sidebar Content -->
<div class="sidebar-content">
  <!-- Side Header -->
  <div class="content-header justify-content-lg-center">
    <!-- Logo -->
    <div>
      <span class="smini-visible fw-bold tracking-wide fs-lg">
        c<span class="text-primary">b</span>
      </span>
      <a class="link-fx fw-bold tracking-wide mx-auto" href="/">
        <span class="smini-hidden">
          <span class="fs-4 text-dual">H.M.</span><span class="fs-4 text-primary">System</span>
        </span>
      </a>
    </div>
    <!-- END Logo -->

    <!-- Options -->
    <div>
      <!-- Close Sidebar, Visible only on mobile screens -->
      <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
      <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout" data-action="sidebar_close">
        <i class="fa fa-fw fa-times"></i>
      </button>
      <!-- END Close Sidebar -->
    </div>
    <!-- END Options -->
  </div>
  <!-- END Side Header -->

  <!-- Sidebar Scrolling -->
  <div class="js-sidebar-scroll">
    <!-- Side User -->
    <div class="content-side content-side-user px-0 py-0">
      <!-- Visible only in mini mode -->
      <div class="smini-visible-block animated fadeIn px-3">
        <img class="img-avatar img-avatar32" src="/backend/assets/media/avatars/avatar15.jpg" alt="">
      </div>
      <!-- END Visible only in mini mode -->

      <!-- Visible only in normal mode -->
      <div class="smini-hidden text-center mx-auto">
        <a class="img-link" href="/">
          <img class="img-avatar" src="/backend/assets/media/avatars/avatar15.jpg" alt="">
        </a>
        <ul class="list-inline mt-3 mb-0">
          <li class="list-inline-item">
            <a class="link-fx text-dual fs-sm fw-semibold text-uppercase">{{Auth::user()->name}}</a>
          </li>
          <li class="list-inline-item">
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="link-fx text-dual" href="{{route('mode-change')}}">
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
        <li class="nav-main-item">
          <a class="nav-main-link" href="/">
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



      </ul>
    </div>
    <!-- END Side Navigation -->
  </div>
  <!-- END Sidebar Scrolling -->
</div>
<!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->