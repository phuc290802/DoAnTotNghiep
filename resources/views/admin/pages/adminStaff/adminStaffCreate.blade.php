
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
                    <div class="card-header">{{ __('Thêm nhân viên mới') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('adminStaff.store') }}">
                            @csrf 
                            <div class="form-group row">
                                <label for="TenNV" class="col-md-4 col-form-label text-md-right">Tên Nhân viên</label>
    
                                <div class="col-md-6">
                                    <input id="TenNV" type="text" class="form-control @error('TenNV') is-invalid @enderror" name="TenNV" value="{{ old('TenNV') }}" required>
    
                                    @error('TenNV')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="UserName" class="col-md-4 col-form-label text-md-right">UserName</label>
    
                                <div class="col-md-6">
                                    <input id="UserName" type="text" class="form-control @error('UserName') is-invalid @enderror" name="UserName" value="{{ old('UserName') }}" required>
    
                                    @error('UserName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="GioiTinh" class="col-md-4 col-form-label text-md-right">Giới tính</label>
    
                                <div class="col-md-6">
                                    <input id="GioiTinh" type="text" class="form-control @error('GioiTinh') is-invalid @enderror" name="GioiTinh" value="{{ old('GioiTinh') }}" required>
    
                                    @error('GioiTinh')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="DiaChi" class="col-md-4 col-form-label text-md-right">Địa chỉ</label>
    
                                <div class="col-md-6">
                                    <input id="DiaChi" type="text" class="form-control @error('DiaChi') is-invalid @enderror" name="DiaChi" value="{{ old('DiaChi') }}" required>
    
                                    @error('DiaChi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="DienThoai" class="col-md-4 col-form-label text-md-right">Điện thoại</label>
    
                                <div class="col-md-6">
                                    <input id="DienThoai" type="text" class="form-control @error('DienThoai') is-invalid @enderror" name="DienThoai" value="{{ old('DienThoai') }}" required>
    
                                    @error('DienThoai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="NgaySinh" class="col-md-4 col-form-label text-md-right">Ngày sinh</label>
    
                                <div class="col-md-6">
                                    <input id="NgaySinh" type="date" class="form-control @error('NgaySinh') is-invalid @enderror" name="NgaySinh" value="{{ old('NgaySinh') }}" required>
    
                                    @error('NgaySinh')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="AnhDaiDien" class="col-md-4 col-form-label text-md-right">Ảnh đại diện</label>
    
                                <div class="col-md-6">
                                    <input id="AnhDaiDien" type="text" class="form-control @error('AnhDaiDien') is-invalid @enderror" name="AnhDaiDien" value="{{ old('AnhDaiDien') }}" required>
    
                                    @error('AnhDaiDien')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required>
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

    
                            <!-- Add other fields similarly -->
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Staff') }}
                                    </button>
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