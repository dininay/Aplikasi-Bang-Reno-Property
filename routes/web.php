<?php

use App\Http\Controllers\SimulasiBiayaController;
use App\Http\Middleware\LogActivity;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\TentangController;
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
// use App\Http\Controllers\HomeController; 
// Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/', function () {
        $tentang = DB::table('tentang')->get();
        $keunggulan = DB::table('keunggulan')->get();
        $jasa = DB::table('jasa')->get();
        $kontak = DB::table('kontak')->get();
        $portofolio = DB::table('portofolio')->get();
        $rating = DB::table('rating')->get();
        $artikel = DB::table('artikel')->get();
        return view('home.index',[
        'tentang' => $tentang,
        'keunggulan' => $keunggulan,
        'jasa' => $jasa,
        'kontak' => $kontak,
        'portofolio' => $portofolio,
        'rating' => $rating,
        'artikel' => $artikel
        ]);
    });
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/tentang', [HomeController::class, 'tentangView'])->name('tentang');
    Route::get('/keunggulan', [HomeController::class, 'keunggulanView'])->name('keunggulan');
    Route::get('/rating', [HomeController::class, 'ratingView'])->name('rating');
    Route::get('/jasa', [HomeController::class, 'jasaView'])->name('jasa');
    Route::get('/kontak', [HomeController::class, 'kontakView'])->name('kontak');
    Route::get('/portofolio', [HomeController::class, 'portofolioView'])->name('portofolio');
    Route::get('/artikel', [HomeController::class, 'artikelView'])->name('artikel');
    Route::get('/artikel/{id}', [HomeController::class, 'showArtikel']);
    Route::get('/portofolio/{id}', [HomeController::class, 'showPortofolio']);
    Route::get('/jasa/{id}', [HomeController::class, 'showJasa']);

    Route::post('/submit-kerjasama', [KerjasamaController::class, 'simpanKerjasama']);
    // Route::get('/kontak', function () {
    //     return view('kontak');
    // })->name('kontak.view');

    // Route::get('/kontak', [KontakController::class, 'show'])->name('kontak');

    // Route::post('/hitung-biaya', [SimulasiBiayaController::class, 'hitungBiaya'])->name('hitung.biaya');
    // Route::post('/hitung-biaya', 'SimulasiBiayaController@hitungBiaya')->middleware('log.activity');
    Route::post('/hitung-biaya', [SimulasiBiayaController::class, 'hitungBiaya'])
    ->middleware('log.activity')
    ->name('hitung.biaya');
    
    // Route::post('/hitung-biaya', [SimulasiBiayaController::class, 'hitungBiaya'])
    // ->name('hitung.biaya')
    // ->middleware(['log.hitung.biaya.activity']);

    Route::get('/tampil-perhitungan', [SimulasiBiayaController::class, 'tampilPerhitungan'])->name('tampil.perhitungan');

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Rute-rute admin di sini
    Route::get('/admin/listuser', [AdminController::class, 'listuser'])->name('admin.listuser');
    Route::get('/admin/manageuser/{id}', [AdminController::class, 'manageuser'])->name('admin.manageuser');
    Route::post('/admin/postmanageuser/{id}', [AdminController::class, 'postmanageuser'])->name('admin.postmanageuser');
});

    Route::get('/login', 'AuthController@login')->name('login');
    Route::get('/register', 'AuthController@register')->name('register');
    Route::get('/logout', 'AuthController@logout');
    Route::post('/postLogin', 'AuthController@postLogin');
    Route::post('/postRegister', 'AuthController@postRegister');

    Route::group(['middleware' => []], function () {
    Route::get('/admin/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/get-updated-totals', 'DashboardController@getUpdatedTotals');
    Route::get('/get-updated-totals/{id}', 'AdminController@getUpdatedTotals');


    Route::get('/admin/tentang', 'TentangController@index')->name ('admin.tentang.index');
    Route::post('/admin/tentang/add', 'TentangController@add');
    Route::get('/admin/tentang/{id}/delete', 'TentangController@delete');
    Route::get('/admin/tentang/{id}/edit', 'TentangController@edit');
    Route::post('/admin/tentang/{id}/update', 'TentangController@update');

    Route::get('/admin/keunggulan', 'KeunggulanController@index')->name ('admin.keunggulan.index');
    Route::post('/admin/keunggulan/add', 'KeunggulanController@add');
    Route::get('/admin/keunggulan/{id}/delete', 'KeunggulanController@delete');
    Route::get('/admin/keunggulan/{id}/edit', 'KeunggulanController@edit');
    Route::post('/admin/keunggulan/{id}/update', 'KeunggulanController@update');

    Route::get('/admin/jasa', 'JasaController@index')->name ('admin.jasa.index');
    Route::post('/admin/jasa/add', 'JasaController@add');
    Route::get('/admin/jasa/{id}/delete', 'JasaController@delete');
    Route::get('/admin/jasa/{id}/edit', 'JasaController@edit');
    Route::post('/admin/jasa/{id}/update', 'JasaController@update');

    Route::get('/admin/rating', 'RatingController@index')->name ('admin.rating.index');
    Route::post('/admin/rating/add', 'RatingController@add');
    Route::get('/admin/rating/{id}/delete', 'RatingController@delete');
    Route::get('/admin/rating/{id}/edit', 'RatingController@edit');
    Route::post('/admin/rating/{id}/update', 'RatingController@update');

    Route::get('/admin/kontak', 'KontakController@index')->name ('admin.kontak.index');
    Route::post('/admin/kontak/add', 'KontakController@add');
    Route::get('/admin/kontak/{id}/delete', 'KontakController@delete');
    Route::get('/admin/kontak/{id}/edit', 'KontakController@edit');
    Route::post('/admin/kontak/{id}/update', 'KontakController@update');

    Route::get('/admin/portofolio', 'PortofolioController@index')->name ('admin.portofolio.index');
    Route::post('/admin/portofolio/add', 'PortofolioController@add');
    Route::get('/admin/portofolio/{id}/delete', 'PortofolioController@delete');
    Route::get('/admin/portofolio/{id}/edit', 'PortofolioController@edit');
    Route::post('/admin/portofolio/{id}/update', 'PortofolioController@update');
    
    Route::get('/admin/artikel', 'ArtikelController@index')->name ('admin.artikel.index');
    Route::post('/admin/artikel/add', 'ArtikelController@add');
    Route::get('/admin/artikel/{id}/delete', 'ArtikelController@delete');
    Route::get('/admin/artikel/{id}/edit', 'ArtikelController@edit');
    Route::post('/admin/artikel/{id}/update', 'ArtikelController@update');

    Route::get('/admin/kerjasama', 'KerjasamaController@index')->name ('admin.kerjasama.index');
    Route::post('/admin/kerjasama/add', 'KerjasamaController@add');
    Route::get('/admin/kerjasama/{id}/delete', 'KerjasamaController@delete');
    Route::get('/admin/kerjasama/{id}/edit', 'KerjasamaController@edit');
    Route::post('/admin/kerjasama/{id}/update', 'KerjasamaController@update');

    Route::get('/admin/logactivity', 'SimulasiBiayaController@index')->name ('admin.logactivity.index');

    Route::get('/user/changepassword', 'UserController@changepassword');
    Route::post('/user/postchangepassword', 'UserController@postchangepassword');
});

Route::group(['middleware' => ['auth', 'roleCheck:admin']], function () {
    Route::get('/admin/listuser', 'AdminController@listuser');
    Route::get('/admin/user/{id}/manage', 'AdminController@manageuser');
    Route::post('/admin/user/{id}/postManage', 'AdminController@postmanageuser');
});
