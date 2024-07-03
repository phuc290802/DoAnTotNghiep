
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách thể loại</h3>
                    <a href="{{ URL::to('/admin/admincategory/create') }}" style="color: #007bff; text-decoration: none; font-weight: bold;">Thêm sản phẩm</a>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã Thể loại</th>
                                <th>Tên thể loại</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorys as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->MaTL }}</td>
                                <td>{{ $category->TenTL }}</td>
                                <td>
                                    <a href="{{ route('admincategory.edit', ['id' => $category->MaTL]) }}" class="btn btn-primary btn-sm">Sửa</a>
                                    <form action="{{ route('admincategory.destroy', ['id' => $category->MaTL]) }}" method="POST">
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
                @if ($categorys->currentPage() > 1)
                    <a href="{{ $categorys->previousPageUrl() }}">&laquo;</a>
                @endif
                @for ($i = 1; $i <= $categorys->lastPage(); $i++)
                    <a class="{{ $i == $categorys->currentPage() ? 'active' : '' }}" href="{{ $categorys->url($i) }}">{{ $i }}</a>
                @endfor
                @if ($categorys->hasMorePages())
                    <a href="{{ $categorys->nextPageUrl() }}">&raquo;</a>
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
