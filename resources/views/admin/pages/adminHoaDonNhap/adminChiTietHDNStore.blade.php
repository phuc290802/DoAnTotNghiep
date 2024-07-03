
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách Hóa đơn bán</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã hóa đơn</th>
                                <th>Mã Sách</th>
                                <th>Số lượng Nhập</th>
                                <th>Khuyến mãi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chitietHDNs as $index => $chitietHDN)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $chitietHDN->SoHDN }}</td>
                                <td>{{ $chitietHDN->MaSach }}</td>
                                <td>{{ $chitietHDN->SoLuongNhap }}</td>
                                <td>{{ $chitietHDN->KhuyenMai }}</td>
                                <td>
                                    <a href="{{ route('adminchitietHDN.edit', ['id' => $chitietHDN->SoHDN]) }}" class="btn btn-primary btn-sm">Sửa</a>
                                    <form action="{{ route('adminchitietHDN.destroy', ['id' => $chitietHDN->SoHDN]) }}" method="POST">
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
                @if ($chitietHDNs->currentPage() > 1)
                    <a href="{{ $chitietHDNs->previousPageUrl() }}">&laquo;</a>
                @endif
                @for ($i = 1; $i <= $chitietHDNs->lastPage(); $i++)
                    <a class="{{ $i == $chitietHDNs->currentPage() ? 'active' : '' }}" href="{{ $chitietHDNs->url($i) }}">{{ $i }}</a>
                @endfor
                @if ($chitietHDNs->hasMorePages())
                    <a href="{{ $chitietHDNs->nextPageUrl() }}">&raquo;</a>
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
