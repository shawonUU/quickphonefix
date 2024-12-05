<?php

use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use App\Models\Admin\DelivaryCharge;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Location;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PaytrailController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductContoller;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WriterController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReviewRatingController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TopingsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\NutritionController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\OptionTitleController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BookCategoryController;
use App\Http\Controllers\Admin\TimeScheduleController;
use App\Http\Controllers\Admin\DelivaryChargeController;
use App\Http\Controllers\Admin\BookSubCategoryController;
use App\Http\Controllers\Admin\ProductMnagementController;
use App\Http\Controllers\Admin\DelivaryPercentageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();


Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/services', [FrontendController::class, 'ourServices'])->name('services');
Route::get('/projects', [FrontendController::class, 'projects'])->name('projects');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/item/details/{id}', [FrontendController::class, 'productDetails'])->name('productDetails');
Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('/get-cart', [FrontendController::class, 'getCart'])->name('get_cart');
Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
Route::post('/get-checkout-page', [FrontendController::class, 'getCheckOutPage'])->name('get_check_out_page');
Route::get('/filter-item', [FrontendController::class, 'filterProduct'])->name('filterProduct');
Route::post('/filter', [FrontendController::class, 'filter'])->name('filter');
Route::post('/store/review', [ReviewRatingController::class, 'storeReview'])->name('store_ratings_reviews');
Route::post('/free_search_product', [FrontendController::class, 'freeSearch'])->name('free_search_product');
Route::post('save_reference_number', [OrderController::class, 'savePaymentInfo'])->name('save_reference_number');





