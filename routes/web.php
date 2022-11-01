<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\DashboardController;
use App\http\Controllers\mastersiswaController;
use App\http\Controllers\masterkontakcontroller;
use App\http\Controllers\masterprojectController;
use App\http\Controllers\loginController;


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





//guest
Route::middleware('guest')->group(function(){
    Route::get('login', [loginController::class, 'index'])->name('login');
    Route::post('login', [loginController::class, 'authenticate']);
   

        Route::get('/', function () {
        return view('welcome');
    });


    Route::get('/admin', function () {
        return view('layout.admin');
    });

    Route::get('/home', function () {
        return view('home');
    });


    Route::get('/about', function () {
        return view('about');
    });

    Route::get('/project', function () {
        return view('project');
    });

    Route::get('/contact', function () {
        return view('contact');
    });

    Route::get('/TambahProject', function () {
        return view('TambahProject');
    });

});




//controller
Route::middleware('auth')->group(function(){
    Route::resource('/mastersiswa', mastersiswaController::class)->middleware('auth');
    Route::get('mastersiswa/{id_siswa}/hapus', [mastersiswaController::class, 'hapus'])->name('mastersiswa.hapus');
    Route::resource('/masterkontak', masterkontakController::class);
    Route::get('/masterkontak/create/{id}', [masterkontakController::class, 'create']);
    Route::get('/tambahjenis', [masterkontakController::class, 'tambahjenisview']);
    Route::post('/tambahjenis/store', [masterkontakController::class, 'tambahjenis']);
    Route::post('/masterkontak/store/{id}', [masterkontakController::class, 'store']);
    Route::post('/masterkontak/hapus/{id}', [masterkontakController::class, 'hapus']);
    Route::get('masterproject/create/{id_siswa}', [masterprojectController::class, 'tambah'])->name('masterproject.tambah');
    Route::resource('/masterproject', masterprojectController::class);
    Route::get('masterproject/{id_siswa}/hapus', [masterprojectController::class, 'hapus'])->name('masterproject.hapus');
    Route::resource('/dashboard', DashboardController::class);
    Route::post('logout', [loginController::class, 'logout']);
   


});

