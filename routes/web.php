<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\PerjalananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PemesanController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\InterfaceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\RentController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginuserController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PagenotController;
use App\Http\Controllers\UserController;

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










// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[BerandaController::class, 'index']);
Route::get('/car',[BerandaController::class, 'car']);
Route::get('/about',[BerandaController::class, 'about']);
Route::get('/contact',[BerandaController::class, 'contact']);



Route::group(['middleware' => ['auth', 'peran:admin-manager-staff']], function(){

Route::get('/notfound', [PagenotController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/tbl_merk', [MerkController::class, 'index']);
Route::get('/tbl_merk/create', [MerkController::class, 'create']);
Route::post('/tbl_merk/store', [MerkController::class, 'store']);
Route::get('/tbl_merk/delete/{id}', [MerkController::class, 'delete']);
Route::get('/tbl_merk/edit/{id}', [MerkController::class, 'edit']);
Route::post('/tbl_merk/update/{id}', [MerkController::class, 'update']);
    


//tabel mobil
Route::get('/tbl_mobil', [MobilController::class, 'index']);
Route::get('/tbl_mobil/create', [MobilController::class, 'create']);
Route::post('/tbl_mobil/store', [MobilController::class, 'store']);
Route::get('/tbl_mobil/show/{id}', [MobilController::class, 'show']);
Route::get('/tbl_mobil/delete/{id}', [MobilController::class, 'destroy']);
Route::post('/tbl_mobil/update/{id}', [MobilController::class, 'update']);
Route::get('/tbl_mobil/edit/{id}', [MobilController::class, 'edit']);

//tabel generate pdf
Route::get('/generate-pdf/{orderId}', [PesananController::class, 'generatePDF'])->name('generate-pdf');

//tabel jenis bayar
Route::get('/jenis', [JenisController::class, 'index']);
Route::get('/jenis/create', [JenisController::class, 'create']);
Route::post('/jenis/store', [JenisController::class, 'store']);
Route::get('/jenis/delete/{id}', [JenisController::class, 'delete']);
Route::get('/jenis/edit/{id}', [JenisController::class, 'edit']);
Route::post('/jenis/update/{id}', [JenisController::class, 'update']);

//tabel pesanan
Route::get('/pesanan', [PesananController::class, 'index']);
Route::get('/pesanan/create', [PesananController::class, 'create']);
Route::post('/pesanan/store', [PesananController::class, 'store']);

Route::get('/pesanan/show/{id}', [PesananController::class, 'show']);
Route::get('/pesanan/delete/{id}', [PesananController::class, 'destroy']);

Route::post('/pesanan/update/{id}', [PesananController::class, 'update']);
Route::get('/pesanan/edit/{id}', [PesananController::class, 'edit']);

Route::resource('perjalanan', PerjalananController::class);

//dengan resource

Route::resource('email', EmailController::class);
Route::delete('/email/{id}', 'EmailController@destroy')->name('email.destroy');

// tabel pemesan
Route::get('/pemesan', [PemesanController::class, 'index']);
Route::get('/pemesan/create', [PemesanController::class, 'create']);
Route::post('/pemesan/store', [PemesanController::class, 'store']);
Route::get('/pemesan/show/{id}', [PemesanController::class, 'show']);
Route::get('/pemesan/delete/{id}', [PemesanController::class, 'destroy']);
Route::post('/pemesan/update/{id}', [PemesanController::class, 'update']);
Route::get('/pemesan/edit/{id}', [PemesanController::class, 'edit']);
Route::resource('pemesan', PemesanController::class);
// Route::get('/pemesan/delete/{id}', [PemesanController::class, 'destroy']);
// Route::post('/pemesan/update/{id}', [PemesanController::class, 'update']);
// Route::get('/pemesan/edit/{id}', [PemesanController::class, 'edit']);

 




Route::get('/user', [UserController::class, 'index']);
Route::get('/profile', [UserController::class, 'show']);
Route::patch('/profile/edit/{id}', [UserController::class, 'update']);

});

// tabel rent dari user
Route::get('/rent/create', [RentController::class, 'create']);
Route::post('/rent/store', [RentController::class, 'store']);
Route::resource('rent', RentController::class);

Route::delete('/akun/{id}', [AkunController::class, 'destroy'])->name('akun.destroy');
Route::resource('akun', AkunController::class);


// tabel rent
Route::resource('midtrans', RentController::class);



//interface
// Route::get('/interface', [InterfaceController::class, 'index']);
// Route::get('/listing', [InterfaceController::class, 'list']);
// Route::get('/blog', [InterfaceController::class, 'blog']);
// Route::get('/about', [InterfaceController::class, 'about']);
// Route::get('/contact', [InterfaceController::class, 'contact']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