Route::get('/subjects', [FrontendController::class, 'subjects'])->name('subjects');
Route::get('/subject/{id}', [FrontendController::class, 'subjectWiseProducts'])->name('subjectWiseProducts');
Route::get('/authors', [FrontendController::class, 'authors'])->name('authors');
Route::get('/author/{id}', [FrontendController::class, 'authorWiseProducts'])->name('authorWiseProducts');
Route::get('/pulishers', [FrontendController::class, 'pulishers'])->name('pulishers');
Route::get('/pulisher/{id}', [FrontendController::class, 'pulisherWiseProducts'])->name('pulisherWiseP
roducts');

Route::middleware(['auth'])->group(function () {

    Route::get('/', [FrontendController::class, 'index'])->name('index');
    
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => ['permission:settings']], function () {
        Route::prefix('settings')->middleware(['auth'])->group(function () {
            Route::get('home-page', [HomePageController::class, 'index'])->name('settings.home_page');
            Route::get('nav-item', [HomePageController::class, 'navItem'])->name('settings.nav_item');
            Route::post('update-priyority', [HomePageController::class, 'updatePriyority'])->name('settings.update_priyority');
            Route::post('update-nav-item-priyority', [HomePageController::class, 'updateNaveItemPriyority'])->name('settings.update_nav_item_priyority');
            Route::post('update-view-type', [HomePageController::class, 'updateViewType'])->name('settings.update_view_type');
            Route::post('update-title', [HomePageController::class, 'updateTitle'])->name('settings.update_titel');
            Route::post('update-nav-item-title', [HomePageController::class, 'updateNavItemTitle'])->name('settings.update_nav_item_titel');
            Route::post('update-more-button-title', [HomePageController::class, 'updateMoreButtonTitle'])->name('settings.update_more_button_titel');
            Route::resource('menu', MenuController::class);
            Route::post('menus-show-on-home', [MenuController::class, 'showOnHome'])->name('menus.showOnHome');
            Route::post('menus-show-on-nav', [MenuController::class, 'showOnNav'])->name('menus.showOnNav');

            Route::get('settings/district', [AddressController::class, 'discrict'])->name('settings.district');
            Route::get('settings/area', [AddressController::class, 'area'])->name('settings.area');
            Route::post('settings/district/store', [AddressController::class, 'storeDistrict'])->name('settings.district.store');
            Route::post('settings/area/store', [AddressController::class, 'storeArea'])->name('settings.area.store');
            Route::post('settings/district/update/{id}', [AddressController::class, 'updateDistrict'])->name('settings.district.update');
            Route::post('settings/area/update/{id}', [AddressController::class, 'updateArea'])->name('settings.area.update');

            Route::post('settings/district/delete/{id}', [AddressController::class, 'deleteDistrict'])->name('settings.district.delete');
            Route::post('settings/area/delete/{id}', [AddressController::class, 'deleteArea'])->name('settings.area.delete');
            
        }); 
    });
    Route::group(['middleware' => ['permission:product-management']], function () {
        Route::prefix('product')->middleware(['auth'])->group(function () {
            Route::resource('categories', CategoryController::class);
            Route::resource('sub-categories', SubCategoryController::class); 
            Route::resource('brand', BrandController::class);
            Route::resource('products', ProductContoller::class);
            Route::resource('sizes', SizeController::class);
            Route::resource('nutritions', NutritionController::class);
            Route::resource('optiontitles', OptionTitleController::class);
            Route::get('product-sizes/{id}', [ProductContoller::class, 'size'])->name('product_size');
            Route::delete('delete-product-sizes/{id}', [ProductContoller::class, 'deleteProductSize'])->name('productSize.destroy');
            Route::post('store-product-sizes', [ProductContoller::class, 'storeSize'])->name('product_size.store');
            Route::get('create-product-sizes/{id}', [ProductContoller::class, 'createProductSize'])->name('product_size.create');
            Route::get('edit-product-sizes/{id}', [ProductContoller::class, 'editProductSize'])->name('product_size.edit');
            //topings assign
            Route::get('store-product-topings/{id}', [ProductContoller::class, 'topings'])->name('product_topting');
            Route::post('store-product-topings', [ProductContoller::class, 'storeToping'])->name('product_toping.store');
            Route::patch('updatel-product-sizes/{id}', [ProductContoller::class, 'updateSize'])->name('product_size.update');
            Route::resource('topings', TopingsController::class);
            Route::post('categories-show-on-home', [CategoryController::class, 'showOnHome'])->name('categories.showOnHome');
            Route::post('categories-show-on-nav', [CategoryController::class, 'showOnNav'])->name('categories.showOnNav');
            Route::post('sub-categories-show-on-home', [SubCategoryController::class, 'showOnHome'])->name('sub-categories.showOnHome');
            Route::post('brand-show-on-home', [BrandController::class, 'showOnHome'])->name('brand.showOnHome');
        }); 
    }); 
        
    Route::group(['middleware' => ['permission:book-management']], function () {
        Route::prefix('book')->middleware(['auth'])->group(function () {
            Route::resource('books', BookController::class);
            Route::resource('book-categories', BookCategoryController::class);
            Route::resource('book-sub-categories', BookSubCategoryController::class);
            Route::resource('publisher', PublisherController::class);
            Route::resource('writer', WriterController::class);
            Route::resource('subject', SubjectController::class);
            Route::post('publisher-show-on-home', [PublisherController::class, 'showOnHome'])->name('publisher.showOnHome');
            Route::post('writer-show-on-home', [WriterController::class, 'showOnHome'])->name('writer.showOnHome');
            Route::post('subject-show-on-home', [SubjectController::class, 'showOnHome'])->name('subject.showOnHome');
            Route::post('book-categories-show-on-home', [BookCategoryController::class, 'showOnHome'])->name('book-categories.showOnHome');
            Route::post('book-categories-show-on-nav', [BookCategoryController::class, 'showOnNav'])->name('book-categories.showOnNav');
            Route::post('book-sub-categories-show-on-home', [BookSubCategoryController::class, 'showOnHome'])->name('book-sub-categories.showOnHome');
            Route::get('book/package', [BookController::class, 'package'])->name('books.package');
            Route::get('book/package/create', [BookController::class, 'packageCraete'])->name('books.create_package');
            Route::post('book/package/store', [BookController::class, 'packageStore'])->name('books.package_store');
            Route::get('book/package/edit/{id}', [BookController::class, 'packageEdit'])->name('books.package_edit');
            Route::patch('book/package/update/{id}', [BookController::class, 'packageUpdate'])->name('books.package_update');
            Route::delete('book/package/delete/{id}', [BookController::class, 'packageDelete'])->name('books.package_destroy');
            
            
        });
    });
    
    Route::group(['middleware' => ['permission:settings']], function () {
        Route::resource('delivery_charges', DelivaryChargeController::class);
        Route::resource('delivery_percentage', DelivaryPercentageController::class);
        Route::resource('currency', CurrencyController::class);
        Route::resource('schedule', TimeScheduleController::class);
        Route::resource('location', Location::class);
        Route::resource('coupons', CouponController::class);
    });

    //Order Management
    Route::group(['middleware' => ['permission:order-management']], function () {
        Route::get('orders', [OrderController::class, 'getOrders'])->name('orders.index');
        Route::post('filter/orders', [OrderController::class, 'filterOrders'])->name('filter_orders');
        Route::post('order-qty-update', [OrderController::class, 'updateQty'])->name('orders.qty_update');
        Route::get('edit-order/{id}', [OrderController::class, 'editOrder'])->name('edit-order');
        
        Route::get('order-details/{id}', [OrderController::class, 'getOrderDetails'])->name('order.details');
        Route::post('update-status', [OrderController::class, 'updateStatus'])->name('update.status');
        Route::post('update-payment-status', [OrderController::class, 'updatePaymentStatus'])->name('update.payment.status');
        Route::post('assign-delivery-boy', [OrderController::class, 'assignDeliveryBoy'])->name('assign.deliveryboy');
        Route::post('update-address', [OrderController::class, 'updateAddress'])->name('address.update');
        Route::get('product-sizes-by-ajax', [ProductContoller::class, 'getProductSize'])->name('product_size_by_ajax');
        Route::post('add-item-to-order', [OrderController::class, 'addItemToOrder'])->name('add_item_to_order');
    });

    //Order Management
    Route::group(['middleware' => ['permission:content-management']], function () {
        Route::resource('slider', SliderController::class);
        Route::resource('home-ad', AdsController::class);
    });
});

