<?php

use App\Http\Controllers\InventoryManagementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web RrefuseReceivedProductoutes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/',
    function () {
        return view('auth.login');
    }
);

//Route::get('/', function () {return view('layouts.template');});


Route::get(
    '/clear',
    function () {
        Artisan::call('config:cache');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('clear-compiled');
        Artisan::call('optimize');


        return "Cleared!";
    }
);

Auth::routes();

Route::get('centers/acceptOrRefuseReceivedProduct/{echangedSendId}/{acceptanceStatus}', [App\Http\Controllers\InventoryManagementController::class, 'acceptOrRefuseReceivedProduct'])->name('centers.acceptOrRefuseReceivedProduct');


Route::get('centers/receivedProduct', [App\Http\Controllers\InventoryManagementController::class, 'receivedProduct'])->name('centers.receivedProduct');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('centers', InventoryManagementController::class);
Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);

Route::get('centers/inventory/{id}', [App\Http\Controllers\InventoryManagementController::class, 'inventory'])->name('centers.inventory');
Route::get('centers/sendProduct/{id}', [App\Http\Controllers\InventoryManagementController::class, 'sendProduct'])->name('centers.sendProduct');
Route::post('centers/postSendProduct', [App\Http\Controllers\InventoryManagementController::class, 'postSendProduct'])->name('centers.postSendProduct');
