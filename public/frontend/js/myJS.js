

(function ($) {
var $$ = document.querySelectorAll.bind(document);
var $ = jQuery;

$(document).ready(function() {
    // Add an event listener to the button with class btn-success
    $('.btn-success').click(function() {
        // Redirect to the /cart route when the button is clicked
        window.location.href = "/cart";
    });
    $('.view-checkout').click(function() {
        window.location.href = "/checkout";
    });
});
var cartItems = $$('.cart-item');
var minicartImg = $$('.minicart-item__img');
var minicartInfo = $$('.cart-item-info');
var minicartDelete = $$('.minicart-delete');


minicartImg.forEach(function(img) {
    img.addEventListener('click', () => {
        var id = img.closest('.cart-item').getAttribute('id');
        window.location.href = `/product/${id}`;
    });
});

minicartInfo.forEach(function(info) {
    info.addEventListener('click', () => {
        var id = info.closest('.cart-item').getAttribute('id');
        window.location.href = `/product/${id}`;
    });
});

minicartDelete.forEach(function(info) {
    info.addEventListener('click', () => {
        var id = info.closest('.cart-item').getAttribute('id');
        window.location.href = `/clearCart/${id}`;
    });
});
var modal = document.getElementById('id01');
var modal1 = document.getElementById('id02');


window.addEventListener('click', function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
});





$(document).ready(function() {
    // Select the search input and result elements using jQuery
    var $searchInput = $('#searchInput');
    var $searchResult = $('#searchResult');

    // Add an event listener to the search input to display search results when clicked
    $searchInput.on('click', function(event) {
        event.stopPropagation(); // Prevent the event from bubbling up to parent elements
        searchResult.style.display = 'none'; // Ẩn kết quả tìm kiếm khi nhấp ra ngoài trang
    });

    // Add an event listener to the search result to prevent event bubbling
    $searchResult.on('click', function(event) {
        event.stopPropagation(); // Prevent the event from bubbling up to parent elements
    });
});
window.onload = function() {
    // Lấy tham chiếu tới các phần tử cần ẩn hoặc hiển thị
    var headerCarousel = document.getElementById('header-carousel');
    var container_fluid = document.getElementById('container-fluid-support');

    // Lấy đường dẫn hiện tại
    var currentPathname = window.location.pathname;

    // Sử dụng biểu thức chính quy để kiểm tra xem URL có phải là trang chủ hoặc '/trang-chu' không
    var isHomePage = currentPathname === '/' || currentPathname === '/trang-chu';


    // Đảm bảo các phần tử tồn tại trước khi áp dụng các kiểu hiển thị
    if (container_fluid && headerCarousel) {
        // Nếu URL là trang chủ hoặc '/trang-chu', hiển thị các phần tử
        if (isHomePage) {
            console.log("Showing elements");
            container_fluid.style.setProperty("display", "block", "important");
            headerCarousel.style.setProperty("display", "block", "important");
        } else {
            console.log("Hiding elements");
            container_fluid.style.setProperty("display", "none", "important");
            headerCarousel.style.setProperty("display", "none", "important");
        }
    } else {
        console.log("Không tìm thấy các phần tử");
    }
};



    
    
    $(document).ready(function () {
        // Event listener for search input
        $('#searchInput').on('input', function () {
            var keyword = $(this).val().trim();
            var ul = $('#searchResult');

            if (keyword.length < 3) {
                ul.css('display', 'none');
                return;
            }

            $.ajax({
                url: "/product/autocomplete",
                type: 'GET',
                data: { keyword: keyword },
                success: function (response) {
                    ul.empty();
                    if (response.trim() == "") {
                        var li = $('<li>').text('Không tìm thấy sách');
                        ul.append(li);
                    } else {
                        ul.html(response);
                    }
                    ul.css('display', 'block');
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });
    });


    var customerIDName = '{{ session("CustomorUserName") }}';
    $(document).ready(function() {
        $('.btn-checkout').on('click', function() {
            window.location.href = "/checkout";
            // if (customerIDName === '') {
            //     document.getElementById('id01').style.display='block';
            // } else {
            //     $.ajax({
            //         url: '/cart/checkout',
            //         method: "GET",
            //         success: function(response) {
            //             const notifications = document.querySelector('.notifications');

            //             function createToast(type, icon, title, text) {
            //                 const newToast = document.createElement('div');
            //                 newToast.classList.add('toast', type);
            //                 newToast.innerHTML = `
            //                     <i class="${icon}"></i>
            //                     <div class="content">
            //                         <div class="title">${title}</div>
            //                         <span>${text}</span>
            //                     </div>
            //                     <i class="fa-solid fa-xmark" onclick="this.parentElement.remove()"></i>
            //                 `;
            //                 notifications.appendChild(newToast);
            //                 setTimeout(() => newToast.remove(), 5000); // Remove the toast after 5 seconds
            //             }
        
            //             createToast('success', 'fa-solid fa-circle-check', 'Thành công', 'Đơn hàng đặt thành công');
        
            //             // Wait for 3 seconds before redirecting to /cart
            //             setTimeout(function() {
            //                 window.location.href = "/cart";
            //             }, 2000);
            //         },
            //         error: function(xhr, status, error) {
            //             // Xử lý lỗi nếu có
            //             console.error(xhr.responseText);
            //         }
            //     });
            // } 
        });
    });
    
    

})(jQuery);