Route::group(['middleware' => ['permission:Administration']], function () {
    Route::resource('users', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
});

    Route::group(['middleware' => ['permission:Service Management']], function () {
        Route::resource('service', ServiceController::class);
        Route::get('service/invoice/{id}', [ServiceController::class, 'makeInvoice'])->name('service.invoice');
        Route::get('complated/service', [ServiceController::class, 'complatedService'])->name('service.complated');
        Route::post('service/makecomplate/{id}', [ServiceController::class, 'makeComplate'])->name('service.makecomplate');

    });
    Route::group(['middleware' => ['permission:Service Management']], function () {
        Route::resource('sales', SalesController::class);
        Route::get('sales/invoice/{id}', [SalesController::class, 'makeInvoice'])->name('sales.invoice');
    });

    Route::resource('booking', BookingController::class);
    


Route::get('/success', [PaytrailController::class, 'success']);
Route::get('/cancel', [PaytrailController::class, 'cancel']);
Route::get('/pending', [PaytrailController::class, 'pending']);
Route::get('/notification', [PaytrailController::class, 'notification']);




Route::get('get-location-schedule', [Location::class, 'locationSchedule']);
Route::get('get-delivery-charge', [DelivaryChargeController::class, 'getDeliveryCharge']);
Route::post('palce-order', [OrderController::class, 'placeOrder'])->name('please_order');
Route::get('/order/received/{order_number}', [OrderController::class, 'orderReceived'])->name('order_received');
Route::post('get-related-product', [ProductContoller::class, 'getRelatedProduct']);



Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);


//Api for axios
Route::get('get-sliders', [SliderController::class, 'getSliders'])->name('get.sliders');
Route::get('get-ads', [AdsController::class, 'getAds'])->name('get.ads');
Route::get('get-categories', [CategoryController::class, 'getCategories'])->name('get.categories');
Route::get('get-products', [ProductContoller::class, 'getProducts'])->name('get.products');
Route::get('get-popular-products', [ProductContoller::class, 'getPopularProducts'])->name('get.popular.products');
// Route::get('get-product-details', [ProductContoller::class, 'getProductDetails']);
Route::get('get-coupon', [CouponController::class, 'getCoupon']);
Route::get('check-coupon', [CouponController::class, 'checkCoupon']);
Route::get('get-currency', [CurrencyController::class, 'getCurrency'])->name('get.currency');


Route::get('get-order-status', [OrderController::class, 'getOrderStatus']);
Route::get('order-info', [OrderController::class, 'getCustomerOrderInfo']);
Route::post('update-notification', [NotificationController::class, 'update'])->name('update-notification');
Route::post('/paytrail/create-payment', [PaytrailController::class, 'createPayment']);

Route::post('/add-to-cart', [OrderController::class, 'addToCart'])->name('add_to_cart');
Route::post('/update-cart-qty', [OrderController::class, 'updateCartQty'])->name('update_cart_qty');
Route::post('/update-cart-delivery-charge', [OrderController::class, 'updateCartDeliveryCharge'])->name('update_cart_delivery_charge');
Route::post('/apply-coupon-to-cart', [OrderController::class, 'applyCoupon'])->name('apply_coupon_to_cart');
Route::post('/remove-cart-item', [OrderController::class, 'removeCartItem'])->name('remove_cart_item');

