<?php

use App\Http\Controllers\{
    PropertyController,
    CustomerController,
    ContractController
};

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard');
    Route::resources([
        'properties' => PropertyController::class,
        'customers' => CustomerController::class,
        'contracts' => ContractController::class,
    ]);
    Route::post('contracts/preview', [ContractController::class, 'preview'])->name('contracts.preview');
    Route::post('properties/categories', [PropertyController::class, 'categories'])->name('properties.categories');
});

require __DIR__.'/auth.php';
