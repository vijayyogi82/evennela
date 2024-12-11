<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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
})->name('home');

Route::post('login',[AdminController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        
        // ====== Admin Authentication =======
        Route::post('logout', 'logout')->name('logout');
        Route::get('admin/dashboard', 'adminDashboard')->name('admin.dashbaord');
        Route::get('/admin/calendar-data', 'dashboardCalendar')->name('calendar.data');
        Route::get('/admin/orders-by-date', 'getOrdersByDate')->name('orders.byDate');
        
        // ====== Employee ========
        Route::get('users', 'getAllUsers')->name('users.index');
        Route::get('user/creade', 'userCreate')->name('user.create');
        Route::get('user/show/{id}', 'getUserById')->name('user.show');
        Route::get('user/edit/{id}', 'userEdit')->name('user.edit');
        Route::post('user/update/{id}', 'userUpdate')->name('user.update');
        Route::delete('user/delete/{id}', 'userDelete')->name('user.delete');
        Route::put('user/profile', 'updateProfile')->name('user.profile.update');
        
        // ====== status ========
        Route::get('status', 'Status')->name('status.index');
        Route::post('status-add', 'statusSave')->name('status.create');
        Route::post('status-edit/{id}', 'statusEdit')->name('status.edit');
        Route::post('status-update/{id}', 'statusUpdate')->name('status.update');
        Route::delete('status/delete/{id}', 'statusDelete')->name('status.delete');
        
        // ====== Roles ========
        Route::get('roles', 'roles')->name('role.index');
        Route::post('role-add', 'roleAdd')->name('role.create');
        Route::post('role/edit/{id}', 'roleEdit')->name('role.edit');
        Route::post('role/update/{id}', 'roleUpdate')->name('role.update');
        Route::delete('role/delete/{id}', 'roleDelete')->name('role.delete');
    });
});

