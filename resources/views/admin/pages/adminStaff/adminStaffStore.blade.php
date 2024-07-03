<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Thông tin cá nhân</h3>
                </div>
                <div class="card-body">
                    <div class="profile">
                        <div class="profile-picture">
                            <img src="{{ asset('frontend/Images1/'.$staff->AnhDaiDien) }}" alt="Profile Image" class="img-thumbnail" style="width: 150px; height: 150px;">
                        </div>
                        <div class="profile-details">
                            <div class="form-group">
                                <label for="MaNV">Mã Nhân viên</label>
                                <p class="form-control-static">{{ $staff->MaNV }}</p>
                            </div>
                            <div class="form-group">
                                <label for="TenNV">Tên Nhân viên</label>
                                <p class="form-control-static">{{ $staff->TenNV }}</p>
                            </div>
                            <div class="form-group">
                                <label for="GioiTinh">Giới tính</label>
                                <p class="form-control-static">{{ $staff->GioiTinh }}</p>
                            </div>
                            <div class="form-group">
                                <label for="DiaChi">Địa chỉ</label>
                                <p class="form-control-static">{{ $staff->DiaChi }}</p>
                            </div>
                            <div class="form-group">
                                <label for="NgaySinh">Ngày sinh</label>
                                <p class="form-control-static">{{ $staff->NgaySinh }}</p>
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <p class="form-control-static">{{ str_repeat('*', strlen($staff->password)) }}</p>
                            </div>
                            <div class="form-group">
                                <a href="{{ route('adminstaff.edit', ['id' => $staff->MaNV]) }}" class="btn btn-primary">Sửa</a>
                                {{-- <form action="{{ route('adminstaff.destroy', ['id' => $staff->MaNV]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên này không?')">Xóa</button>
                                </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card-body .form-group {
        margin-bottom: 1.5rem;
    }

    .card-body .form-group label {
        font-weight: bold;
    }

    .profile {
        display: flex;
    }

    .profile-picture {
        margin-right: 100px;
    }

    .img-thumbnail {
        border-radius: 50%;
    }

    .btn {
        margin-right: 10px;
    }
</style>
