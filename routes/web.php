<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;
use App\Http\Middleware\AuthenticateDirectAcess;
use App\Models\Posts;
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
/*
Route::group(['middleware' => 'App\Http\Middleware\AuthenticateDirectAcess'], function()
    {
        Route::match(['get', 'post'], '/dashboard', 'DashboardController@index')->name('dashboard');
        
    });*/
    Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);


//facebook login
Route::get('login/{provider}',[LoginController::class,'redirectToProvider']);//->name('login/{provider}');
Route::get('login/{provider}/callback',[LoginController::class,'handleProviderCallback']);//->name('login/{provider}/callback');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

//Posts Routes
Route::get('/addpost',[PostController::class,'index'])->name('addpost');
//Route::get('/posts/create',[PostController::class,'create'])->name('createpost');

Route::post('/addpost',[PostController::class,'store']);

Route::get('/posts',[PostController::class,'show'])->name('posts');
//delete post
Route::delete('/posts/{post:id}/delete',[PostController::class,'destroy'])->name('deletepost');

Route::get('/Myposts',[PostController::class,'Myposts'])->name('Myposts');

//likes And Unlikes
//here {post} is model name we access it from store function parameter it give whole post table
Route::post('/posts/{post:id}/likes',[PostLikeController::class,'store'])->name('posts.likes');
//unlike
Route::delete('/posts/{post:id}/likes',[PostLikeController::class,'destroy'])->name('posts.likes');




//Shopping Products Routes
Route::get('shop', [CartController::class,'shop'])->name('shop');
Route::get('cart', [CartController::class,'cart'])->name('cart.index');
Route::post('/add', [CartController::class,'add'])->name('cart.store');
Route::post('/update', [CartController::class,'update'])->name('cart.update');
Route::post('/remove', [CartController::class,'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class,'clear'])->name('cart.clear');
Route::get('/checkout', [CartController::class,'checkout'])->name('cart.checkout');
//Products routes
Route::get('/addproduct', [ProductsController::class,'index'])->name('addproduct');
Route::post('/addproduct', [ProductsController::class,'store']);
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('alert/{AlertType}','sweetalertController@alert')->name('alert');



