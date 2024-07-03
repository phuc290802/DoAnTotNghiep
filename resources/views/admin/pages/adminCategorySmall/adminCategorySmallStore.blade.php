
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách thể loại con</h3>
                    <a href="{{ URL::to('/admin/admincategorysmall/create') }}" style="color: #007bff; text-decoration: none; font-weight: bold;">Thêm sản phẩm</a>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên Thể loại</th>
                                <th>Mã Thể loại con</th>
                                <th>Tên thể loại</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorysmalls as $index => $categorysmall)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $categorysmall->MaTL }}</td>
                                <td>{{ $categorysmall->MaTLCon }}</td>
                                <td>{{ $categorysmall->TenTL }}</td>
                                <td>
                                    <a href="{{ route('admincategorysmall.edit', ['id' => $categorysmall->MaTLCon]) }}" class="btn btn-primary btn-sm">Sửa</a>
                                    <form action="{{ route('admincategorysmall.destroy', ['id' => $categorysmall->MaTLCon]) }}" method="POST">
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
                @if ($categorysmalls->currentPage() > 1)
                    <a href="{{ $categorysmalls->previousPageUrl() }}">&laquo;</a>
                @endif
                @for ($i = 1; $i <= $categorysmalls->lastPage(); $i++)
                    <a class="{{ $i == $categorysmalls->currentPage() ? 'active' : '' }}" href="{{ $categorysmalls->url($i) }}">{{ $i }}</a>
                @endfor
                @if ($categorysmalls->hasMorePages())
                    <a href="{{ $categorysmalls->nextPageUrl() }}">&raquo;</a>
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
