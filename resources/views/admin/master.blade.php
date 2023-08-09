{{-- <x-app-layout /> --}}
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{'/admin/assets/vendors/mdi/css/materialdesignicons.min.css'}}">
    <link rel="stylesheet" href="{{'/admin/assets/vendors/css/vendor.bundle.base.css'}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{'/admin/assets/vendors/jvectormap/jquery-jvectormap.css'}}">
    <link rel="stylesheet" href="{{'/admin/assets/vendors/flag-icon-css/css/flag-icon.min.css'}}">
    <link rel="stylesheet" href="{{'/admin/assets/vendors/owl-carousel-2/owl.carousel.min.css'}}">
    <link rel="stylesheet" href="{{'/admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css'}}">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{'/admin/assets/css/style.css'}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{'/admin/assets/images/favicon.png'}}" />
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
     @include('admin.layouts.sidebare')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('admin.layouts.header')
        <!-- partial -->
        <div class="main-panel">
         @yield('content')

         @extends('admin.layouts.footer')
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    {{-- {{$slot}} --}}
    {{-- <script>
        $(document).ready(function(){
            $('deletebtn').click(function(e){
                e.preventDefault();
                alert('hello eli');
            });
        });
      </script> --}}
    @include('admin.layouts.js')
    @yield('scripts')
    <!-- End custom js for this page -->
  </body>
</html>

