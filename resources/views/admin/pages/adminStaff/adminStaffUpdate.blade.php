
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
                        <h3>Sửa Thông tin</h3>
                    </div>
    
                    <div class="card-body">
                        <form action="{{ route('adminstaff.update', $staff->MaNV) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                              <label for="TenNV" class="col-md-4 col-form-label text-md-right">Tên</label>
                              <div class="col-md-6">
                                  <input type="text" id="TenNV" name="TenNV" value="{{ $staff->TenNV }}" class="form-control" required>
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="UserName" class="col-md-4 col-form-label text-md-right">UserName</label>
                              <div class="col-md-6">
                                  <input type="text" id="UserName" name="UserName" value="{{ $staff->UserName }}" class="form-control" required>
                              </div>
                          </div>

                            <div class="form-group row">
                                <label for="GioiTinh" class="col-md-4 col-form-label text-md-right">Giới tính</label>
                                <div class="col-md-6">
                                    <input type="text" id="GioiTinh" name="GioiTinh" value="{{ $staff->GioiTinh }}" class="form-control" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="DiaChi" class="col-md-4 col-form-label text-md-right">Địa chỉ</label>
                                <div class="col-md-6">
                                    <input type="text" id="DiaChi" name="DiaChi" value="{{ $staff->DiaChi }}" class="form-control" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="DienThoai" class="col-md-4 col-form-label text-md-right">Điện thoại</label>
                                <div class="col-md-6">
                                    <input type="number" id="DienThoai" name="DienThoai" value="{{ $staff->DienThoai }}" class="form-control" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="NgaySinh" class="col-md-4 col-form-label text-md-right">Ngày sinh</label>
                                <div class="col-md-6">
                                    <input type="Date" id="NgaySinh" name="NgaySinh" value="{{ $staff->NgaySinh }}" class="form-control" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="AnhDaiDien" class="col-md-4 col-form-label text-md-right">Ảnh đại diện</label>
                                <div class="col-md-6">
                                    <input type="text" id="AnhDaiDien" name="AnhDaiDien" value="{{ $staff->AnhDaiDien}}" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu</label>
                                <div class="col-md-6">
                                    <input type="text" id="password" name="password" value="{{ $staff->password}}" class="form-control" required>
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



