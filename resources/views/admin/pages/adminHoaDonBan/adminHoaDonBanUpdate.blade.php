
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
  
</head>

<body>
  @include('admin/component/header')
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      @include('admin/component/leftslide')

      <!-- partial -->
      
      
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Sửa Hóa đơn bán</h3>
                    </div>
    
                    <div class="card-body">
                        <form action="{{ route('adminhdb.update', $hoadonban->SoHDB) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                              <label for="MaNV" class="col-md-4 col-form-label text-md-right">Mã nhân viên</label>
                              <div class="col-md-6">
                                  <input type="text" id="MaNV" name="MaNV" value="{{ $hoadonban->MaNV }}" class="form-control" required>
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="MaKH" class="col-md-4 col-form-label text-md-right">Mã khách hàng</label>
                              <div class="col-md-6">
                                  <input type="text" id="MaKH" name="MaKH" value="{{ $hoadonban->MaKH }}" class="form-control" required>
                              </div>
                          </div>

                            <div class="form-group row">
                                <label for="NgayBan" class="col-md-4 col-form-label text-md-right">Ngày bán</label>
                                <div class="col-md-6">
                                    <input type="text" id="NgayBan" name="NgayBan" value="{{ $hoadonban->NgayBan }}" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="TrangThai" class="col-md-4 col-form-label text-md-right">Trạng thái</label>
                                <div class="col-md-6">
                                    <input type="text" id="TrangThai" name="TrangThai" value="{{ $hoadonban->TrangThai }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Cập Nhật Sản Phẩm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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



