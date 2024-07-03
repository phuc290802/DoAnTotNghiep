<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('/admin') }}">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">Trang chủ</span>
        </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">Thông tin cá nhân</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/admin/adminstaff') }}">Thông tin cá nhân</a></li>
                </ul>
            </div>
            </li>
        @if (session('UserName')!='1111111111')
            <li class="nav-item nav-category">Quản lí dữ liệu</li>
            <li class="nav-item"> 
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Sách</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/admin/adminbook') }}">Quản lí sách</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/admin/adminbook/create') }}">Thêm sách</a></li>
                </ul>
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                  <i class="menu-icon mdi mdi-layers-outline"></i>
                  <span class="menu-title">Thể loại</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="icons" style="">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/admin/admincategory') }}">Quản lí thể loại</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/admin/admincategory/create') }}">Thêm Thể loại</a></li>
                  </ul>
                </div>
              </li> 
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" data-bs-toggle="collapse" href="#icons1" aria-expanded="false" aria-controls="icons1">
                <i class="menu-icon mdi mdi-layers-outline"></i>
                <span class="menu-title">Thể loại nhỏ</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="icons1" style="">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/admin/admincategorysmall') }}">Quản lí thể loại nhỏ</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/admin/admincategorysmall/create') }}">Thêm Thể loại nhỏ</a></li>
                </ul>
              </div>
            </li> 
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <i class="menu-icon mdi mdi-floor-plan"></i>
                  <span class="menu-title">Nhà xuất bản</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic" style="">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/admin/adminnxb/') }}">Quản lí NXB</a></li>
                  </ul>
                </div>
              </li>
            </li>
              <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                  <i class="menu-icon mdi mdi-card-text-outline"></i>
                  <span class="menu-title">Hóa đơn bán</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="form-elements" style="">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ URL::to('/admin/adminHDB/') }}">Hoá đơn bán</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ URL::to('/admin/adminChiTietHDB/') }}">Chi tiết hóa đơn bán</a></li>
                  </ul>
                </div>
              </li>
            </li>
    
            <li class="nav-item">
              <a class="nav-link collapsed" data-bs-toggle="collapse" href="#form-elements1" aria-expanded="false" aria-controls="form-elements1">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Hóa đơn Nhập</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="form-elements1" style="">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ URL::to('/admin/adminHDN/') }}">Hoá đơn nhập</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ URL::to('/admin/adminChiTietHDN/') }}">Chi tiết hóa đơn nhập</a></li>
                </ul>
              </div>
            </li>
    
            <li class="nav-item">
              <a class="nav-link collapsed" data-bs-toggle="collapse" href="#form-elements3" aria-expanded="false" aria-controls="form-elements3">
                <i class="menu-icon mdi mdi-newspaper"></i>
                <span class="menu-title">Quản lí tin tức</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="form-elements3" style="">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ URL::to('/admin/adminBlog/') }}">Tin tức</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ URL::to('/admin/adminBlog/create') }}">Thêm tin tức</a></li>
                </ul>
              </div>
            </li>
    
            <li class="nav-item">
              <a class="nav-link collapsed" data-bs-toggle="collapse" href="#form-elements2" aria-expanded="false" aria-controls="form-elements2">
                <i class="menu-icon mdi mdi-star-circle"></i>
                <span class="menu-title">Đánh giá khách hàng</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="form-elements2" style="">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ URL::to('/admin/adminVote/') }}">Đánh giá khách hàng</a></li>
                </ul>
              </div>
            </li>
          </li>
        @else
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth1">
              <i class="menu-icon mdi mdi-account-box-outline"></i>
              <span class="menu-title">Quản lí nhân viên</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth1">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/admin/adminstaff/list') }}">Danh sách nhân viên</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/admin/adminstaff/create') }}">Thêm nhân viên</a></li>
              </ul>
          </div>
          </li>
          <li class="nav-item"> 
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Sách</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/admin/adminbook') }}">Quản lí sách</a></li>
                </ul>
            </div>
          </li>
        @endif

    </ul>
</nav>