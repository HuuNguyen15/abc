<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SlideController;



// client
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::post('/tim-kiem', [HomeController::class, 'search']);
Route::get('/404', [HomeController::class, 'error_page']);

//danh mục sản phảm trang chủ
Route::get('/danh-muc-san-pham/{slug_category_product}', [HomeController::class, 'show_category_home'])->name('danh-muc-san-pham');
Route::get('/thuong-hieu-san-pham/{slug_brand_product}', [HomeController::class, 'show_brand_home']);
Route::get('chi-tiet-san-pham/{slug}/{product_id}', [ProductController::class, 'details_product']);

// admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
//danh mục
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product'])->name('all-category-product');
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product'])->name('add-category-product');
Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product'])->name('save-category-product');
Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product'])->name('unactive-category-product');
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product'])
    ->name('active-category-product');
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product'])
    ->name('edit-category-product');
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product'])->name('update-category-product');
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product'])->name('delete-category-product');
Route::post('/export-csv', [CategoryProduct::class, 'export_csv']);
Route::post('/import-csv', [CategoryProduct::class, 'import_csv']);


// thương hiệu
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product'])->name('all-brand-product');
Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product'])->name('add-brand-product');
Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product'])->name('save-brand-product');
Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product'])->name('unactive-brand-product');
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product'])
    ->name('active-brand-product');
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product'])
    ->name('edit-brand-product');
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product'])->name('update-brand-product');
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product'])->name('delete-brand-product');
// product
Route::get('/all-product', [ProductController::class, 'all_product'])->name('all-product');
Route::get('/add-product', [ProductController::class, 'add_product'])->name('add-product');
Route::post('/save-product', [ProductController::class, 'save_product'])->name('save-product');
Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product'])->name('unactive-product');
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product'])
    ->name('active-product');
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product'])

    ->name('edit-product');
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product'])->name('update-product');
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product'])->name('delete-product');
// them gio hang bang ajax
Route::post('add-cart', [CartController::class, 'add_cart']);
Route::get('/gio-hang', [CartController::class, 'gio_hang']);
Route::get('/delete-product-cart/{sestion_id}', [CartController::class, 'delete_cart']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
//checkout
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout'])->name('login-checkout');
Route::post('/add-customer', [CheckoutController::class, 'add_customer'])->name('add-customer');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

// Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer'])->name('save-checkout-customer');
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout'])->name('logout-checkout');
Route::get('/payment', [CheckoutController::class, 'payment'])->name('payment');
Route::post('/login-customer', [CheckoutController::class, 'login_customer'])->name('login-customer');
Route::post('/order-place', [CheckoutController::class, 'order_place'])->name('order-place');
Route::post('/select-delivery-shipping', [CheckoutController::class, 'select_delivery_shipping'])->name('select-delivery-shipping');
Route::post('/add-shipping-ajax', [CheckoutController::class, 'add_shipping'])->name('add-shipping-ajax');
// Route::get('/del-fee', [CheckoutController::class, 'del_fee'])->name('del-fee');
//order
Route::get('/manage-order', [OrderController::class, 'manage_order'])->name('manage-order');
Route::get('/view-order/{order_code}', [OrderController::class, 'view_order'])->name('view-order');
Route::post('/update-order-qty', [OrderController::class, 'update_order'])->name('update-order');
Route::post('/update-qty', [OrderController::class, 'update_qty'])->name('update-qty');
Route::get('/print-order/{checkout_code}', [OrderController::class, 'print_order'])->name('print-order');

//login fb
// Route::get('/login-facebook', [AdminController::class, 'login_facebook']);
// Route::get('/admin/callback', [AdminController::class, 'callback_facebook']);

//Coupon
Route::post('/check-coupon', [CartController::class, 'check_coupon']);
Route::get('/show-coupon', [CouponController::class, 'show_coupon']);
Route::get('/add-coupon-code', [CouponController::class, 'add_coupon_code']);
Route::post('/save-coupon-code', [CouponController::class, 'save_coupon_code']);
Route::get('/delete-coupon-code/{coupon_id}', [CouponController::class, 'delete_coupon_code']);

// van chuyen delivery
Route::get('/delivery', [DeliveryController::class, 'delivery']);
Route::post('/select-delivery', [DeliveryController::class, 'select_delivery']);
Route::post('/add-delivery', [DeliveryController::class, 'add_delivery']);
Route::get('/show-delivery', [DeliveryController::class, 'show_delivery']);
Route::post('/update-fee', [DeliveryController::class, 'update_fee'])->name('update.fee');
//banner
Route::get('/manager-slider', [SlideController::class, 'manager_slider']);
Route::get('/add-slider', [SlideController::class, 'add_slider']);
Route::get('/delete-slider/{slider_id}', [SlideController::class, 'delete_slider']);
Route::post('/insert-slider', [SlideController::class, 'insert_slider'])->name('insert');
Route::get('/unactive-slider/{slider_id}', [SlideController::class, 'unactive_slider']);
Route::get('/active-slider/{slider_id}', [SlideController::class, 'active_slider']);
