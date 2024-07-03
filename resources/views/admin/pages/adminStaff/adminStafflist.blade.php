
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


    <!-- partial:../../partials/_navbar.html -->
    @include('admin/component/header')
    <!-- partial -->
    
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      @include('admin/component/leftslide')

      <!-- partial -->
    
      <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách nhân viên</h3>
                        <a href="{{ URL::to('/admin/adminstaff/create') }}" style="color: #007bff; text-decoration: none; font-weight: bold;">Thêm nhân viên</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Mã nhân viên</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Tên nhân viên</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày sinh</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $index => $staff)
                                    <tr>
                                        <td>{{ $staff->MaNV }}</td>
                                        <td><img src="{{ asset('frontend/Images1/' . $staff->AnhDaiDien) }}" alt="" style="width: 50px"></td>
                                        <td>{{ $staff->TenNV}}</td>
                                        <td>{{ $staff->DiaChi}}</td>
                                        <td>{{ $staff->DienThoai }}</td>
                                        <td>{{ \Carbon\Carbon::parse($staff->NgaySinh)->format('d/m/Y') }}</td>
                                        <td>
                                            <a href="{{ route('adminstaff.edit', ['id' => $staff->MaNV]) }}" class="btn btn-primary btn-sm">Sửa</a>
                                            <form action="{{ route('adminstaff.destroy', ['id' => $staff->MaNV]) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên này không?')">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="pagination">
                    @if ($staffs->currentPage() > 1)
                        <a href="{{ $staffs->previousPageUrl() }}">&laquo;</a>
                    @endif
                    @for ($i = 1; $i <= $staffs->lastPage(); $i++)
                        <a class="{{ $i == $staffs->currentPage() ? 'active' : '' }}" href="{{ $staffs->url($i) }}">{{ $i }}</a>
                    @endfor
                    @if ($staffs->hasMorePages())
                        <a href="{{ $staffs->nextPageUrl() }}">&raquo;</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
<style>
    .pagination {
        width: 100%;
        display: inline-block;
        margin-left: 35%;
    }
    
    .pagination a {
      color: black;
      float: left;
      padding: 8px 16px;
      text-decoration: none;
    }
    
    .pagination a.active {
      background-color: #4CAF50;
      color: white;
    }
    
    .pagination a:hover:not(.active) {background-color: #ddd;}

    table td img{
        border-radius: 0%;
    }
    </style>

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