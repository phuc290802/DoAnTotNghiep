
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách NXB</h3>
                    <a href="{{ URL::to('/admin/adminnxb/create') }}" style="color: #007bff; text-decoration: none; font-weight: bold;">Thêm NXB</a>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã NXB</th>
                                <th>Tên NXB</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nxbs as $index => $nxb)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $nxb->MaNXB }}</td>
                                <td>{{ $nxb->TenNXB }}</td>
                                <td>
                                    <a href="{{ route('adminnxb.edit', ['id' => $nxb->MaNXB]) }}" class="btn btn-primary btn-sm">Sửa</a>
                                    <form action="{{ route('adminnxb.destroy', ['id' => $nxb->MaNXB]) }}" method="POST">
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
                @if ($nxbs->currentPage() > 1)
                    <a href="{{ $nxbs->previousPageUrl() }}">&laquo;</a>
                @endif
                @for ($i = 1; $i <= $nxbs->lastPage(); $i++)
                    <a class="{{ $i == $nxbs->currentPage() ? 'active' : '' }}" href="{{ $nxbs->url($i) }}">{{ $i }}</a>
                @endfor
                @if ($nxbs->hasMorePages())
                    <a href="{{ $nxbs->nextPageUrl() }}">&raquo;</a>
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
