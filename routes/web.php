<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController,BlogController,HomeController,CommentController};


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

Route::get('/', function () {

});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//Route::middleware('guest')->group(function (){
    Route::get('/',[HomeController::class,'index'])->name('home.index');
//});
Route::get('checklogin',[HomeController::class,'checkLogin'])->name('checklogin');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('blogs', BlogController::class);
    Route::get('/dashboard',  [DashboardController::class, 'index'])->name('dashboard');
    Route::post('comments', [CommentController::class, 'store'])->name('comments.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\CommentController;
//use Illuminate\Support\Facades\Route;

//Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
//Route::resource('blogs', BlogController::class);
//Route::post('blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');
//Route::post('logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
//    ->name('logout');
//Auth::routes();


