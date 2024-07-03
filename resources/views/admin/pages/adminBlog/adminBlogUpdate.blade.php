
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
                        <h3>Sửa tin tức</h3>
                    </div>
    
                    <div class="card-body">
                        <form action="{{ route('adminblog.update', $blog->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                              <label for="TieuDe" class="col-md-4 col-form-label text-md-right">Tiêu đề</label>
                              <div class="col-md-6">
                                  <input type="text" id="TieuDe" name="TieuDe" value="{{ $blog->TieuDe }}" class="form-control" required>
                              </div>
                          </div>
  
    
                            <div class="form-group row">
                                <label for="AnhDaiDien" class="col-md-4 col-form-label text-md-right">Ảnh</label>
                                <div class="col-md-6">
                                    <input type="file" id="AnhDaiDien" name="AnhDaiDien" class="form-control-file @error('AnhDaiDien') is-invalid @enderror" required>
                                    @error('AnhDaiDien')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="NoiDung" class="col-md-4 col-form-label text-md-right">Nội dung</label>
                                <div class="col-md-6">
                                    {{-- <input type="text" id="NoiDung" name="NoiDung" value="{{ $blog->NoiDung}}" class="form-control" required> --}}
                                    <textarea name="NoiDung" id="NoiDung" cols="30" rows="5">{{ $blog->NoiDung }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ThoiGian" class="col-md-4 col-form-label text-md-right">Ngày viết</label>
                                <div class="col-md-6">
                                    <input type="Date" id="ThoiGian" name="ThoiGian" value="{{ $blog->ThoiGian }}" class="form-control" required>
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



