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


// Menampilkan form login
Route::get('/user/interface', [LoginUserController::class, 'showLoginFormUser'])->name('admin.user');

Route::get('/user/login', [LoginUserController::class, 'showLoginForm'])->name('admin.login');


// Proses login
Route::post('/user/process-login', [LoginUserController::class, 'login'])->name('process.login');

// Logout
// Route::post('/user/logout', [LoginUserController::class, 'logout'])->name('admin.logout');
Route::get('/user/logout', [LoginUserController::class, 'logout'])->name('admin.logout');





// Route::get('/', function () {
//     return redirect('/interface');
// });

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => ['auth', 'peran:admin-manager-staff-pelanggan']], function(){


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

Route::resource('pemesan', PemesanController::class);

});












Route::resource('rent', RentController::class);

Route::delete('/akun/{id}', [AkunController::class, 'destroy'])->name('akun.destroy');
Route::resource('akun', AkunController::class);



//interface
Route::get('/interface', [InterfaceController::class, 'index']);
Route::get('/listing', [InterfaceController::class, 'list']);
Route::get('/blog', [InterfaceController::class, 'blog']);
Route::get('/about', [InterfaceController::class, 'about']);
Route::get('/contact', [InterfaceController::class, 'contact']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
