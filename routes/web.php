<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SettingKoutaController;
use App\Http\Controllers\{
    CaraBoookController,
    LinkController,
    SocialController
};
use App\Http\Mail\{
    BookingMail,
};
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
// Route::get('qrcode', function () {
//      return QrCode::size(300)->generate('A basic example of QR code!');
//  });
 
// Route::get('/send-email', [EmailController::class, 'sendEmail']);

// Route::get('layoutfront', function(){
//     return view('layoutfront.app');
// });

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');

Route::middleware('loggedin')->group(function() {
    Route::get('login', [AuthController::class, 'loginView'])->name('login-view');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'registerView'])->name('register-view');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::get('/', [BookingController::class, 'book'])->name('booking');
    Route::post('/booknow', [BookingController::class, 'store'])->name('booknow');
    Route::get('/cekbooking', [BookingController::class, 'cekkode'])->name('cekkode');
    Route::get('/carabooking', [CaraBoookController::class, 'hajar'])->name('carabook');
    Route::post('uploadbuktibayar/{id}', [BookingController::class, 'retribusi'])->name('retribusi');

});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('beranda', [BerandaController::class, 'index'])->name('beranda');

    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('kategoricreate', [KategoriController::class, 'index'])->name('kategoricreate');
    Route::post('kategoriadd', [KategoriController::class, 'store'])->name('kategoriadd');
    Route::get('kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategoriedit');
    Route::post('kategoriupdate/{id}', [KategoriController::class, 'update'])->name('kategoriupdate');
    Route::post('/kategoridel/{id}', [KategoriController::class, 'destroy'])->name('kategoridel');

    Route::get('sesi', [SesiController::class, 'index'])->name('sesi');
    Route::post('sesiadd', [SesiController::class, 'store'])->name('sesiadd');
    Route::get('sesi/edit/{id}', [SesiController::class, 'edit'])->name('sesiedit');
    Route::post('sesiupdate/{id}', [SesiController::class, 'update'])->name('sesiupdate');
    Route::post('sesidel/{id}', [SesiController::class, 'destroy'])->name('sesidel');

    Route::get('daftarbooking', [BookingController::class, 'index'])->name('daftarbooking');
    Route::get('daftarbooking/edit/{id}', [BookingController::class, 'edit'])->name('bookingedit');
    Route::get('daftarbooking/konfirmasi/{id}', [BookingController::class, 'validasi'])->name('bookkonfirmasi');
    Route::post('daftarbooking/update/{id}', [BookingController::class, 'update'])->name('bookingupdate');
    Route::post('daftarbooking/delete/{id}', [BookingController::class, 'destroy'])->name('bookingdelete');

    Route::get('datacara', [CaraBoookController::class, 'index'])->name('datacara');
    Route::post('caraadd', [CaraBoookController::class, 'store'])->name('caraadd');
    Route::get('cara/edit/{id}', [CaraBoookController::class, 'edit'])->name('caraedit');
    Route::post('cara/update/{id}', [CaraBoookController::class, 'update'])->name('caraupdate');
    Route::post('cara/delete/{id}', [CaraBoookController::class, 'destroy'])->name('caradelete');

    Route::get('datalink', [LinkController::class, 'index'])->name('datalink');
    Route::post('linkadd', [LinkController::class, 'store'])->name('linkadd');
    Route::get('link/edit/{id}', [LinkController::class, 'edit'])->name('linkedit');
    Route::post('link/update/{id}', [LinkController::class, 'update'])->name('linkupdate');
    Route::post('link/delete/{id}', [LinkController::class, 'destroy'])->name('linkdel');

    Route::get('datasocial', [SocialController::class, 'index'])->name('datasocial');
    Route::post('socialadd', [SocialController::class, 'store'])->name('socialadd');
    Route::get('social/edit/{id}', [SocialController::class, 'edit'])->name('socialedit');
    Route::post('social/update/{id}', [SocialController::class, 'update'])->name('socialupdate');
    Route::post('social/delete/{id}', [SocialController::class, 'destroy'])->name('socialdel');

    Route::get('checkin', [TransaksiController::class, 'index'])->name('checkin');
    Route::post('checkinselesai/{id}', [TransaksiController::class, 'update'])->name('checkinselesai');


    Route::get('riwayat', [TransaksiController::class, 'riwayat'])->name('riwayat');
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan');


    Route::get('setting', [SettingController::class, 'index'])->name('setting');
    Route::get('settingkouta', [SettingKoutaController::class, 'index'])->name('kouta');

    // Route::get('/dashboard-overview-1-page', [PageController::class, 'dashboardOverview1'])->name('dashboard-overview-1');
    // Route::get('dashboard-overview-2-page', [PageController::class, 'dashboardOverview2'])->name('dashboard-overview-2');
    // Route::get('dashboard-overview-3-page', [PageController::class, 'dashboardOverview3'])->name('dashboard-overview-3');
    // Route::get('inbox-page', [PageController::class, 'inbox'])->name('inbox');
    // Route::get('file-manager-page', [PageController::class, 'fileManager'])->name('file-manager');
    // Route::get('point-of-sale-page', [PageController::class, 'pointOfSale'])->name('point-of-sale');
    // Route::get('chat-page', [PageController::class, 'chat'])->name('chat');
    // Route::get('post-page', [PageController::class, 'post'])->name('post');
    // Route::get('calendar-page', [PageController::class, 'calendar'])->name('calendar');
    // Route::get('crud-data-list-page', [PageController::class, 'crudDataList'])->name('crud-data-list');
    // Route::get('crud-form-page', [PageController::class, 'crudForm'])->name('crud-form');
    // Route::get('users-layout-1-page', [PageController::class, 'usersLayout1'])->name('users-layout-1');
    // Route::get('users-layout-2-page', [PageController::class, 'usersLayout2'])->name('users-layout-2');
    // Route::get('users-layout-3-page', [PageController::class, 'usersLayout3'])->name('users-layout-3');
    // Route::get('profile-overview-1-page', [PageController::class, 'profileOverview1'])->name('profile-overview-1');
    // Route::get('profile-overview-2-page', [PageController::class, 'profileOverview2'])->name('profile-overview-2');
    // Route::get('profile-overview-3-page', [PageController::class, 'profileOverview3'])->name('profile-overview-3');
    // Route::get('wizard-layout-1-page', [PageController::class, 'wizardLayout1'])->name('wizard-layout-1');
    // Route::get('wizard-layout-2-page', [PageController::class, 'wizardLayout2'])->name('wizard-layout-2');
    // Route::get('wizard-layout-3-page', [PageController::class, 'wizardLayout3'])->name('wizard-layout-3');
    // Route::get('blog-layout-1-page', [PageController::class, 'blogLayout1'])->name('blog-layout-1');
    // Route::get('blog-layout-2-page', [PageController::class, 'blogLayout2'])->name('blog-layout-2');
    // Route::get('blog-layout-3-page', [PageController::class, 'blogLayout3'])->name('blog-layout-3');
    // Route::get('pricing-layout-1-page', [PageController::class, 'pricingLayout1'])->name('pricing-layout-1');
    // Route::get('pricing-layout-2-page', [PageController::class, 'pricingLayout2'])->name('pricing-layout-2');
    // Route::get('invoice-layout-1-page', [PageController::class, 'invoiceLayout1'])->name('invoice-layout-1');
    // Route::get('invoice-layout-2-page', [PageController::class, 'invoiceLayout2'])->name('invoice-layout-2');
    // Route::get('faq-layout-1-page', [PageController::class, 'faqLayout1'])->name('faq-layout-1');
    // Route::get('faq-layout-2-page', [PageController::class, 'faqLayout2'])->name('faq-layout-2');
    // Route::get('faq-layout-3-page', [PageController::class, 'faqLayout3'])->name('faq-layout-3');
    // Route::get('login-page', [PageController::class, 'login'])->name('login');
    // Route::get('register-page', [PageController::class, 'register'])->name('register');
    // Route::get('error-page-page', [PageController::class, 'errorPage'])->name('error-page');
    // Route::get('update-profile-page', [PageController::class, 'updateProfile'])->name('update-profile');
    // Route::get('change-password-page', [PageController::class, 'changePassword'])->name('change-password');
    // Route::get('regular-table-page', [PageController::class, 'regularTable'])->name('regular-table');
    // Route::get('tabulator-page', [PageController::class, 'tabulator'])->name('tabulator');
    // Route::get('modal-page', [PageController::class, 'modal'])->name('modal');
    // Route::get('slide-over-page', [PageController::class, 'slideOver'])->name('slide-over');
    // Route::get('notification-page', [PageController::class, 'notification'])->name('notification');
    // Route::get('accordion-page', [PageController::class, 'accordion'])->name('accordion');
    // Route::get('button-page', [PageController::class, 'button'])->name('button');
    // Route::get('alert-page', [PageController::class, 'alert'])->name('alert');
    // Route::get('progress-bar-page', [PageController::class, 'progressBar'])->name('progress-bar');
    // Route::get('tooltip-page', [PageController::class, 'tooltip'])->name('tooltip');
    // Route::get('dropdown-page', [PageController::class, 'dropdown'])->name('dropdown');
    // Route::get('typography-page', [PageController::class, 'typography'])->name('typography');
    // Route::get('icon-page', [PageController::class, 'icon'])->name('icon');
    // Route::get('loading-icon-page', [PageController::class, 'loadingIcon'])->name('loading-icon');
    // Route::get('regular-form-page', [PageController::class, 'regularForm'])->name('regular-form');
    // Route::get('datepicker-page', [PageController::class, 'datepicker'])->name('datepicker');
    // Route::get('tail-select-page', [PageController::class, 'tailSelect'])->name('tail-select');
    // Route::get('file-upload-page', [PageController::class, 'fileUpload'])->name('file-upload');
    // Route::get('wysiwyg-editor-page', [PageController::class, 'wysiwygEditor'])->name('wysiwyg-editor');
    // Route::get('validation-page', [PageController::class, 'validation'])->name('validation');
    // Route::get('chart-page', [PageController::class, 'chart'])->name('chart');
    // Route::get('slider-page', [PageController::class, 'slider'])->name('slider');
    // Route::get('image-zoom-page', [PageController::class, 'imageZoom'])->name('image-zoom');
});
