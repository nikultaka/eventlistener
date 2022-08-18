<?php

use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\Frontend\Auth\LoginController::class, 'index']);

Route::get('/login', [App\Http\Controllers\Frontend\Auth\LoginController::class, 'index'])->name('user-login');
Route::post('/login/proccess', [App\Http\Controllers\Frontend\Auth\LoginController::class, 'loginProccess'])->name('login-proccess');

Route::get('/user-logout', [App\Http\Controllers\Frontend\Auth\LoginController::class, 'logout'])->name('logout-user');

Route::group(['middleware' => ['Isuser']], function () {
    Route::get('/profile', [App\Http\Controllers\Frontend\UserController::class, 'index'])->name('user-profile');
    Route::post('/profile/save-profile', [App\Http\Controllers\Frontend\UserController::class, 'save_profile'])->name('user-profile-proccess');
    Route::post('/profile/feedback', [App\Http\Controllers\Frontend\UserController::class, 'feedback'])->name('user-feedback');

});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout-admin', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout-admin');

Route::group(['prefix' => ADMIN], function () {

    Route::get('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'index'])->name('admin-login');
    Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'index']);
    Route::post('/login/proccess', [App\Http\Controllers\Admin\Auth\LoginController::class, 'loginProccess'])->name('admin-login-proccess');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashboard');


        // discover
        Route::get('/event', [App\Http\Controllers\Admin\EventController::class, 'index'])->name('admin-event');
        Route::post('/event/add', [App\Http\Controllers\Admin\EventController::class, 'add'])->name('admin-event-add');
        Route::post('/event/datatable', [App\Http\Controllers\Admin\EventController::class, 'datatable'])->name('admin-event-datatable');
        Route::post('/event/delete', [App\Http\Controllers\Admin\EventController::class, 'delete'])->name('admin-event-delete');
        Route::post('/event/edit', [App\Http\Controllers\Admin\EventController::class, 'edit'])->name('admin-event-edit');

       
    });
});
