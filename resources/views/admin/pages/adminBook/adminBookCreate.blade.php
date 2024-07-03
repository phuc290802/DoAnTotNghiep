
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
                    <div class="card-header">{{ __('Thêm sách mới') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('adminBook.store') }}">
                            @csrf 
                            <div class="form-group row">
                                <label for="TenSach" class="col-md-4 col-form-label text-md-right">Tên Sách</label>
    
                                <div class="col-md-6">
                                    <input id="TenSach" type="text" class="form-control @error('TenSach') is-invalid @enderror" name="TenSach" value="{{ old('TenSach') }}" required>
    
                                    @error('TenSach')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Giao diện -->
<div class="form-group row">
    <label for="MaTL" class="col-md-4 col-form-label text-md-right">Thể loại</label>
    <div class="col-md-6">
        <select id="MaTL" class="form-control @error('MaTL') is-invalid @enderror" name="MaTL" required>
            @foreach($categorys as $category)
                <option value="{{ $category->MaTL }}">{{ $category->TenTL }}</option>
            @endforeach
        </select>
        @error('MaTL')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="MaTLCon" class="col-md-4 col-form-label text-md-right">Thể loại con</label>
    <div class="col-md-6">
        <select id="MaTLCon" class="form-control @error('MaTLCon') is-invalid @enderror" name="MaTLCon" required>
            <!-- Danh sách thể loại con sẽ được thêm bằng JavaScript -->
        </select>
        @error('MaTLCon')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


                            <div class="form-group row">
                                <label for="MaNXB" class="col-md-4 col-form-label text-md-right">Nhà xuất bản</label>
                
                                <div class="col-md-6">
                                    <select id="MaNXB" class="form-control @error('MaNXB') is-invalid @enderror" name="MaNXB" required>
                                        @foreach($nhaxuatbans as $nhaxuatban)
                                            <option value="{{ $nhaxuatban->MaNXB }}">{{ $nhaxuatban->TenNXB }}</option>
                                        @endforeach
                                    </select>
                
                                    @error('MaNXB')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="MaTG" class="col-md-4 col-form-label text-md-right">Tác giả</label>
    
                                <div class="col-md-6">
                                    <input id="MaTG" type="text" class="form-control @error('MaTG') is-invalid @enderror" name="MaTG" value="{{ old('MaTG') }}" required>
    
                                    @error('MaTG')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="GiaNhap" class="col-md-4 col-form-label text-md-right">Giá nhập</label>
    
                                <div class="col-md-6">
                                    <input id="GiaNhap" type="text" class="form-control @error('GiaNhap') is-invalid @enderror" name="GiaNhap" value="{{ old('GiaNhap') }}" required>
    
                                    @error('GiaNhap')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="GiaBan" class="col-md-4 col-form-label text-md-right">Giá bán</label>
    
                                <div class="col-md-6">
                                    <input id="GiaBan" type="text" class="form-control @error('GiaBan') is-invalid @enderror" name="GiaBan" value="{{ old('GiaBan') }}" required>
    
                                    @error('GiaBan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="SoTrang" class="col-md-4 col-form-label text-md-right">Số trang</label>
    
                                <div class="col-md-6">
                                    <input id="SoTrang" type="text" class="form-control @error('SoTrang') is-invalid @enderror" name="SoTrang" value="{{ old('SoTrang') }}" required>
    
                                    @error('SoTrang')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="TrongLuong" class="col-md-4 col-form-label text-md-right">Trọng lượng</label>
    
                                <div class="col-md-6">
                                    <input id="TrongLuong" type="text" class="form-control @error('TrongLuong') is-invalid @enderror" name="TrongLuong" value="{{ old('SoTrang') }}" required>
    
                                    @error('TrongLuong')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="AnhDaiDien" class="col-md-4 col-form-label text-md-right">Ảnh đại diện</label>
                            
                                <div class="col-md-6">
                                    <input id="AnhDaiDien" type="file" class="form-control-file @error('AnhDaiDien') is-invalid @enderror" name="AnhDaiDien" required>
                            
                                    @error('AnhDaiDien')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

    <div class="form-group row">
        <label for="fileanh1" class="col-md-4 col-form-label text-md-right">Ảnh Nhỏ 1</label>
        <div class="col-md-6">
            <input type="file" id="fileanh1" name="fileanh1" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="fileanh2" class="col-md-4 col-form-label text-md-right">Ảnh Nhỏ 2</label>
        <div class="col-md-6">
            <input type="file" id="fileanh2" name="fileanh2" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="fileanh3" class="col-md-4 col-form-label text-md-right">Ảnh Nhỏ 3</label>
        <div class="col-md-6">
            <input type="file" id="fileanh3" name="fileanh3" class="form-control" required>
        </div>
    </div>

                            <div class="form-group row">
                                <label for="SoLuong" class="col-md-4 col-form-label text-md-right">Số lượng</label>
    
                                <div class="col-md-6">
                                    <input id="SoLuong" type="text" class="form-control @error('SoLuong') is-invalid @enderror" name="SoLuong" value="{{ old('SoLuong') }}" required>
    
                                    @error('SoLuong')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="MoTa" class="col-md-4 col-form-label text-md-right">Mô tả</label>
                                <div class="col-md-6">
                                    <textarea
                                        style="height: 150px"
                                        id="MoTa"
                                        class="form-control @error('MoTa') is-invalid @enderror"
                                        name="MoTa"
                                        required
                                        cols="30"
                                        rows="10">{{ old('MoTa') }}</textarea>
                                    @error('MoTa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div id="char-count" style="margin-top: 5px; color: gray;">0 / 1000 characters</div>
                                </div>
                            </div>
                            
                            
                            
                            

                            

                            <div class="form-group row">
                                <label for="NamXB" class="col-md-4 col-form-label text-md-right">Năm xuất bản</label>
    
                                <div class="col-md-6">
                                    <input id="NamXB" type="date" class="form-control @error('NamXB') is-invalid @enderror" name="NamXB" value="{{ old('NamXB') }}" required>
    
                                    @error('NamXB')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="SachMoi" class="col-md-4 col-form-label text-md-right">Sách mới</label>
    
                                <div class="col-md-6">
                                    <input id="SachMoi" type="text" class="form-control @error('SachMoi') is-invalid @enderror" name="SachMoi" value="{{ old('SachMoi') }}" required>
    
                                    @error('SachMoi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="SachTBo" class="col-md-4 col-form-label text-md-right">Sách theo bộ</label>
    
                                <div class="col-md-6">
                                    <input id="SachTBo" type="text" class="form-control @error('SachTBo') is-invalid @enderror" name="SachTBo" value="{{ old('SachTBo') }}" required>
    
                                    @error('SachTBo')
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
                                        {{ __('Add Book') }}
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
  <script>
    
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('MoTa');
    const charCountDisplay = document.getElementById('char-count');
    const maxChars = 1000;

    textarea.addEventListener('input', function() {
        updateCharCount();
    });

    function updateCharCount() {
        // Remove extra spaces and new lines for a clean character count
        let cleanedText = textarea.value.replace(/\s+/g, ' ').trim();
        const charCount = cleanedText.length;

        if (charCount > maxChars) {
            // Trim the text to the maximum allowed characters
            cleanedText = cleanedText.substring(0, maxChars);
            textarea.value = cleanedText;
            charCountDisplay.textContent = `${maxChars} / ${maxChars} characters`;
        } else {
            charCountDisplay.textContent = `${charCount} / ${maxChars} characters`;
        }
    }

    // Initial check if there is already content in the textarea
    updateCharCount();
});


    $(document).ready(function(){
        $('#MaTL').change(function(){
            var maTL = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{ route("adminbook.category") }}', // Sử dụng tuyến đường đã đặt tên
                data: {
                    maTL: maTL
                },
                success: function(response){
                    var subCategories = response;
                    // Xóa các options cũ trước khi thêm mới
                    $('#MaTLCon').empty();
                    // Thêm các option mới từ danh sách thể loại con
                    $.each(subCategories, function(key, value) {
                        $('#MaTLCon').append('<option value="' + value.MaTLCon + '">' + value.TenTL + '</option>');
                    });
                },

                error: function(xhr, status, error){
                    console.error(error);
                }
            });
        });
    });
</script>

</body>

</html> 