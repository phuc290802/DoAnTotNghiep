
@php
    use Illuminate\Support\Str;
@endphp
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách tin tức</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Mã Nhân Viên</th>
                                <th>Ảnh</th>
                                <th>Thời gian</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $index => $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>{{ $blog->MaNV }}</td>
                                <td><img src="{{ asset('frontend/Images1/'.$blog->AnhDaiDien)}}" alt=""></td>
                                <td>{{ $blog->ThoiGian }}</td>
                                <td>{{ Str::limit($blog->TieuDe, 30) }}</td> <!-- Giới hạn tiêu đề tối đa 50 ký tự -->
                                <td>{{ Str::limit($blog->NoiDung, 50) }}</td> <!-- Giới hạn nội dung tối đa 100 ký tự -->
                                <td>
                                    <a href="{{ route('adminblog.edit', ['id' => $blog->id]) }}" class="btn btn-primary btn-sm">Sửa</a>
                                    <form action="{{ route('adminblog.destroy', ['id' => $blog->id]) }}" method="POST">
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
                @if ($blogs->currentPage() > 1)
                    <a href="{{ $blogs->previousPageUrl() }}">&laquo;</a>
                @endif
                @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                    <a class="{{ $i == $blogs->currentPage() ? 'active' : '' }}" href="{{ $blogs->url($i) }}">{{ $i }}</a>
                @endfor
                @if ($blogs->hasMorePages())
                    <a href="{{ $blogs->nextPageUrl() }}">&raquo;</a>
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
