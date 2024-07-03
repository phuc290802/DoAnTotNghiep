
<!DOCTYPE html>
<html lang="en">

<head>

   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>Star Admin2 </title>
   <!-- plugins:css -->
   <link rel="stylesheet" href="{{ asset('backend/assets/vendors/feather/feather.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendors/ti-icons/css/themify-icons.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendors/typicons/typicons.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendors/css/vendor.bundle.base.css') }}">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
   <!-- endinject -->
   <!-- Plugin css for this page -->
   <!-- End plugin css for this page -->
   <!-- inject:css -->
   <link rel="stylesheet" href="{{ asset('backend/assets/css/vertical-layout-light/style.css') }}">
   <!-- endinject -->
   <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
   <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
  
</head>

<body>


    <!-- partial:../../partials/_navbar.html -->
    @include('admin/component/header')
    <!-- partial -->
    
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      @include('admin/component/leftslide')

      <!-- partial -->
      @include('admin/pages/adminHoaDonBan/adminHoaDonBanStore')
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  @include('admin/component/scripts')
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html> 