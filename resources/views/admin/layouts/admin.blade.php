<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>
  
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <!-- Select 2-->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- Custom styles for this template-->
  <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <!-- My Custom styles for this template-->
  <link href="{{ asset('admin/css/myedit.css') }}" rel="stylesheet">
  <!-- Use livewire-->
  <livewire:styles />
  <!-- css code -->
  @stack('css')

</head>

<body id="page-top">
  <div id="id">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      @include('admin.partial.sidebar')

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          @include('admin.partial.navbar')

          <!-- Main content -->
          <div class="container-fluid">
            @yield('admin-content')
          </div>
        </div>
        
        <!-- Footer -->
        @include('admin.partial.footer')
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
  
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>

  <!-- My Custom scripts for all pages-->
  <script src="{{ asset('admin/js/myedit.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>

  <!-- DataTables  & Plugins -->
  <script src="{{ asset('admin/DataTables/DataTables/js/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('admin/DataTables/Buttons/js/dataTables.buttons.js') }}"></script>
  <script src="{{ asset('admin/DataTables/Responsive/js/dataTables.responsive.js') }}"></script>
  <script src="{{ url('/vendor/datatables/buttons.server-side.js') }}"></script>
  <script src='https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap5.min.js'></script>

  <!-- sweetalert Scripts-->
  @include('sweetalert::alert')
  <!--  Use livewire -->
  <livewire:scripts />
  @stack('js')
</body>

</html>