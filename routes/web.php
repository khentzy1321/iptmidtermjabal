<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SiteController;

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


Route::get('/', function(){
    return view('/welcome');
});
Route::get('/log', [AuthController::class, 'loginForm'])->name('login');
Route::post('/log', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('/dashboard');
})->middleware('auth');
Route::group(['middleware'=>'auth'], function(){
        Route::get('/index', [EmployeeController::class, 'index']);
        Route::get('/edit/{emplo}', [EmployeeController::class, 'edit']);
        Route::get('/delete/{emplo}', [EmployeeController::class, 'destroy']);
        Route::get('/logs', [SiteController::class, 'logs']);

        Route::get('/posts', [PostController::class, 'showPosts']);
        Route::get('/categories/{category}', [PostController::class, 'showPostFromCategory']);
        Route::get('/authors', [PostController::class, 'showAuthors']);
        Route::get('/authors/{id}', [PostController::class, 'authorPostFromCategory']);
        Route::get('/newpost', [PostController::class, 'newPost']);
        Route::post('/newpost', [PostController::class, 'storePost']);

});

