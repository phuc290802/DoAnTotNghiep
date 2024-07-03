
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách Sản phẩm</h3>
                    <a href="{{ URL::to('/admin/adminbook/create') }}" style="color: #007bff; text-decoration: none; font-weight: bold;">Thêm sản phẩm</a>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã Sách</th>
                                <th>Ảnh</th>
                                <th style="width: 300px">Tên Sách</th>
                                <th>Giá Nhập</th>
                                <th>Giá Bán</th>
                                <th>Trọng lượng</th>
                                <th>Số lượng</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->MaSach }}</td>
                                <td><img src="{{ asset('frontend/Images1/'.$product->AnhDaiDien)}}" alt=""></td>
                                <td style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $product->TenSach }}</td>
                                <td>{{ $product->GiaNhap }}</td>
                                <td>{{ $product->GiaBan }}</td>
                                <td>{{ $product->TrongLuong }}</td>
                                <td>{{ $product->SoLuong }}</td>
                                <td>
                                    @if (session('UserName')!='1111111111')
                                    <a href="{{ route('adminbook.edit', ['id' => $product->MaSach]) }}" class="btn btn-primary btn-sm">Sửa</a>
                                    <form action="{{ route('adminbook.destroy', ['id' => $product->MaSach]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</button>
                                    </form> 
                                    @else
                                    <form action="{{ route('bossbook.destroy', ['id' => $product->MaSach]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</button>
                                    </form> 
                                    @endif
                                 
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
                @if ($products->currentPage() > 1)
                    <a href="{{ $products->previousPageUrl() }}">&laquo;</a>
                @endif
                @for ($i = 1; $i <= $products->lastPage(); $i++)
                    <a class="{{ $i == $products->currentPage() ? 'active' : '' }}" href="{{ $products->url($i) }}">{{ $i }}</a>
                @endfor
                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}">&raquo;</a>
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
