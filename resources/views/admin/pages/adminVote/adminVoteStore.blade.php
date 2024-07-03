
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách Sản phẩm</h3>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã đánh giá</th>
                                <th>Mã Sách</th>
                                <th>Mã khách hàng</th>
                                <th style="width: 300px">Đánh giá</th>
                                <th>Sao</th>
                                <th>Thời gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($danhgiakhs as $index => $danhgiakh)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $danhgiakh->MaDG }}</td>
                                @php
                                    $book=$books->where('MaSach',$danhgiakh->MaSach)->first();
                                @endphp
                                <td><img src="{{ asset('frontend/Images1/'.$book->AnhDaiDien)}}" alt="" style="width: 100px"></td>
                                <td>{{ $danhgiakh->MaKH }}</td>
                                <td style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $danhgiakh->DanhGia }}</td>
                                <td>{{ $danhgiakh->Vote }}</td>
                                <td>{{ $danhgiakh->ThoiGian }}</td>
                                <td>
                                    <form action="{{ route('adminvote.destroy', ['id' => $danhgiakh->MaDG]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa đánh giá này không?')">Xóa</button>
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
                @if ($danhgiakhs->currentPage() > 1)
                    <a href="{{ $danhgiakhs->previousPageUrl() }}">&laquo;</a>
                @endif
                @for ($i = 1; $i <= $danhgiakhs->lastPage(); $i++)
                    <a class="{{ $i == $danhgiakhs->currentPage() ? 'active' : '' }}" href="{{ $danhgiakhs->url($i) }}">{{ $i }}</a>
                @endfor
                @if ($danhgiakhs->hasMorePages())
                    <a href="{{ $danhgiakhs->nextPageUrl() }}">&raquo;</a>
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
