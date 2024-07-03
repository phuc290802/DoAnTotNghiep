
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
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
  <style>
    .statistics-details {
    width: 100%;
    gap: 20px;
    padding: 20px;
    background-color: #f8f9fa;
      }

      .stat-box {
          flex: 1;
          padding: 20px;
          text-align: center;
          background-color: #ffffff;
          border: 1px solid #ddd;
          border-radius: 8px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .stat-box h5 {
          font-size: 1.2em;
          margin-bottom: 10px;
          color: #333;
      }

      .stat-box p {
          font-size: 1.5em;
          font-weight: bold;
          color: #007bff;
      }

  </style>
</head>

<body class="with-welcome-text">
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding px-3 d-flex align-items-center justify-content-between">
          <div class="ps-lg-3">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with
                this template!</p>
              <a href="https://www.bootstrapdash.com/product/star-admin-pro/" target="_blank"
                class="btn me-2 buy-now-btn border-0">Buy Now</a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href="https://www.bootstrapdash.com/product/star-admin-pro/"><i class="ti-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="ti-close text-white"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- partial:partials/_navbar.html -->
    @include('admin/component/header')
    <!-- partial -->


      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('admin/component/leftslide')    
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                        aria-controls="overview" aria-selected="true">Tổng quan</a>
                    </li>
                  </ul>
                </div>
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                          <div class="stat-box">
                            <h5>Số lượng đánh giá</h5>
                            <h3>{{ $allDG }}</h3>
                        </div>
                          <div class="stat-box">
                            <h5>Khách hàng liên hệ</h5>
                            <h3>{{ $countKH }}</h3>
                        </div>
                        <div class="stat-box">
                            <h5>Hóa đơn bán hàng</h5>
                            <h3>{{ $countHDB1 }}</h3>
                        </div>
                        <div class="stat-box">
                            <h5>Hóa Đơn Giao hàng</h5>
                            <h3>{{ $countHDB2 }}</h3>
                        </div>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Tổng quan thị trường</h4>
                                    <p class="card-subtitle card-subtitle-dash">Tổng lợi nhuận của năm</p>
                                  </div>
                                  <div>
                                    <div class="dropdown">
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <h6 class="dropdown-header">Cài đặt</h6>
                                        <a class="dropdown-item" href="#">Hoạt động</a>
                                        <a class="dropdown-item" href="#">Hoạt động mới</a>
                                        <a class="dropdown-item" href="#">Khác</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Mới</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                  <div class="d-sm-flex align-items-center mt-4 justify-content-between">
                                    <h2 class="me-2 fw-bold">{{ number_format($tongloinhuan, 0, ',', '.') }}</h2>
                                    <h4 class="me-2">VND</h4>
                                  </div>
                                  <div class="me-3">
                                    <div id="marketingOverview-legend"></div>
                                  </div>
                                </div>
                                <div class="chartjs-bar-wrapper mt-3">
                                  <canvas id="marketingOverview" style="height: 250px;">
                                    <div id="doanhSoData" data-doanh-so="{{ json_encode($doanhSoTheoThang) }}"></div>
                                  </canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  @if (session('UserName')!='1111111111')
                                  <div>
                                    <h4 class="card-title card-title-dash">Danh sách khách hàng</h4>
                                    <p class="card-subtitle card-subtitle-dash">Các đơn hàng</p>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <table class="table select-table">
                                    <thead>
                                      <tr>
                                        <th>

                                        </th>
                                        <th>Khách hàng</th>
                                        <th>Điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Số đơn hàng</th>
                                        <th>Trạng thái</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @if ($listKHs)
                                        @foreach ($listKHs as $listkh)
                                        <tr>
                                          <td>
                                          </td>
                                          <td>
                                            <div class="d-flex">
                                              <img src="{{asset('frontend/Images1/'.$listkh->AnhDaiDien)}}" alt="">
                                              <div>
                                                <h6>{{$listkh->TenKH}}</h6>
                                                <p>{{$listkh->UserName}}</p>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <h6>{{$listkh->DienThoai}}</h6>
                                            @php
                                            $tonghoadonban = $tonghoadon->where('MaKH', $listkh->MaKH)->count();
                                            if($listkh->GioiTinh == 1)
                                                $gioitinh = 'Nam';
                                            else
                                                $gioitinh = 'Nữ';
                                            @endphp
                                        
                                            <p>{{$gioitinh}}</p>
                                          </td>
                                          <td>
                                            <p>{{$listkh->DiaChi}}</p>
                                          </td>
                                          <td>
                                            <p>{{$tonghoadonban}}</p>
                                          </td>
                                          <td>
                                            @php
                                            $makh = session('CustomorID');
                                            if($listkh->MaKH == $makh) {
                                                $trangthai = '<div class="badge badge-opacity-success">online</div>';
                                            } else {
                                                $trangthai = '<div class="badge badge-opacity-warning">offline</div>';
                                            }
                                            echo $trangthai;
                                        @endphp
                                        
                                        </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                  </table>
                                  @endif

                                  @if (session('UserName')=='1111111111')
                                  <div>
                                    <h4 class="card-title card-title-dash">Danh sách nhân viên</h4>
                                    <p class="card-subtitle card-subtitle-dash">nhân viên đang hoạt động</p>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <table class="table select-table">
                                    <thead>
                                      <tr>
                                        <th>

                                        </th>
                                        <th>Nhân viên</th>
                                        <th>Điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Tài khoản</th>
                                        <th>Trạng thái</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @if ($listnhanviens)
                                        @foreach ($listnhanviens as $listnhanvien)
                                        <tr>
                                          <td>
                                          </td>
                                          <td>
                                            <div class="d-flex">
                                              <img src="{{asset('frontend/Images1/'.$listnhanvien->AnhDaiDien)}}" alt="">
                                              <div>
                                                <h6>{{$listnhanvien->TenNV}}</h6>
                                                <p>{{$listnhanvien->MaNV}}</p>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <h6>{{$listnhanvien->DienThoai}}</h6>
                                        
                                            <p>{{$listnhanvien->GioiTinh}}</p>
                                          </td>
                                          <td>
                                            <p>{{$listnhanvien->DiaChi}}</p>
                                          </td>
                                          <td>
                                            <p>{{$listnhanvien->UserName}}</p>
                                          </td>
                                          <td>
                                            <div class="badge badge-opacity-success">online</div>
                                        
                                        </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                  </table>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <h4 class="card-title card-title-dash">Thể loại được yêu thích</h4>
                                    </div>
                                    <div>
                                      <canvas class="my-auto" id="doughnutChart" data-tentheloai="{{ json_encode($tenTLArray) }}" data-tongsotheloai="{{ json_encode($theLoaiTheoSoLuongBan) }}" width="211" height="211" style="display: block; box-sizing: border-box; height: 168.8px; width: 168.8px;"></canvas>
                                    </div>
                                    <div id="doughnutChart-legend" class="mt-5 text-center">
                                      <ul style="display: inline">
                                          @php
                                          $colors = ['#1F3BB3', '#FDD0C7', '#52CDFF', '#81DADA', '#CD5C5C', '#EE82EE'];
                                          @endphp
                                          @foreach($tenTLArray as $index => $tenTL)
                                          <li>
                                              <span style="background-color: {{ $colors[$index % count($colors)] }}"></span>
                                              {{ $tenTL }} ({{ $theLoaiTheoSoLuongBan[$index]->TongSoLuong }})
                                          </li>
                                          @endforeach
                                      </ul>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <div>
                                        <h4 class="card-title card-title-dash">Lượt đánh giá <i class="menu-icon mdi mdi-star" style="color: 	#CCCC00;font-size: 20px"></i></h4>
                                      </div>
                                    </div>
                                    <div class="mt-3">
                                      <canvas id="leaveReport" data-vote="{{ json_encode($voteTotals) }}" width="211" height="187" style="display: block; box-sizing: border-box; height: 200px; width: 168.8px;"></canvas>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        {{-- <footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a
        href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
    <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
  </div>
</footer> --}}
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('backend/assets/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('backend/assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('backend/assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('backend/assets/js/template.js') }}"></script>
  <script src="{{ asset('backend/assets/js/settings.js') }}"></script>
  <script src="{{ asset('backend/assets/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('backend/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
  <script src="{{ asset('backend/assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('backend/assets/js/proBanner.js') }}"></script>
  
  <!-- <script src="../../assets/js/Chart.roundedBarCharts.js"></script> -->
  <!-- End custom js for this page-->
</body>

</html>