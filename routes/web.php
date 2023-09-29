<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', [UserController::class,'home'])->name('index');
Route::get('/', [UserController::class,'getShopPage'])->name('index');



 Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

       //Booking
        Route::post('/book/product/{id}', [UserController::class,'bookOrder'])->name('book.order');
        Route::post('/book/{productId}', [UserController::class,'bookWithProduct'])->name('book.product');
        Route::get('/get-my-bookings', [UserController::class,'myBookings'])->name('bookings.index');
        Route::get('/get/booking-details/{id}', [UserController::class,'getBookingDetails'])->name('bookings.details');
        Route::put('/bookings/{bookingId}/updateStatus',  [UserController::class,'updateStatus'])->name('booking.updateStatus');
        Route::get('/get/single-booking/{id}', [UserController::class,'bookingDetails'])->name('single.booking.detail');
        Route::get('/get/invoice/{invid}', [UserController::class,'showInvoice'])->name('invoice.detail');
        
        
});
 Route::middleware(['auth', 'admin'])->group(function () {
        //Admin
          Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
          Route::get('/reg-users', [AdminController::class, 'regUsers'])->name('reg-users');
          Route::get('/get-aboutus', [AdminController::class, 'getAboutUs'])->name('add-aboutus');
          Route::post('/store-about-us', [AdminController::class, 'storeAboutUs'])->name('store-about-us');
          Route::get('/get-contact-us', [AdminController::class, 'getContactUs'])->name('add-contactus');
          Route::post('/store-contact-us', [AdminController::class, 'storeContactUs'])->name('store-contact-us');

          //Reports
          Route::get('/between-dates-report', [AdminController::class, 'betweenDatesReportForm'])->name('between.dates.report.form');
          Route::post('/generate-report', [AdminController::class, 'generateBetweenDatesReport'])->name('generate.report');
          Route::get('/count-report', [AdminController::class, 'requestCountReportForm'])->name('count.report.form');
          Route::post('/generate-count-report', [AdminController::class, 'generateRequestCountReport'])->name('generate.count.report');
          Route::get('/sales-report', [AdminController::class, 'salesReportForm'])->name('sales.report.form');
          Route::post('/generate-sales-report', [AdminController::class, 'generateSalesReport'])->name('generate.sales.report');

          //Search
          Route::get('/search-form',[AdminController::class, 'searchForm'])->name('search.form');
          Route::match(['get', 'post'],'/search-booking', [AdminController::class, 'searchBooking'])->name('search.booking');

           //Bookings
           Route::get('/all-bookings', [AdminController::class,'getAllBookings'])->name('get-all-bookings');
           Route::get('/new-bookings', [AdminController::class,'getNewBookings'])->name('get-new-bookings');
           Route::get('/approved-bookings', [AdminController::class,'getApprovedBookings'])->name('get-approved-bookings');
           Route::get('/unapproved-bookings', [AdminController::class,'getUnApprovedBookings'])->name('get-unapproved-bookings');


           //User Queries
           Route::get('/user-queries', [AdminController::class,'getUserInquiry'])->name('get-user-queries');
           Route::get('/user-query/{id}', [AdminController::class,'viewUserInquiry'])->name('get-user-query');
           Route::get('/delete-query/{id}', [AdminController::class,'deleteUserInquiry'])->name('delete-user-query');

           //Products
           Route::get('/create/product', [AdminController::class, 'createProduct'])->name('create-product');
           Route::post('/store/product', [AdminController::class, 'storeProduct'])->name('store-product');
           Route::get('products/delete/{id}',  [AdminController::class, 'deleteProduct'])->name('products.delete');
           Route::get('products/index',  [AdminController::class, 'productIndex'])->name('products.index');
           Route::get('/products/delete/{id}',  [AdminController::class, 'deleteProduct'])->name('products.delete');
           Route::put('/products/update/{id}',  [AdminController::class, 'updateProduct'])->name('products.update');
           Route::get('/products/{id}/edit',  [AdminController::class, 'editProducts'])->name('products.edit');


           //Brands
           Route::get('/create/brand', [AdminController::class, 'createBrand'])->name('create-brand');
           Route::get('/brand/index', [AdminController::class, 'brandIndex'])->name('brand.index');
           Route::post('/store/brand', [AdminController::class, 'storeBrand'])->name('store-brand');
           Route::get('/brands/{id}/edit',  [AdminController::class, 'editBrand'])->name('brands.edit');
           Route::get('/brands/{id}',  [AdminController::class, 'deleteBrand'])->name('brands.delete');
           Route::put('/brands/{id}/update',  [AdminController::class, 'updateBrand'])->name('brands.update');

           //Profile
           Route::get('/admin/profile', [ProfileController::class, 'Adminedit'])->name('admin-profile.edit');
           Route::get('/admin-change-password', [ProfileController::class, 'AdminchangePassword'])->name('admin.change-password');

});

Route::get('/product/{id}', [UserController::class,'showProductDetails'])->name('product.details');
Route::get('/laptop/shop/page', [UserController::class,'getLaptopPage'])->name('laptop.shop');
Route::get('/desktop/shop/page', [UserController::class,'getDesktopPage'])->name('desktop.shop');
Route::get('/get/about-us/page', [UserController::class,'getAboutUsPage'])->name('get.about-us');
Route::get('/get/contact-us/page', [UserController::class,'getContactUsPage'])->name('get.contact-us');
Route::match(['get', 'post'], '/search-products', [UserController::class, 'search'])->name('search.products');
Route::post('/store-inquiry', [UserController::class, 'storeUserInquiry'])->name('store_inquiry');

Route::get('/get-cities', [UserController::class, 'getCities'])->name('getCities');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
