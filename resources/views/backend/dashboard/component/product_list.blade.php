@if(isset($products) && count($products) > 0)
<a href="#" id="filterProducts">Xem thêm {{ $productsCount }} sản phẩm</a>
<ul style="padding: 0px">
    @foreach ($products as $product)
    <li style="list-style: none;" class="detailProduct" data-value="{{ $product->MaSach }}">
        <div class="card">
            <img src="{{ asset('frontend/Images1/'.$product->AnhDaiDien) }}" class="card-img-top" alt="{{ $product->TenSach }}"style="max-width: 100px; max-height: 100px;">
            <div class="card-body">
                <h5 class="card-title">{{ $product->TenSach }}</h5>
                <p class="card-text">Giá: {{ $product->GiaBan }} đ</p>
                <p class="card-text">Mã sách: {{ $product->MaSach }}</p>
            </div>
        </div>
    </li>
    
    @endforeach
</ul>
@else   
<div id="article"><p class="article_null">Không có sản phẩm nào phù hợp với từ khóa tìm kiếm</p></div>
@endif 

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#filterProducts').click(function(event) {
            event.preventDefault();
            var keyword = $('#searchInput').val();
            var url = "{{ route('product.search') }}?keyword=" + encodeURIComponent(keyword);
            window.location.href = url;
        });
        
        $('.detailProduct').click(function(event) {
            window.location.href = "/product/"+$(this).data('value');
        });
    });
</script>
