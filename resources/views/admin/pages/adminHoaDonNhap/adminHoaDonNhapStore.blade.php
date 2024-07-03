
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách Hóa đơn nhập</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã hóa đơn</th>
                                <th>Mã Nhân Viên</th>
                                <th>Mã nhà xuất bản</th>
                                <th>Ngày nhập</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hoadonnhaps as $index => $hoadonnhap)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $hoadonnhap->SoHDN }}</td>
                                <td>{{ $hoadonnhap->MaNV }}</td>
                                <td>{{ $hoadonnhap->MaNXB }}</td>
                                <td>{{ $hoadonnhap->NgayNhap }}</td>
                                <td>
                                    <a href="{{ route('adminhdn.edit', ['id' => $hoadonnhap->SoHDN]) }}" class="btn btn-primary btn-sm">Sửa</a>
                                    <form action="{{ route('adminhdn.destroy', ['id' => $hoadonnhap->SoHDN]) }}" method="POST">
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
        </div>
        <div class="col-md-12">
            <div class="pagination">
                @if ($hoadonnhaps->currentPage() > 1)
                    <a href="{{ $hoadonnhaps->previousPageUrl() }}">&laquo;</a>
                @endif
                @for ($i = 1; $i <= $hoadonnhaps->lastPage(); $i++)
                    <a class="{{ $i == $hoadonnhaps->currentPage() ? 'active' : '' }}" href="{{ $hoadonnhaps->url($i) }}">{{ $i }}</a>
                @endfor
                @if ($hoadonnhaps->hasMorePages())
                    <a href="{{ $hoadonnhaps->nextPageUrl() }}">&raquo;</a>
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
