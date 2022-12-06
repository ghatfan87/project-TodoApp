<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\LoginController;
use Faker\Guesser\Name;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Events\Login;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
route::middleware('isGuest')->group(function () {
Route::get('/',
[TodoController::class, 'index']
)->name('login');
Route::get('/register',
[TodoController::class, 'regist']
)->name('register');
Route::post('/register',
[RegisterController::class, 'register']);
Route::post('/login',
[LoginController::class, 'login'])->name('login.post');
});


Route::get('/logout',
[TodoController::class, 'logout']
)->name('logout');


route::middleware('isLogin')->group(function () {
Route::get('/dashboard',
[TodoController::class, 'dashboard']
)->name('dashboard');
Route::get('/create', [TodoController::class, 'create']
)->name('create');
Route::post('/store',
[TodoController::class, 'store']
)->name('store');
Route::get('/data',
[TodoController::class, 'data']
)->name('data');
// path yg ada {} artinya path dinamis. path dinamis merupakan path yang datanya diisi dari database. path dinamis ini nantinya akan berubah-ubah tergantung data yang diberikan. apabila dalam route-nya ada path dinamis maka nantinya data path dinamis ini dapat diakses oleh controller melalui parameter di function nya
Route::get('/edit/{id}',
[TodoController::class, 'edit']
)->name('edit');
// method route buat update data itu pake patch/put
Route::patch('/update/{id}',
[TodoController::class, 'update']
)->name('update');
// method route buat delete data di database itu pake delete
Route::delete('/destroy/{id}',
[TodoController::class, 'destroy']
)->name('destroy');
Route::patch('/complated/{id}',
[TodoController::class, 'updateToComplated']
)->name('update-complated');
});