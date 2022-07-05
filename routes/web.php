<?php

use App\Http\Controllers\{
    ActivityController,
    PropertyController,
    CustomerController,
    ContractController,
    MediaController,
    UserController
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
        'users'     => UserController::class,
        'activities'=> ActivityController::class,
        'users'     => UserController::class,
        'roles'     => RoleController::class,
        'medias'    => MediaController::class
    ]);
    Route::post('contracts/preview', [ContractController::class, 'preview'])->name('contracts.preview');
    Route::post('properties/categories', [PropertyController::class, 'categories'])->name('properties.categories');
    Route::post('properties/search', [PropertyController::class, 'search'])->name('properties.search');
    Route::post('medias/sort', [MediaController::class, 'sort'])->name('medias.sort');
});

require __DIR__.'/auth.php';
