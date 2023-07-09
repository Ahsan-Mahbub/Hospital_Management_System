<style>
  .space-x-1>*+* {
    margin-left: 1.25rem!important;
  } 
  .modal-content .block {
    height: 100vh;
    background: transparent;
  }
  .modal-content .block-content {
    height: 100vh;
  }
  .modal100per {
    width: 100%!important;
    max-width: 100%;
    margin: 0px;
  }

  .floormain {
    padding: 10px;
    margin-bottom: -12px;
    background: #777;
    border-radius: 4px;
    margin-bottom: 10px;
  }
  .floormain fieldset {
    border-radius: 8px;
    padding: 10px 10px 5px;
    margin-bottom: 10px;
}
  .floormain legend {
    float: unset; 
    display: block;
    width: auto;
    margin-bottom: 0px;
    color: #333;
    border-radius: 30px;
    border-bottom: 0;
    background: #fff;
    padding: 5px 8px;
    border: 1px solid #9a9a96;
  }
  .floormain legend h4 {
    font-size: 12px;
    font-weight: normal;
    margin: 0;
    font-family: 'Roboto-Bold';
}
.floorwardbg {
    background: #4c4b4b !important;
    border: 1px solid #fff !important;
    color: #fff !important;
}
.relative {
    position: relative;
}
.bedgray, .bedred, .bedgreen, .bed-unused {
    display: block;
    margin-bottom: 18px;
}
.bedred i {
    color: #fa6385;
}

.bedgray i, .bedred i, .bedgreen i, .bed-unused i {
    font-size: 50px;
}

.bedred .bedtpmiuns6 {
    margin-top: 6px;
    font-family: 'Roboto-Bold';
    color: #fa6485;
    overflow: hidden;
    width: 100%;
    white-space: nowrap;
    text-overflow: ellipsis;
    font-weight: 600;
}
fieldset.floormain a {
    display: block;
    overflow: hidden;
    width: 100%;
    white-space: nowrap;
    text-overflow: ellipsis;
}
.ukclose {
    top: 17px;
    right: 11px;
    -webkit-box-shadow: 0 10px 20px rgba(0,0,0,.19), 0 6px 6px rgba(0,0,0,.23);
    box-shadow: 0 10px 20px rgba(0,0,0,.19), 0 6px 6px rgba(0,0,0,.23);
    border: none;
    border-radius: 100%;
    z-index: 10;
    position: absolute;
    outline: none;
    font-size: 20px;
    width: 30px;
    height: 30px;
}
.bedmodal .ukclose {
    top: 15px;
    right: 5px;
    background: #2195f3;
    color: #fff;
    font-weight: bold;
}
</style>
<!-- Header -->
<header id="page-header">
  <!-- Header Content -->
  <div class="content-header">
    <!-- Left Section -->
    <div class="space-x-1">
      <!-- Toggle Sidebar -->
      <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
      <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
        <i class="fa fa-fw fa-bars"></i>
      </button>
      <!-- END Toggle Sidebar -->
    </div>
    <!-- END Left Section -->

    <!-- Right Section -->
    <div class="d-flex align-items-center space-x-1">
      
      <!-- User Dropdown -->
      <div class="dropdown d-inline-block">
        <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user d-sm-none"></i>
          <span class="d-none d-sm-inline-block fw-semibold">{{Auth::user()->name}}</span>
          <i class="fa fa-angle-down opacity-50 ms-1"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
          <div class="px-2 py-3 bg-body-light rounded-top">
            <h5 class="h6 text-center mb-0">
              {{Auth::user()->name}}
            </h5>
          </div>
          <div class="p-2">
            <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
              <span>Profile</span>
              <i class="fa fa-fw fa-user opacity-25"></i>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span>Sign Out</span>
              <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
        </div>
      </div>
      <!-- END User Dropdown -->

      {{-- Bed status cehck --}}
      <div style="font-size: 13px; font-weight: 600; cursor: pointer" data-bs-toggle="modal" data-bs-target="#bed_status_model">
        <i class="fa fa-bed"></i>
        Bed Status
      </div>
      <!-- Notifications -->
      <div class="dropdown d-inline-block">
        <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-notifications" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-flag"></i>
          <span class="text-primary">&bull;</span>
        </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications">
          <div class="px-2 py-3 bg-body-light rounded-top">
            <h5 class="h6 text-center mb-0">
              Notifications
            </h5>
          </div>
          <ul class="nav-items my-2 fs-sm">
            <li>
              <a class="text-dark d-flex py-2" href="javascript:void(0)">
                <div class="flex-shrink-0 me-2 ms-3">
                  <i class="fa fa-fw fa-check text-success"></i>
                </div>
                <div class="flex-grow-1 pe-2">
                  <p class="fw-medium mb-1">You’ve upgraded to a VIP account successfully!</p>
                  <div class="text-muted">15 min ago</div>
                </div>
              </a>
            </li>
          </ul>
          <div class="p-2 bg-body-light rounded-bottom">
            <a class="dropdown-item text-center mb-0" href="javascript:void(0)">
              <i class="fa fa-fw fa-flag opacity-50 me-1"></i> View All
            </a>
          </div>
        </div>
      </div>
      <!-- END Notifications -->

      <!-- Toggle Side Overlay -->
      <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
      <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="side_overlay_toggle">
        <i class="fa fa-fw fa-stream"></i>
      </button>
      <!-- END Toggle Side Overlay -->
    </div>
    <!-- END Right Section -->
  </div>
  <!-- END Header Content -->


  <!-- Header Loader -->
  <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
  <div id="page-header-loader" class="overlay-header bg-primary">
    <div class="content-header">
      <div class="w-100 text-center">
        <i class="far fa-sun fa-spin text-white"></i>
      </div>
    </div>
  </div>
  <!-- END Header Loader -->
