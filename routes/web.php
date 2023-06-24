<?php

use App\Http\Controllers\Frontend\AjaxController;
use Illuminate\Support\Facades\Route;
//======= Use A Frontend Controller =======*/
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CompareController;
use App\Http\Controllers\Frontend\CouponController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*================== Frontend All Route ==============*/
Route::get('/', [FrontendController::class, 'index'])->name('home');


Route::post('/subscribe/store', [FrontendController::class, 'SubsStore'])->name('subs.store');
/*================== Multi Language All Routes =================*/
Route::get('/language/bangla', [LanguageController::class, 'Bangla'])->name('bangla.language');
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
Route::middleware(['auth'])->group(function() {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('dashboard');
	Route::get('/user/profile/view', [UserController::class, 'UserProfileIndex'])->name('user.profile.index');
	Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
	Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
	Route::get('/user/password/change', [UserController::class, 'UserChangePassword'])->name('user.change.password');
	Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');
	Route::get('/user/order/view', [OrderController::class, 'index'])->name('user.orders.index');
	Route::get('/user/address/view', [UserController::class, 'UserAddress'])->name('user.address');
}); // Gorup Milldeware End


/* ==================== Start User dashboard Route ================== */
// Route::group(['prefix'=>'user'], function(){
//     Route::get('/dashboard',[UserController::class, 'index'])->name('dashboard');
//     Route::get('/password-change',[UserController::class, 'UserUpdatePassword'])->name('password.change');
//    });

/* =============== Product Details Show ============= */
Route::get('product-details/{slug}',[FrontendController::class, 'productDetails'])->name('product.details');
/* =============== Start Product View Modal With Ajax ============== */
Route::get('/product/view/modal/{id}',[FrontendController::class,'ProductViewAjax']);
/* ============ Start Add To Cart Store Data Withn Ajax  ============= */
Route::post('/cart/data/store/{id}',[CartController::class, 'AddToCart'])->name('cart.add');
/* ============ Start Mini Cart With Ajax  ============= */
Route::get('/product/mini/cart',[CartController::class,'AddMiniCart'])->name('minicart.add');
Route::get('/minicart/product-remove/{rowId}',[CartController::class,'RemoveMiniCart'])->name('minicart.remove');
/* ============ Cart Show   ============= */
Route::get('/cart',[CartController::class,'index'])->name('cart.show');

/* ============ Cart Get Product   ============= */
Route::get('/get-cart-product', [CartController::class, 'getCartProduct'])->name('getcart.product');
/* ============  Cart Increment  ============= */
Route::get('/cart-increment/{rowId}', [CartController::class, 'cartIncrement'])->name('cart.increment');
/* ============  Cart Decrement  ============= */
Route::get('/cart-decrement/{rowId}', [CartController::class, 'cartDecrement'])->name('cart.decrement');
/* ============ Cart Remove   ============= */
Route::get('/cart-remove/{rowId}', [CartController::class, 'removeCartProduct'])->name('cart.remove');
/* ============ All Cart Remove   ============= */
Route::get('/cart/all-delete',[CartController::class,'destroy'])->name('cart.remove.all');

/* ============  Get Cart Checkout Product   ============= */
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
/* ============ Get Cart Checkout Product   ============= */

// Page Setting
Route::get('/page/{slug}',[FrontendController::class, 'pageAbout'])->name('page.about');

/* =============== Product Search  ============= */
Route::post('/product/search', [FrontendController::class, 'productSearch'])->name('product.search');
/* =============== Advance Search ============= */
Route::post('search-product', [FrontendController::class, 'advanceProduct']);

/* =============== Product Shop ============= */
Route::get('/product/shop',[ProductController::class,'index'])->name('product.shop');

/* ================ START ADD TO WISHLIST WITH AJAX ============== */
Route::post('/add-to-wishlist/{product_id}',[WishlistController::class, 'create']);
/* ================= End ADD TO WISHLIST WITH AJAX ================ */


/* ================ START ADD TO COMPARE WITH AJAX ============== */
Route::get('/compare',[CompareController::class, 'index'])->name('compare');
Route::get('/compare/reset',[CompareController::class, 'reset'])->name('compare.reset');
Route::post('/compare/addToCompare/{id}',[CompareController::class, 'addToCompare'])->name('compare.addToCompare');
/* ================ END ADD TO COMPARE WITH AJAX ============== */

/* ================= START COUPON OPTIONS ====================== */
Route::post('/coupon-apply',[CouponController::class, 'CouponApply']);
Route::get('/coupon-calculation', [CouponController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CouponController::class, 'CouponRemove']);
/* ================= END COUPON OPTIONS ====================== */

// /*================   START DIVISION WITH DISTRICT/UPAZILA ROUTE   ==================*/
Route::get('/division-district/ajax/{division_id}',[CheckoutController::class,'getdistrict']);
Route::get('/district-upazilla/ajax/{district_id}',[CheckoutController::class,'getupazilla']);
// /*================   END DIVISION WITH DISTRICT/UPAZILA ROUTE   ==================*/


/* =============== Start Category WiseProduct Show Route ============= */
Route::get('/category/product/{slug}', [FrontendController::class, 'CatWiseProduct'])->name('product.category');
Route::get('/subcategory/product/{slug}', [FrontendController::class, 'SubCatWiseProduct'])->name('product.subcategory');
Route::get('/childcategory/product/{slug}', [FrontendController::class, 'ChildCatWiseProduct'])->name('product.childcategory');
/* =============== End Category WiseProduct Show Route ============= */


/* =============== Start Payment Getway All Route ============= */
Route::post('/checkout/payment',[CheckoutController::class,'payment'])->name('checkout.payment');
Route::post('/checkout/store',[CheckoutController::class,'store'])->name('checkout.store');
Route::get('/checkout/success/{id}',[CheckoutController::class,'show'])->name('checkout.success');
/* =============== End Payment Getway All Route ============= */


/* ====================  Start User Order Route ================== */
Route::get('/user/orders/{invoice_no}',[UserController::class, 'orderView'])->name('order.view');
/* ====================  End User Order Route ================== */

/* =============== Hot Deals  ============= */
Route::get('/hot-deals', [FrontendController::class, 'hotDeals'])->name('hot_deals.all');
Route::get('/featured', [FrontendController::class, 'featured'])->name('featured.all');


/// Product Quick View Modal with Ajax ////
Route::get('/product/quick/view/modal/{id}', [FrontendController::class, 'ProductQuickViewAjax']);

// ajax er jonne controller akhan theke start
Route::get('/banner/all', [AjaxController::class, 'bannerAll']);








require __DIR__.'/auth.php';




