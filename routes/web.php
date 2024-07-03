<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Authentication routes
Route::get('/login', [CustomerController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomerController::class, 'login'])->name('loginDone');
Route::post('/logout', [CustomerController::class, 'logout'])->name('customor.logout');
Route::post('/register', [CustomerController::class, 'register'])->name('register');
Route::post('/logout', [CustomerController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], '/account', [CustomerController::class, 'customerAccount'])->name('customor.account');


// Home page and other routes
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/trang-chu', [HomeController::class, 'show']);
Route::get('/shop-detail', [HomeController::class, 'detail']);
Route::get('/product/search', [HomeController::class, 'search'])->name('product.search');
Route::get('/product/autocomplete', [HomeController::class, 'search_smart']);
Route::get('/aboutus', [HomeController::class, 'aboutus']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/blog/{id}', [HomeController::class, 'showBlog'])->name('blog.show');
Route::get('/category/{id}', [HomeController::class, 'category'])->name('product.category');
Route::get('/categorysmall/{id}', [HomeController::class, 'smallcategory'])->name('product.theloainho');
Route::get('/nhaxuatban/{id}', [HomeController::class, 'nhaxuatban'])->name('product.nhaxuatban');
Route::get('/product/{id}', [HomeController::class, 'productDetail'])->name('product.detail');
Route::post('/product/{id}/review', [HomeController::class, 'review'])->name('product.review');
Route::get('/product/filter/{price1}/{price2}', [HomeController::class, 'filterPrice'])->name('product.filterPrice');

Route::get('/account/update/{MaKH}', [HomeController::class, 'viewAccountUpdate']);
Route::put('/account/update/{MaKH}', [HomeController::class, 'accountUpdate'])->name('account.update');
/////////////// shopdetail
Route::get('/shop', [HomeController::class,'shopdetail'])->name('shopdetail');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart', [CartController::class, 'showcart'])->name('cart.showcart');
Route::match(['get', 'post'], '/addToCart/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::match(['get', 'post'], '/addToCartDetail/{productId}/{quantity}', [CartController::class, 'addCartDetail'])->name('cart.addDetail');
Route::match(['get', 'post'], '/updateCart/{productId}', [CartController::class, 'updateQuantity'])->name('cart.tru');
Route::get('/clearCart/{productId}', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/checkout', [CartController::class, 'viewcheckout'])->name('view.checkout');
Route::get('/orderdetail/{order}', [CartController::class, 'orderdetail'])->name('view.orderdetail');



// //////////////admin book/////////////////
// Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
// Route::get('/admin/adminbook', [AdminController::class, 'adminBook']);
// Route::get('/admin/adminbook/create', [AdminController::class, 'createBook']);
// Route::post('/admin/adminbook', [AdminController::class, 'bookShow'])->name('adminBook.store');
// Route::get('/admin/adminbook/edit/{id}', [AdminController::class, 'editBook'])->name('adminbook.edit');
// Route::put('/admin/adminbook/{id}', [AdminController::class, 'updateBook'])->name('adminbook.update');
// Route::delete('/admin/adminbook/{id}', [AdminController::class, 'deleteBook'])->name('adminbook.destroy');


// //////////////admin book/////////////////
// Route::get('/admin/admincategory', [AdminController::class, 'adminCategory']);
// Route::post('/admin/admincategory', [AdminController::class, 'bookShow'])->name('admincategory.store');
// Route::get('/admin/admincategory/create', [AdminController::class, 'createCategory']);
// Route::post('/admin/admincategory', [AdminController::class, 'categoryShow'])->name('adminCategory.store');
// Route::get('/admin/admincategory/edit/{id}', [AdminController::class, 'editCategory'])->name('admincategory.edit');
// Route::put('/admin/admincategory/{id}', [AdminController::class, 'updateCategory'])->name('admincategory.update');
// Route::delete('/admin/admincategory/{id}', [AdminController::class, 'deleteCategory'])->name('admincategory.destroy');

// //////////////admin staff/////////////////
// Route::get('/admin/adminstaff', [AdminController::class, 'adminStaff']);
// Route::post('/admin/adminstaff', [AdminController::class, 'staffShow'])->name('adminstaff.store');
// Route::get('/admin/adminstaff/create', [AdminController::class, 'createStaff']);
// Route::post('/admin/adminstaff', [AdminController::class, 'staffShow'])->name('adminStaff.store');
// Route::get('/admin/adminstaff/edit/{id}', [AdminController::class, 'editStaff'])->name('adminstaff.edit');
// Route::put('/admin/adminstaff/{id}', [AdminController::class, 'updateStaff'])->name('adminstaff.update');
// Route::delete('/admin/adminstaff/{id}', [AdminController::class, 'deleteStaff'])->name('adminstaff.destroy');

// //////////////admin NXB/////////////////
// Route::get('/admin/adminnxb', [AdminController::class, 'adminNXB']);
// Route::post('/admin/adminnxb', [AdminController::class, 'nxbShow'])->name('adminnxb.store');
// Route::get('/admin/adminnxb/create', [AdminController::class, 'createNXB']);
// Route::post('/admin/adminnxb', [AdminController::class, 'nxbShow'])->name('adminNXB.store');
// Route::get('/admin/adminnxb/edit/{id}', [AdminController::class, 'editNXB'])->name('adminnxb.edit');
// Route::put('/admin/adminnxb/{id}', [AdminController::class, 'updateNXB'])->name('adminnxb.update');
// Route::delete('/admin/adminnxb/{id}', [AdminController::class, 'deleteNXB'])->name('adminnxb.destroy');

// //////////////admin HoaDonBan/////////////////
// Route::get('/admin/adminHDB', [AdminController::class, 'adminHoaDonBan']);
// Route::get('/admin/adminHDB/edit/{id}', [AdminController::class, 'editHoaDonBan'])->name('adminhdb.edit');
// Route::put('/admin/adminHDB/{id}', [AdminController::class, 'updateHoaDonBan'])->name('adminhdb.update');
// Route::delete('/admin/adminHDB/{id}', [AdminController::class, 'deleteHoaDonBan'])->name('adminhdb.destroy');

// //////////////admin ChiTietHDB/////////////////
// Route::get('/admin/adminChiTietHDB', [AdminController::class, 'adminChiTietHDB']);
// Route::get('/admin/adminChiTietHDB/edit/{id}', [AdminController::class, 'editChiTietHDB'])->name('adminchitietHDB.edit');
// Route::put('/admin/adminChiTietHDB/{soHDB}/{maSach}', [AdminController::class, 'updateChiTietHDB'])->name('adminchitietHDB.update');
// Route::delete('/admin/adminChiTietHDB/{id}', [AdminController::class, 'deleteChiTietHDB'])->name('adminchitietHDB.destroy');

// //////////////admin HoaDonNhap/////////////////
// Route::get('/admin/adminHDN', [AdminController::class, 'adminHoaDonNhap']);
// Route::get('/admin/adminHDN/edit/{id}', [AdminController::class, 'editHoaDonNhap'])->name('adminhdn.edit');
// Route::put('/admin/adminHDN/{id}', [AdminController::class, 'updateHoaDonNhap'])->name('adminhdn.update');
// Route::delete('/admin/adminHDN/{id}', [AdminController::class, 'deleteHoaDonNhap'])->name('adminhdn.destroy');

// //////////////admin ChiTietHDN/////////////////
// Route::get('/admin/adminChiTietHDN', [AdminController::class, 'adminChiTietHDN']);
// Route::get('/admin/adminChiTietHDN/edit/{id}', [AdminController::class, 'editChiTietHDN'])->name('adminchitietHDN.edit');
// Route::put('/admin/adminChiTietHDN/{soHDN}/{maSach}', [AdminController::class, 'updateChiTietHDN'])->name('adminchitietHDN.update');
// Route::delete('/admin/adminChiTietHDN/{id}', [AdminController::class, 'deleteChiTietHDN'])->name('adminchitietHDN.destroy');

////////////////admin login//////////////////// 
// Route cho đăng nhập
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.submit');


Route::get('/admin/message', [ChatController::class, 'index'])->name('index.message');
Route::get('/admin/message/client/{maKH}', [ChatController::class, 'messageAdmin'])->name('list.message');
Route::get('/admin/message/client', [ChatController::class, 'listKH'])->name('message.client');
Route::put('/admin/message/emoji/{id}', [ChatController::class, 'setEmoji'])->name('message.emoji');
Route::match(['get', 'post'], '/admin/product-message/{masach}', [ChatController::class, 'productMess'])->name('product.message');
Route::match(['get', 'post'], '/admin/message/store', [ChatController::class, 'store'])->name('sent.message');
Route::match(['get', 'post'], '/admin/message/Adminstore', [ChatController::class, 'storeAdmin'])->name('sent.messageAdmin');
Route::put('/admin/message/restartNoti/{makh}', [ChatController::class, 'restartNotification'])->name('message.restartNotification');
Route::put('/admin/message/remove/{id}', [ChatController::class, 'removeMessages'])->name('message.remove');







Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/staff-info', [AdminController::class, 'getStaffInfo']);
    Route::get('/admin', [ChartController::class, 'DoanhSo']);
    Route::prefix('/admin/adminbook')->group(function () {
        Route::get('/', [AdminController::class, 'adminBook'])->name('adminbook.index');
        Route::get('/create', [AdminController::class, 'createBook'])->name('adminbook.create');
        Route::get('/getSubCategories', [AdminController::class, 'getSubCategories'])->name('adminbook.category');
        Route::post('/', [AdminController::class, 'storeBook'])->name('adminBook.store');
        Route::get('/edit/{id}', [AdminController::class, 'editBook'])->name('adminbook.edit');
        Route::put('/{id}', [AdminController::class, 'updateBook'])->name('adminbook.update');
        Route::delete('/{id}', [AdminController::class, 'deleteBook'])->name('adminbook.destroy');
        Route::delete('/delete/{id}', [AdminController::class, 'bossdeleteBook'])->name('bossbook.destroy');
    });
    Route::prefix('/admin/admincategory')->group(function () {
        Route::get('/', [AdminController::class, 'adminCategory'])->name('admincategory.index');
        Route::get('/create', [AdminController::class, 'createCategory'])->name('admincategory.create');
        Route::post('/', [AdminController::class, 'categoryShow'])->name('adminCategory.store');
        Route::get('/edit/{id}', [AdminController::class, 'editCategory'])->name('admincategory.edit');
        Route::put('/{id}', [AdminController::class, 'updateCategory'])->name('admincategory.update');
        Route::delete('/{id}', [AdminController::class, 'deleteCategory'])->name('admincategory.destroy');
    });
    Route::prefix('/admin/admincategorysmall')->group(function () {
        Route::get('/', [AdminController::class, 'adminCategorySmall'])->name('admincategorysmall.index');
        Route::get('/create', [AdminController::class, 'createCategorySmall'])->name('admincategorysmall.create');
        Route::post('/', [AdminController::class, 'categorySmallShow'])->name('adminCategorysmall.store');
        Route::get('/edit/{id}', [AdminController::class, 'editCategorySmall'])->name('admincategorysmall.edit');
        Route::put('/{id}', [AdminController::class, 'updateCategorySmall'])->name('admincategorysmall.update');
        Route::delete('/{id}', [AdminController::class, 'deleteCategorySmall'])->name('admincategorysmall.destroy');
    });
    Route::prefix('/admin/adminstaff')->group(function () {
        Route::get('/', [AdminController::class, 'adminStaff'])->name('adminstaff.index');
        Route::get('/list', [AdminController::class, 'adminStafflist'])->name('adminstaff.list');
        Route::get('/create', [AdminController::class, 'createStaff'])->name('adminstaff.create');
        Route::post('/', [AdminController::class, 'staffShow'])->name('adminStaff.store');
        Route::get('/edit/{id}', [AdminController::class, 'editStaff'])->name('adminstaff.edit');
        Route::put('/{id}', [AdminController::class, 'updateStaff'])->name('adminstaff.update');
        Route::delete('/{id}', [AdminController::class, 'deleteStaff'])->name('adminstaff.destroy');
    });
    Route::prefix('/admin/adminnxb')->group(function () {
        Route::get('/', [AdminController::class, 'adminNXB'])->name('adminnxb.index');
        Route::get('/create', [AdminController::class, 'createNXB'])->name('adminnxb.create');
        Route::post('/', [AdminController::class, 'nxbShow'])->name('adminNXB.store');
        Route::get('/edit/{id}', [AdminController::class, 'editNXB'])->name('adminnxb.edit');
        Route::put('/{id}', [AdminController::class, 'updateNXB'])->name('adminnxb.update');
        Route::delete('/{id}', [AdminController::class, 'deleteNXB'])->name('adminnxb.destroy');
    });
    Route::prefix('/admin/adminHDB')->group(function () {
        Route::get('/', [AdminController::class, 'adminHoaDonBan'])->name('adminhdb.index');
        Route::get('/create', [AdminController::class, 'createHoaDonBan'])->name('adminhdb.create');
        Route::post('/', [AdminController::class, 'storeHoaDonBan'])->name('adminhdb.store');
        Route::get('/edit/{id}', [AdminController::class, 'editHoaDonBan'])->name('adminhdb.edit');
        Route::put('/{id}', [AdminController::class, 'updateHoaDonBan'])->name('adminhdb.update');
        Route::delete('/{id}', [AdminController::class, 'deleteHoaDonBan'])->name('adminhdb.destroy');
        Route::match(['get', 'post'], '/{sohdb}/{status}/update-status', [AdminController::class, 'updateStatusHoaDonBan'])->name('adminhdb.updateStatus');

        Route::delete('/hoadonk/{id}', [AdminController::class, 'deleteHoaDonBank'])->name('adminhdbk.destroy');
        Route::match(['get', 'post'], '/hoadonk/{sohdbk}/{statusk}/update-statusk', [AdminController::class, 'updateStatusHoaDonBank'])->name('adminhdbk.updateStatus');
    });
    Route::prefix('/admin/adminHDN')->group(function () {
        Route::get('/', [AdminController::class, 'adminHoaDonNhap'])->name('adminhdn.index');
        Route::get('/create', [AdminController::class, 'createHoaDonNhap'])->name('adminhdn.create');
        Route::post('/', [AdminController::class, 'storeHoaDonNhap'])->name('adminhdn.store');
        Route::get('/edit/{id}', [AdminController::class, 'editHoaDonNhap'])->name('adminhdn.edit');
        Route::put('/{id}', [AdminController::class, 'updateHoaDonNhap'])->name('adminhdn.update');
        Route::delete('/{id}', [AdminController::class, 'deleteHoaDonNhap'])->name('adminhdn.destroy');
    });
    Route::prefix('/admin/adminChiTietHDN')->group(function () {
        Route::get('/', [AdminController::class, 'adminChiTietHDN'])->name('adminchitietHDN.index');
        Route::get('/create', [AdminController::class, 'createChiTietHDN'])->name('adminchitietHDN.create');
        Route::post('/', [AdminController::class, 'storeChiTietHDN'])->name('adminchitietHDN.store');
        Route::get('/edit/{id}', [AdminController::class, 'editChiTietHDN'])->name('adminchitietHDN.edit');
        Route::put('/{soHDN}/{maSach}', [AdminController::class, 'updateChiTietHDN'])->name('adminchitietHDN.update');
        Route::delete('/{id}', [AdminController::class, 'deleteChiTietHDN'])->name('adminchitietHDN.destroy');
    });
    Route::prefix('/admin/adminChiTietHDB')->group(function () {
        Route::get('/', [AdminController::class, 'adminChiTietHDB'])->name('adminchitietHDB.index');
        Route::get('/create', [AdminController::class, 'createChiTietHDB'])->name('adminchitietHDB.create');
        Route::post('/', [AdminController::class, 'storeChiTietHDB'])->name('adminchitietHDB.store');
        Route::get('/edit/{id}', [AdminController::class, 'editChiTietHDB'])->name('adminchitietHDB.edit');
        Route::put('/{soHDB}/{maSach}', [AdminController::class, 'updateChiTietHDB'])->name('adminchitietHDB.update');
        Route::delete('/{id}', [AdminController::class, 'deleteChiTietHDB'])->name('adminchitietHDB.destroy');
    });
    Route::prefix('/admin/adminVote')->group(function () {
        Route::get('/', [AdminController::class, 'adminVote'])->name('admincvote.index');
        Route::delete('/{id}', [AdminController::class, 'deleteVote'])->name('adminvote.destroy');
    });
    Route::prefix('/admin/adminBlog')->group(function () {
        Route::get('/', [AdminController::class, 'adminBlog'])->name('adminblog.index');
        Route::get('/create', [AdminController::class, 'createBlog'])->name('adminblog.create');
        Route::post('/', [AdminController::class, 'blogShow'])->name('adminblog.store');
        Route::get('/edit/{id}', [AdminController::class, 'editBlog'])->name('adminblog.edit');
        Route::put('/{id}', [AdminController::class, 'updateBlog'])->name('adminblog.update');
        Route::delete('/{id}', [AdminController::class, 'deleteBlog'])->name('adminblog.destroy');
    });
});

