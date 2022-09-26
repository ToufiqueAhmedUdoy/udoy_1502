<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AuthController;
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
    return view('welcome');
});

Route::get('about-us', [AboutController::class, 'about']);

Route::get('contact-us',function(){
    return view('contact');
});

Route::get('business/{news}', function($x){
    return view('business', ['cat'=>$x]);
});

Route::get('create-person', [PersonController::class, 'create']);
Route::post('store-person', [PersonController::class, 'store']);

Route::get('persons', [PersonController::class, 'all']);

Route::get('edit-person/{pid}', [PersonController::class, 'edit']);
Route::post('update-person/{pid}', [PersonController::class, 'update']);

Route::get('delete-person/{pid}', [PersonController::class, 'delete']);

Route::get('home', [WebsiteController::class, 'home']);
Route::get('about', [WebsiteController::class, 'about']);
Route::get('contact', [WebsiteController::class, 'contact']);


Route::get('register', [AuthController::class, 'register']);
Route::post('store-register', [AuthController::class, 'storeRegister']);
Route::get('login', [AuthController::class, 'login']);
Route::post('store-login', [AuthController::class, 'storeLogin']);

Route::get('dashboard', [AuthController::class, 'dashboard']);