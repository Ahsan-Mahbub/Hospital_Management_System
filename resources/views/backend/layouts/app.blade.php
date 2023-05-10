<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Hospital Management System</title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="/fav.svg">
    <link rel="icon" type="image/png" sizes="192x192" href="/fav.svg">
    <link rel="apple-touch-icon" sizes="180x180" href="/fav.svg">
    <!-- END Icons -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap">
    <link rel="stylesheet" id="css-main" href="/backend/assets/css/codebase.min.css">
    <link rel="stylesheet" href="/backend/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/toastr.min.css">

  </head>
  <body>
    <!-- Page Container -->
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
      @include('backend.layouts.sideoverlay')
      @include('backend.layouts.sidebar')
      @include('backend.layouts.header')
      <!-- Main Container -->
      <main id="main-container">
        @yield('content')
      </main>
      <!-- END Main Container -->
      @include('backend.layouts.footer')
    </div>
    <!-- END Page Container -->
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="/backend/assets/js/codebase.app.min.js"></script>
    <script src="/backend/assets/js/plugins/chart.js/chart.min.js"></script>
    <script src="/backend/assets/js/pages/be_pages_dashboard.min.js"></script>

    <script src="/backend/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
    <script src="/backend/assets/js/plugins/datatables-buttons/buttons.print.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-buttons/buttons.html5.min.js"></script>

    <!-- Page JS Code -->
    <script src="/backend/assets/js/pages/be_tables_datatables.min.js"></script>

    <script src="/toastr.min.js"></script>
    <script>
      @if(Session::has('message'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
        toastr.success("{{ session('message') }}");
      @endif
      @if(Session::has('error'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
        toastr.error("{{ session('error') }}");
      @endif
      @if(Session::has('info'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
        toastr.info("{{ session('info') }}");
      @endif
      @if(Session::has('warning'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
        toastr.warning("{{ session('warning') }}");
      @endif
    </script>
    <script type="text/javascript" src='https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js'></script>
    <script>
      tinymce.init({
        selector: ".editor"
      });
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
     
         $('.delete-confirm').click(function(event) {
              var form =  $(this).closest("form");
              var name = $(this).data("name");
              event.preventDefault();
              swal({
                  title: `Are you sure you want to delete this record?`,
                  text: "If you delete this, it will be gone forever.",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  form.submit();
                }
              });
          });
      
    </script>
  
    @yield('script')
  </body>
</html>