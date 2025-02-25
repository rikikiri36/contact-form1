<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/create', [ContactController::class, 'create']);
Route::post('/', [ContactController::class, 'back']);
Route::get('/admin', [AdminController::class, 'admin']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
Route::get('/admin/search', [AdminController::class, 'search']);