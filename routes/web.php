<?php

use App\Http\Middleware\CekLevel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Admin\DashboardMasukController;
use App\Http\Controllers\Pasien\PasienBookingController;
use App\Http\Controllers\Pasien\PasienRiwayatController;
use App\Http\Controllers\Admin\DashboardDokterController;
use App\Http\Controllers\Admin\DashboardKeluarController;
use App\Http\Controllers\Admin\DashboardPasienController;
use App\Http\Controllers\Pemilik\PemilikDokterController;
use App\Http\Controllers\Pemilik\PemilikPasienController;
use App\Http\Controllers\Admin\DashboardBookingController;
use App\Http\Controllers\Admin\DashboardProductController;
use App\Http\Controllers\Admin\DashboardServiceController;
use App\Http\Controllers\Pemilik\PemilikBookingController;
use App\Http\Controllers\Pemilik\PemilikProductController;
use App\Http\Controllers\Pemilik\PemilikServiceController;
use App\Http\Controllers\Dokter\DokterDetailBookingController;

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

Route::get('/', function () {
    return view('/pasien/home');
});

Route::get('/home', function () {
    return view('/frontend/home');
});

Route::get('/dokter/index', function () {
    return view('/pasien/dokter/index');
});

//Route::resource('/booking', TransaksiFrontendController::class);
Route::get('/layanan/index', function () {
    return view('/frontend/layanan/index');
});
Route::get('/antrian/index', function () {
    return view('/frontend/antrian/index');
});

//Auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/register', [LoginController::class, 'register']);
Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('/logout', [LoginController::class, 'logout']);

//Pasien
Route::group(['middleware' => [CekLevel::class . ':Pasien']], function () {
    Route::resource('booking', PasienBookingController::class);
    Route::resource('my-booking',PasienRiwayatController::class);

});

// Admin dan Dokter
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::group(['middleware' => [CekLevel::class . ':Admin']], function () {
    Route::resource('data-pasien', DashboardPasienController::class);
    Route::resource('data-dokter', DashboardDokterController::class);
    Route::resource('data-services', DashboardServiceController::class);
    //Route::resource('data-masuk', DashboardMasukController::class);
    Route::resource('data-product', DashboardProductController::class);
    //Route::resource('data-keluar', DashboardKeluarController::class);
    Route::resource('data-booking', DashboardBookingController::class);
    
    
    });

    Route::group(['middleware' => [CekLevel::class . ':Dokter']], function () {

        Route::resource('booking-detail', DokterDetailBookingController::class);
        // Route::resource('profile-dokter', DokterProfileController::class);
        // Route::get('/cetak-booking-dokter', [BarbermanCetakController::class, 'cetakbookingbarberman'])->name('/cetak-booking-barberman');
    });

    /* Route::group(['middleware' => [CekLevel::class . ':Pemilik']], function () {

        Route::resource('data-pasien', PemilikPasienController::class);
        Route::resource('data-dokter', PemilikDokterController::class);
        Route::resource('data-services', PemilikServiceController::class);
        Route::resource('data-product', PemilikProductController::class);
        Route::resource('data-booking', PemilikBookingController::class);
        // Route::resource('profile-dokter', DokterProfileController::class);
        // Route::get('/cetak-booking-dokter', [BarbermanCetakController::class, 'cetakbookingbarberman'])->name('/cetak-booking-barberman');
    }); */
});

