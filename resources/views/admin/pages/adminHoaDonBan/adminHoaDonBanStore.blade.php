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
        .toggle-detail,.toggle-detail2{
            display: block;
            text-decoration: none;
            font-weight: bold;
            color: #007bff;
        }
            .listViewDetail ,.listViewDetail2 {
                display: none;
                border: 1px solid #ddd;
                padding: 0px;
                margin:0px;
                width: 300px;
            }
            .listViewDetail2 p{
                display: block;
                margin: 0px;
            }
            .miniview-book {
                display: flex;
            }
            .miniview-book__img{
                width: 50px;
                height: 50px;
            }
            .view-book-info p{
                display: block;
                margin: 0px
            }
            .order-list {
        list-style-type: none;
        padding: 0;
    }

    .order-list li {
        border: 1px solid #ddd;
        margin-bottom: 10px;
        padding: 10px;
    }

    /* Định dạng cho các badge */
    .badge {
        font-size: 12px;
        padding: 5px 10px;
    }

    /* Định dạng màu sắc của badge cho từng trạng thái */
    .badge.pending { background-color: #f8d7da; color: #721c24; }
    .badge.shipping { background-color: #fff3cd; color: #856404; }
    .badge.delivered { background-color: #d4edda; color: #155724; }

</style>
<div class="row px-xl-5">
    <div class="col">
        <div class="nav nav-tabs justify-content-center border-secondary mb-4">
            <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Đang chờ duyệt</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Đang vận chuyển</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Vận chuyển thành công </a>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab-pane-1">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mã hóa đơn</th>
                                <th>Mã Nhân Viên</th>
                                <th>Mã khách hàng</th>
                                <th>Ngày bán</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hoadonbans1 as $index => $hoadonban)
                            <tr>
                                <td style="width: 350px">
                                    {{ $hoadonban->SoHDB }}
                                    <br><a href="#" class="toggle-detail" data-id="{{ $hoadonban->SoHDB }}">Xem chi tiết</a>
                                    <div class="listViewDetail" id="detail-{{ $hoadonban->SoHDB }}">
                                        <ul>
                                            @foreach ($chitietHDBs->where('SoHDB', $hoadonban->SoHDB) as $chitietHDB)

                                                <li style=" display: flex; height: 55px;">
                                                    <div class="miniview-body">
                                                        <div class="miniview-book">
                                                            <div class="miniview-book__img">
                                                                <img src="{{ asset('frontend/Images1/'.$chitietHDB->AnhDaiDien) }}" alt="" style=" height: 100%; width: 100%;">
                                                            </div>
                                                            <div class="miniview-book__body">
                                                                <div class="view-book-info">
                                                                    <p style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $chitietHDB->TenSach }}</p>
                                                                    <p>Số lượng :{{ $chitietHDB->SoLuongBan}} Giá tiền:{{ $chitietHDB->GiaBan}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $hoadonban->MaNV }}</td>
                                <td>
                                    {{ $hoadonban->MaKH }}
                                    <br><a href="#" class="toggle-detail2" data-id="{{ $hoadonban->MaKH }}-{{ $hoadonban->SoHDB }}">Xem chi tiết</a>
                                    <div class="listViewDetail2" id="detail-{{ $hoadonban->MaKH }}-{{ $hoadonban->SoHDB }}">
                                        <ul style="padding: 0px;margin: 0px">
                                            @foreach ($customors->where('MaKH', $hoadonban->MaKH) as $customor)

                                                <li style="display: flex; flex-direction: column;">
                                                    <p><strong>Tên :</strong> <span>{{ $customor->TenKH }}</span></p>

                                                    <p><strong>Địa chỉ :</strong> <span>{{ $customor->DiaChi }}</span></p>
                                                    <p><strong>Điện thoại :</strong> <span>{{ $customor->DienThoai }}</span></p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $hoadonban->NgayBan }}</td>
                                @php
                                $total = 0;
                            @endphp
                                @foreach ($chitietHDBs->where('SoHDB', $hoadonban->SoHDB) as $chitietHDB)
                                    @php
                                        $total += $chitietHDB->GiaBan * $chitietHDB->SoLuongBan;
                                    @endphp
                            @endforeach
                                <td>{{ $total    }}</td>
                            
                                    <td>
                                        @php
                                        $trangthai = '';
                                        if ($hoadonban->TrangThai == 1) {
                                            $trangthai = '<button class="badge badge-danger update-status" data-id="'.$hoadonban->SoHDB.'" data-status="2">Đang chờ duyệt</button>';
                                        } elseif ($hoadonban->TrangThai == 2) {
                                            $trangthai = '<button class="badge badge-warning update-status" data-id="'.$hoadonban->SoHDB.'" data-status="3">Đang vận chuyển</button>';
                                        } elseif ($hoadonban->TrangThai == 3) {
                                            $trangthai = '<label class="badge badge-success">Đã giao hàng</label>';
                                        }
                                        @endphp
                                        {!! $trangthai !!}
                                    </td>
                            
                                <td>
                                    <form action="{{ route('adminhdb.destroy', ['id' => $hoadonban->SoHDB]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</button>
                                    </form> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tbody>
                            @foreach ($hoadonbanks1 as $index => $hoadonbank)
                            <tr>
                                <td style="width: 350px">
                                    {{ $hoadonbank->SoHDBK }}
                                    <br><a href="#" class="toggle-detail" data-id="{{ $hoadonbank->SoHDBK }}">Xem chi tiết</a>
                                    <div class="listViewDetail" id="detail-{{ $hoadonbank->SoHDBK }}">
                                        <ul>
                                            @foreach ($chitietHDBKs->where('SoHDBK', $hoadonbank->SoHDBK) as $chitietHDBK)
                                                @foreach ($books->where('MaSach', $chitietHDBK->MaSach) as $book)
                                                <li style=" display: flex; height: 55px;">
                                                    <div class="miniview-body">
                                                        <div class="miniview-book">
                                                            <div class="miniview-book__img">
                                                                <img src="{{ asset('frontend/Images1/'.$book->AnhDaiDien) }}" alt="" style=" height: 100%; width: 100%;">
                                                            </div>
                                                            <div class="miniview-book__body">
                                                                <div class="view-book-info">
                                                                    <p style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $book->TenSach }}</p>
                                                                    <p>Số lượng :{{ $chitietHDBK->SoLuongBan}} Giá tiền:{{ $book->GiaBan}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $hoadonbank->MaNV }}</td>
                                <td>
                                    Khách hàng
                                    <br><a href="#" class="toggle-detail2" data-id="{{ 1 }}-{{ $hoadonbank->SoHDBK }}">Xem chi tiết</a>
                                    <div class="listViewDetail2" id="detail-{{ 1 }}-{{ $hoadonbank->SoHDBK }}">
                                        <ul style="padding: 0px;margin: 0px">


                                                <li style="display: flex; flex-direction: column;">
                                                    <p><strong>Tên :</strong> <span>{{ $hoadonbank->TenKH }}</span></p>

                                                    <p><strong>Địa chỉ :</strong> <span>{{ $hoadonbank->DiaChi }}</span></p>
                                                    <p><strong>Điện thoại :</strong> <span>{{ $hoadonbank->DienThoai }}</span></p>
                                                </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $hoadonbank->NgayBan }}</td>
                                @php
                                $total = 0;
                            @endphp
                                @foreach ($chitietHDBKs->where('SoHDBK', $hoadonbank->SoHDBK) as $chitietHDBK)
                                    @php
                                        $total += $chitietHDBK->GiaBan * $chitietHDBK->SoLuongBan;
                                    @endphp
                            @endforeach
                                <td>{{ $total    }}</td>
                            
                                    <td>
                                        @php
                                        $trangthai = '';
                                        if ($hoadonbank->TrangThai == 1) {
                                            $trangthai = '<button class="badge badge-danger update-statusk" data-id="'.$hoadonbank->SoHDBK.'" data-status="2">Đang chờ duyệt</button>';
                                        } elseif ($hoadonbank->TrangThai == 2) {
                                            $trangthai = '<button class="badge badge-warning update-statusk" data-id="'.$hoadonbank->SoHDBK.'" data-status="3">Đang vận chuyển</button>';
                                        } elseif ($hoadonbank->TrangThai == 3) {
                                            $trangthai = '<label class="badge badge-success">Đã giao hàng</label>';
                                        }
                                        @endphp
                                        {!! $trangthai !!}
                                    </td>
                            
                                <td>
                                    <form action="{{ route('adminhdbk.destroy', ['id' => $hoadonbank->SoHDBK]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</button>
                                    </form> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="tab-pane fade" id="tab-pane-2">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mã hóa đơn</th>
                                <th>Mã Nhân Viên</th>
                                <th>Mã khách hàng</th>
                                <th>Ngày bán</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hoadonbans2 as $index => $hoadonban)
                            <tr>
                                <td style="width: 350px">
                                    {{ $hoadonban->SoHDB }}
                                    <br><a href="#" class="toggle-detail" data-id="{{ $hoadonban->SoHDB }}">Xem chi tiết</a>
                                    <div class="listViewDetail" id="detail-{{ $hoadonban->SoHDB }}">
                                        <ul>
                                            @foreach ($chitietHDBs->where('SoHDB', $hoadonban->SoHDB) as $chitietHDB)

                                                <li style=" display: flex; height: 55px;">
                                                    <div class="miniview-body">
                                                        <div class="miniview-book">
                                                            <div class="miniview-book__img">
                                                                <img src="{{ asset('frontend/Images1/'.$chitietHDB->AnhDaiDien) }}" alt="" style=" height: 100%; width: 100%;">
                                                            </div>
                                                            <div class="miniview-book__body">
                                                                <div class="view-book-info">
                                                                    <p style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $chitietHDB->TenSach }}</p>
                                                                    <p>Số lượng :{{ $chitietHDB->SoLuongBan}} Giá tiền:{{ $chitietHDB->GiaBan}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $hoadonban->MaNV }}</td>
                                <td>
                                    {{ $hoadonban->MaKH }}
                                    <br><a href="#" class="toggle-detail2" data-id="{{ $hoadonban->MaKH }}-{{ $hoadonban->SoHDB }}">Xem chi tiết</a>
                                    <div class="listViewDetail2" id="detail-{{ $hoadonban->MaKH }}-{{ $hoadonban->SoHDB }}">
                                        <ul style="padding: 0px;margin: 0px">
                                            @foreach ($customors->where('MaKH', $hoadonban->MaKH) as $customor)

                                                <li style="display: flex; flex-direction: column;">
                                                    <p><strong>Tên :</strong> <span>{{ $customor->TenKH }}</span></p>

                                                    <p><strong>Địa chỉ :</strong> <span>{{ $customor->DiaChi }}</span></p>
                                                    <p><strong>Điện thoại :</strong> <span>{{ $customor->DienThoai }}</span></p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $hoadonban->NgayBan }}</td>
                                @php
                                $total = 0;
                            @endphp
                                @foreach ($chitietHDBs->where('SoHDB', $hoadonban->SoHDB) as $chitietHDB)

                                    @php
                                        $total += $chitietHDB->GiaBan * $chitietHDB->SoLuongBan;
                                    @endphp

                            @endforeach
                                <td>{{ $total    }}</td>
                            
                                        <td>
                                            @php
                                            $trangthai = '';
                                            if ($hoadonban->TrangThai == 1) {
                                                $trangthai = '<button class="badge badge-danger update-status" data-id="'.$hoadonban->SoHDB.'" data-status="2">Đang chờ duyệt</button>';
                                            } elseif ($hoadonban->TrangThai == 2) {
                                                $trangthai = '<button class="badge badge-warning update-status" data-id="'.$hoadonban->SoHDB.'" data-status="3">Đang vận chuyển</button>';
                                            } elseif ($hoadonban->TrangThai == 3) {
                                                $trangthai = '<label class="badge badge-success">Đã giao hàng</label>';
                                            }
                                            @endphp
                                            {!! $trangthai !!}
                                        </td>

                            
                                <td>
                                    <form action="{{ route('adminhdb.destroy', ['id' => $hoadonban->SoHDB]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</button>
                                    </form> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tbody>
                            @foreach ($hoadonbanks2 as $index => $hoadonbank)
                            <tr>
                                <td style="width: 350px">
                                    {{ $hoadonbank->SoHDBK }}
                                    <br><a href="#" class="toggle-detail" data-id="{{ $hoadonbank->SoHDBK }}">Xem chi tiết</a>
                                    <div class="listViewDetail" id="detail-{{ $hoadonbank->SoHDBK }}">
                                        <ul>
                                            @foreach ($chitietHDBKs->where('SoHDBK', $hoadonbank->SoHDBK) as $chitietHDBK)
                                                @foreach ($books->where('MaSach', $chitietHDBK->MaSach) as $book)
                                                <li style=" display: flex; height: 55px;">
                                                    <div class="miniview-body">
                                                        <div class="miniview-book">
                                                            <div class="miniview-book__img">
                                                                <img src="{{ asset('frontend/Images1/'.$book->AnhDaiDien) }}" alt="" style=" height: 100%; width: 100%;">
                                                            </div>
                                                            <div class="miniview-book__body">
                                                                <div class="view-book-info">
                                                                    <p style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $book->TenSach }}</p>
                                                                    <p>Số lượng :{{ $chitietHDBK->SoLuongBan}} Giá tiền:{{ $book->GiaBan}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $hoadonbank->MaNV }}</td>
                                <td>
                                    Khách hàng
                                    <br><a href="#" class="toggle-detail2" data-id="{{ 1 }}-{{ $hoadonbank->SoHDBK }}">Xem chi tiết</a>
                                    <div class="listViewDetail2" id="detail-{{ 1 }}-{{ $hoadonbank->SoHDBK }}">
                                        <ul style="padding: 0px;margin: 0px">


                                                <li style="display: flex; flex-direction: column;">
                                                    <p><strong>Tên :</strong> <span>{{ $hoadonbank->TenKH }}</span></p>

                                                    <p><strong>Địa chỉ :</strong> <span>{{ $hoadonbank->DiaChi }}</span></p>
                                                    <p><strong>Điện thoại :</strong> <span>{{ $hoadonbank->DienThoai }}</span></p>
                                                </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $hoadonbank->NgayBan }}</td>
                                @php
                                $total = 0;
                            @endphp
                                @foreach ($chitietHDBKs->where('SoHDBK', $hoadonbank->SoHDBK) as $chitietHDBK)
                                @foreach ($books->where('MaSach', $chitietHDBK->MaSach) as $book)
                                    @php
                                        $total += $book->GiaBan * $chitietHDBK->SoLuongBan;
                                    @endphp
                                @endforeach
                            @endforeach
                                <td>{{ $total    }}</td>
                            
                                <td>
                                    @php
                                    $trangthai = '';
                                    if ($hoadonbank->TrangThai == 1) {
                                        $trangthai = '<button class="badge badge-danger update-statusk" data-id="'.$hoadonbank->SoHDBK.'" data-status="2">Đang chờ duyệt</button>';
                                    } elseif ($hoadonbank->TrangThai == 2) {
                                        $trangthai = '<button class="badge badge-warning update-statusk" data-id="'.$hoadonbank->SoHDBK.'" data-status="3">Đang vận chuyển</button>';
                                    } elseif ($hoadonbank->TrangThai == 3) {
                                        $trangthai = '<label class="badge badge-success">Đã giao hàng</label>';
                                    }
                                    @endphp
                                    {!! $trangthai !!}
                                </td>
                            
                                <td>
                                    <form action="{{ route('adminhdbk.destroy', ['id' => $hoadonbank->SoHDBK]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</button>
                                    </form> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-pane-3">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mã hóa đơn</th>
                                <th>Mã Nhân Viên</th>
                                <th>Mã khách hàng</th>
                                <th>Ngày bán</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hoadonbans3 as $index => $hoadonban)
                            <tr>
                                <td style="width: 350px">
                                    {{ $hoadonban->SoHDB }}
                                    <br><a href="#" class="toggle-detail" data-id="{{ $hoadonban->SoHDB }}">Xem chi tiết</a>
                                    <div class="listViewDetail" id="detail-{{ $hoadonban->SoHDB }}">
                                        <ul>
                                            @foreach ($chitietHDBs->where('SoHDB', $hoadonban->SoHDB) as $chitietHDB)

                                                <li style=" display: flex; height: 55px;">
                                                    <div class="miniview-body">
                                                        <div class="miniview-book">
                                                            <div class="miniview-book__img">
                                                                <img src="{{ asset('frontend/Images1/'.$chitietHDB->AnhDaiDien) }}" alt="" style=" height: 100%; width: 100%;">
                                                            </div>
                                                            <div class="miniview-book__body">
                                                                <div class="view-book-info">
                                                                    <p style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $chitietHDB->TenSach }}</p>
                                                                    <p>Số lượng :{{ $chitietHDB->SoLuongBan}} Giá tiền:{{ $chitietHDB->GiaBan}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $hoadonban->MaNV }}</td>
                                <td>
                                    {{ $hoadonban->MaKH }}
                                    <br><a href="#" class="toggle-detail2" data-id="{{ $hoadonban->MaKH }}-{{ $hoadonban->SoHDB }}">Xem chi tiết</a>
                                    <div class="listViewDetail2" id="detail-{{ $hoadonban->MaKH }}-{{ $hoadonban->SoHDB }}">
                                        <ul style="padding: 0px;margin: 0px">
                                            @foreach ($customors->where('MaKH', $hoadonban->MaKH) as $customor)

                                                <li style="display: flex; flex-direction: column;">
                                                    <p><strong>Tên :</strong> <span>{{ $customor->TenKH }}</span></p>

                                                    <p><strong>Địa chỉ :</strong> <span>{{ $customor->DiaChi }}</span></p>
                                                    <p><strong>Điện thoại :</strong> <span>{{ $customor->DienThoai }}</span></p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $hoadonban->NgayBan }}</td>
                                @php
                                $total = 0;
                            @endphp
                                @foreach ($chitietHDBs->where('SoHDB', $hoadonban->SoHDB) as $chitietHDB)

                                    @php
                                        $total += $chitietHDB->GiaBan * $chitietHDB->SoLuongBan;
                                    @endphp

                            @endforeach
                                <td>{{ $total    }}</td>
                                <td>
                                    @php
                                    $trangthai = '';
                                    if ($hoadonban->TrangThai == 1) {
                                        $trangthai = '<button class="badge badge-danger update-status" data-id="'.$hoadonban->SoHDB.'" data-status="2">Đang chờ duyệt</button>';
                                    } elseif ($hoadonban->TrangThai == 2) {
                                        $trangthai = '<button class="badge badge-warning update-status" data-id="'.$hoadonban->SoHDB.'" data-status="3">Đang vận chuyển</button>';
                                    } elseif ($hoadonban->TrangThai == 3) {
                                        $trangthai = '<label class="badge badge-success">Đã giao hàng</label>';
                                    }
                                    @endphp
                                    {!! $trangthai !!}
                                </td>

                            

                            </tr>
                            @endforeach
                        </tbody>
                        <tbody>
                            @foreach ($hoadonbanks3 as $index => $hoadonbank)
                            <tr>
                                <td style="width: 350px">
                                    {{ $hoadonbank->SoHDBK }}
                                    <br><a href="#" class="toggle-detail" data-id="{{ $hoadonbank->SoHDBK }}">Xem chi tiết</a>
                                    <div class="listViewDetail" id="detail-{{ $hoadonbank->SoHDBK }}">
                                        <ul>
                                            @foreach ($chitietHDBKs->where('SoHDBK', $hoadonbank->SoHDBK) as $chitietHDBK)
                                                @foreach ($books->where('MaSach', $chitietHDBK->MaSach) as $book)
                                                <li style=" display: flex; height: 55px;">
                                                    <div class="miniview-body">
                                                        <div class="miniview-book">
                                                            <div class="miniview-book__img">
                                                                <img src="{{ asset('frontend/Images1/'.$book->AnhDaiDien) }}" alt="" style=" height: 100%; width: 100%;">
                                                            </div>
                                                            <div class="miniview-book__body">
                                                                <div class="view-book-info">
                                                                    <p style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $book->TenSach }}</p>
                                                                    <p>Số lượng :{{ $chitietHDBK->SoLuongBan}} Giá tiền:{{ $book->GiaBan}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $hoadonbank->MaNV }}</td>
                                <td>
                                    Khách hàng
                                    <br><a href="#" class="toggle-detail2" data-id="{{ 1 }}-{{ $hoadonbank->SoHDBK }}">Xem chi tiết</a>
                                    <div class="listViewDetail2" id="detail-{{ 1 }}-{{ $hoadonbank->SoHDBK }}">
                                        <ul style="padding: 0px;margin: 0px">


                                                <li style="display: flex; flex-direction: column;">
                                                    <p><strong>Tên :</strong> <span>{{ $hoadonbank->TenKH }}</span></p>

                                                    <p><strong>Địa chỉ :</strong> <span>{{ $hoadonbank->DiaChi }}</span></p>
                                                    <p><strong>Điện thoại :</strong> <span>{{ $hoadonbank->DienThoai }}</span></p>
                                                </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $hoadonbank->NgayBan }}</td>
                                @php
                                $total = 0;
                            @endphp
                                @foreach ($chitietHDBKs->where('SoHDBK', $hoadonbank->SoHDBK) as $chitietHDBK)
                                    @php
                                        $total += $chitietHDBK->GiaBan * $chitietHDBK->SoLuongBan;
                                    @endphp
                            @endforeach
                                <td>{{ $total    }}</td>
                            
                                <td>
                                    @php
                                    $trangthai = '';
                                    if ($hoadonbank->TrangThai == 1) {
                                        $trangthai = '<button class="badge badge-danger update-statusk" data-id="'.$hoadonbank->SoHDBK.'" data-status="2">Đang chờ duyệt</button>';
                                    } elseif ($hoadonbank->TrangThai == 2) {
                                        $trangthai = '<button class="badge badge-warning update-statusk" data-id="'.$hoadonbank->SoHDBK.'" data-status="3">Đang vận chuyển</button>';
                                    } elseif ($hoadonbank->TrangThai == 3) {
                                        $trangthai = '<label class="badge badge-success">Đã giao hàng</label>';
                                    }
                                    @endphp
                                    {!! $trangthai !!}
                                </td>
                            
                                {{-- <td>
                                    <form action="{{ route('adminhdb.destroy', ['id' => $hoadonbank->SoHDBK]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</button>
                                    </form> 
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

document.addEventListener('DOMContentLoaded', function() {
    // Toggle chi tiết hóa đơn
    const toggleLinks = document.querySelectorAll('.toggle-detail');
    toggleLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const detailId = this.getAttribute('data-id');
            const detailDiv = document.getElementById('detail-' + detailId);
            if (detailDiv) {
                detailDiv.style.display = detailDiv.style.display === 'none' || detailDiv.style.display === '' ? 'block' : 'none';
            }
        });
    });

    // Toggle chi tiết khách hàng
    const toggleLinks2 = document.querySelectorAll('.toggle-detail2');
    toggleLinks2.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const detailId = this.getAttribute('data-id');
            const detailDiv = document.getElementById('detail-' + detailId);
            if (detailDiv) {
                detailDiv.style.display = detailDiv.style.display === 'none' || detailDiv.style.display === '' ? 'block' : 'none';
            }
        });
    });

    // Cập nhật trạng thái
    const updateStatusButtons = document.querySelectorAll('.update-status');
        updateStatusButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const sohdb = this.getAttribute('data-id'); // Use `sohdb` instead of `id`
                const status = this.getAttribute('data-status');
                $.ajax({
                    url: '/admin/adminHDB/' + sohdb + '/' + status + '/update-status',
                    method: 'POST', // Specify the method as POST
                    data: {
                        _token: $('input[name="_token"]').val(),
                    },
                    success: function(response) {
                        alert('Cập nhật thành công');
                        location.reload(); // Reload the page to see the new review
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                    }
        });
            
        });
    });
                    const updateStatuskButtons = document.querySelectorAll('.update-statusk');
                            updateStatuskButtons.forEach(button => {
                                button.addEventListener('click', function(event) {
                                    event.preventDefault();
                                    const sohdbk = this.getAttribute('data-id'); // Use `sohdb` instead of `id`
                                    const statusk = this.getAttribute('data-status');
                                    $.ajax({
                                        url: '/admin/adminHDB/hoadonk/' + sohdbk + '/' + statusk + '/update-statusk',
                                        method: 'POST', // Specify the method as POST
                                        data: {
                                            _token: $('input[name="_token"]').val(),
                                        },
                                        success: function(response) {
                                            alert('Cập nhật thành công');
                                            location.reload(); // Reload the page to see the new review
                                        },
                                        error: function(xhr, status, error) {
                                            // Handle errors
                                        }
                            });
                            
                        });
                    });


});

</script>


</script>


