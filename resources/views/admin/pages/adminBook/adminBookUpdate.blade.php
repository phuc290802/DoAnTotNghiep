
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
                        <h3>Sửa Sản Phẩm</h3>
                    </div>
    
                    <div class="card-body">
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        <form action="{{ route('adminbook.update', $product->MaSach) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                              <label for="TenSach" class="col-md-4 col-form-label text-md-right">Tên Sách</label>
                              <div class="col-md-6">
                                  <input type="text" id="TenSach" name="TenSach" value="{{ $product->TenSach }}" class="form-control" required>
                              </div>
                          </div>
  
                          <div class="form-group row">
                            <label for="MaTL" class="col-md-4 col-form-label text-md-right">Thể Loại</label>
                            <div class="col-md-6">
                                <select id="MaTL" name="MaTL" class="form-control" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->MaTL }}" {{ $category->MaTL == $product->MaTL ? 'selected' : '' }}>
                                            {{ $category->TenTL }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="MaTLCon" class="col-md-4 col-form-label text-md-right">Thể Loại Con</label>
                            <div class="col-md-6">
                              <select id="MaTLCon" name="MaTLCon" class="form-control">
                                <!-- Danh sách thể loại con sẽ được thêm bằng JavaScript -->
                              </select>
                            </div>
                          </div>

                        <div class="form-group row">
                            <label for="MaNXB" class="col-md-4 col-form-label text-md-right">Nhà Xuất Bản</label>
                            <div class="col-md-6">
                                <select id="MaNXB" name="MaNXB" class="form-control" required>
                                    @foreach($nhaxuatbans as $nhaxuatban)
                                        <option value="{{ $nhaxuatban->MaNXB }}" {{ $nhaxuatban->MaNXB == $product->MaNXB ? 'selected' : '' }}>
                                            {{ $nhaxuatban->TenNXB }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
    
                            <div class="form-group row">
                                <label for="MaTG" class="col-md-4 col-form-label text-md-right">Tác giả</label>
                                <div class="col-md-6">
                                    <input type="text" id="MaTG" name="MaTG" value="{{ $product->MaTG }}" class="form-control" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="GiaNhap" class="col-md-4 col-form-label text-md-right">Gía Nhập</label>
                                <div class="col-md-6">
                                    <input type="number" id="GiaNhap" name="GiaNhap" value="{{ $product->GiaNhap }}" class="form-control" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="GiaBan" class="col-md-4 col-form-label text-md-right">Gía Bán</label>
                                <div class="col-md-6">
                                    <input type="number" id="GiaBan" name="GiaBan" value="{{ $product->GiaBan }}" class="form-control" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="TrongLuong" class="col-md-4 col-form-label text-md-right">Trọng Lượng</label>
                                <div class="col-md-6">
                                    <input type="text" id="TrongLuong" name="TrongLuong" value="{{ $product->TrongLuong}}" class="form-control" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="SoLuong" class="col-md-4 col-form-label text-md-right">Số Lượng</label>
                                <div class="col-md-6">
                                    <input type="number" id="SoLuong" name="SoLuong" value="{{ $product->SoLuong }}" class="form-control" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="AnhDaiDien" class="col-md-4 col-form-label text-md-right">Ảnh đại diện</label>
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
                                <label for="fileanh1" class="col-md-4 col-form-label text-md-right">Ảnh Nhỏ 1</label>
                                <div class="col-md-6">
                                    <input type="file" id="fileanh1" name="fileanh1" class="form-control-file @error('fileanh1') is-invalid @enderror" required>
                                    @error('fileanh1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="fileanh2" class="col-md-4 col-form-label text-md-right">Ảnh Nhỏ 2</label>
                                <div class="col-md-6">
                                    <input type="file" id="fileanh2" name="fileanh2" class="form-control-file @error('fileanh2') is-invalid @enderror" required>
                                    @error('fileanh2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="fileanh3" class="col-md-4 col-form-label text-md-right">Ảnh Nhỏ 3</label>
                                <div class="col-md-6">
                                    <input type="file" id="fileanh3" name="fileanh3" class="form-control-file @error('fileanh3') is-invalid @enderror" required>
                                    @error('fileanh3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
    
                            <div class="form-group row">
                                <label for="SoTrang" class="col-md-4 col-form-label text-md-right">Số Trang</label>
                                <div class="col-md-6">
                                    <input type="number" id="SoTrang" name="SoTrang" value="{{ $product->SoTrang }}" class="form-control" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="MoTa" class="col-md-4 col-form-label text-md-right">Mô tả</label>
                                <div class="col-md-6">
                                    <textarea style="height: 150px" name="MoTa" id="MoTa" cols="30" rows="5" class="form-control" required>{{ $product->MoTa }}</textarea>
                                    <div id="charCountMessage" class="text-muted"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="NamXB" class="col-md-4 col-form-label text-md-right">Năm xuất bản</label>
                                <div class="col-md-6">
                                    <input type="Date" id="NamXB" name="NamXB" value="{{ $product->NamXB }}" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="SachMoi" class="col-md-4 col-form-label text-md-right">Sách mới</label>
                                <div class="col-md-6">
                                    <input type="number" id="SachMoi" name="SachMoi" value="{{ $product->SachMoi }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="SachTBo" class="col-md-4 col-form-label text-md-right">Sách theo bộ</label>
                                <div class="col-md-6">
                                    <input type="number" id="SachTBo" name="SachTBo" value="{{ $product->SachTBo }}" class="form-control" required>
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
  <script>
document.addEventListener('DOMContentLoaded', function () {
    const textarea = document.getElementById('MoTa');
    const charCountMessage = document.getElementById('charCountMessage');
    const maxChars = 1000;

    // Function to update character count message
    function updateCharCount() {
        const text = textarea.value;
        const sanitizedText = text.replace(/\s/g, ''); // Remove whitespace
        const charCount = sanitizedText.length;
        charCountMessage.textContent = `Số kí tự: ${charCount}/${maxChars}`;

        // Truncate text if exceeds max chars
        if (charCount > maxChars) {
            textarea.value = sanitizedText.slice(0, maxChars);
            charCountMessage.textContent += ' (Vượt quá giới hạn)';
        }
    }

    // Attach event listeners to textarea
    textarea.addEventListener('input', updateCharCount);
    textarea.addEventListener('paste', function (event) {
        event.preventDefault(); // Prevent default paste behavior
        const pastedText = event.clipboardData.getData('text/plain');
        const sanitizedText = pastedText.replace(/\s/g, ''); // Remove whitespace
        const newText = textarea.value + sanitizedText;
        textarea.value = newText.slice(0, maxChars); // Limit to max chars
        updateCharCount();
    });

    // Initial call to update character count
    updateCharCount();
});
    $(document).ready(function(){
        function loadSubCategories(maTL, selectedMaTLCon = null) {
            $.ajax({
                type: 'GET',
                url: '{{ route("adminbook.category") }}',
                data: { maTL: maTL },
                success: function(response){
                    var subCategories = response;
                    $('#MaTLCon').empty();
                    $.each(subCategories, function(key, value) {
                        var isSelected = selectedMaTLCon && value.MaTLCon == selectedMaTLCon ? 'selected' : '';
                        $('#MaTLCon').append('<option value="' + value.MaTLCon + '" ' + isSelected + '>' + value.TenTL + '</option>');
                    });
                },
                error: function(xhr, status, error){
                    console.error(error);
                }
            });
        }

        $('#MaTL').change(function(){
            var maTL = $(this).val();
            loadSubCategories(maTL);
        });

        // Load sub-categories on page load if MaTLCon is already selected
        var initialMaTL = $('#MaTL').val();
        var initialMaTLCon = '{{ $product->MaTLCon }}';
        if (initialMaTL) {
            loadSubCategories(initialMaTL, initialMaTLCon);
        }
    });
</script>
</body>

</html> 