</header>
<!-- END Header -->

{{-- Bed status modal --}}
<div class="modal" id="bed_status_model" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
  <div class="modal-dialog modal100per" role="document">
      <div class="modal-content">
        {{-- modal close button --}}
        <button type="button" class="ukclose" data-dismiss="modal" autocomplete="off">×</button>

        <div class="block shadow-none mb-0">
            <div class="block-content fs-sm">
                <fieldset class="floormain">
                    <legend>
                      <h4>4th Floor</h4>
                    </legend>
                    <div class="row">
                      <div class="col-md-12">
                        <fieldset style="background-color:#f4f4f4">
                          <legend class="text-center floorwardbg">
                            <h4>Non Ac</h4>
                          </legend>
                          <div class="row">
                            <div class="col-md-1 col-xs-6 col-lg-1 col-sm-4">
                              <a data-toggle="popover" class="beddetail_popover" href="#" data-original-title="" title="">
                                <div class="relative">
                                    <div class="bedred">
                                        <i class="fa fa-bed"></i>
                                        <div class="bedtpmiuns6">Jamesh Wood</div>
                                    </div>
                                </div>
                                <div class="bed_detail_popover" style="display: none">
                                    Bed No. : FF - 114<br>Patient Id : 532<br>Admission Date : 11/11/2022 06:19 AM<br>Phone : 9212542542<br>Gender : Male<br>Guardian Name : Kalvin Wood<br>Consultant : Sansa Gomez                                    
                                </div>
                              </a>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                </fieldset>

                <fieldset class="floormain">
                  <legend>
                    <h4>4th Floor</h4>
                  </legend>
                  <div class="row">
                    <div class="col-md-12">
                      <fieldset style="background-color:#f4f4f4">
                        <legend class="text-center floorwardbg">
                          <h4>Non Ac</h4>
                        </legend>
                        <div class="row">
                          <div class="col-md-1 col-xs-6 col-lg-1 col-sm-4">
                            <a data-toggle="popover" class="beddetail_popover" href="#" data-original-title="" title="">
                              <div class="relative">
                                  <div class="bedred">
                                      <i class="fa fa-bed"></i>
                                      <div class="bedtpmiuns6">Jamesh Wood</div>
                                  </div>
                              </div>
                              <div class="bed_detail_popover" style="display: none">
                                  Bed No. : FF - 114<br>Patient Id : 532<br>Admission Date : 11/11/2022 06:19 AM<br>Phone : 9212542542<br>Gender : Male<br>Guardian Name : Kalvin Wood<br>Consultant : Sansa Gomez                                    
                              </div>
                            </a>
                          </div>
                        </div>
                      </fieldset>
                    </div>
                  </div>
              </fieldset>
            </div>
        </div>
      </div>
  </div>
</div>
{{-- <script type="text/javascript">
  $(document).ready(function () {
      $('.beddetail_popover').popover({
          placement: 'right',
          trigger: 'hover',
          container: 'body',
          html: true,
          content: function () {

              return $(this).closest('div').find('.bed_detail_popover').html();
          }
      });
  });
</script> --}}