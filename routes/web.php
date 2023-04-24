<?php

use App\Http\Controllers\Customer\CreateCustomerController;
use App\Http\Controllers\Customer\GetCurrentCustomerController;
use App\Http\Controllers\Customer\LogoutCustomer;
use App\Http\Controllers\Game\GetGameHistoryController;
use App\Http\Controllers\Game\RunGameController;
use App\Http\Controllers\Link\CreateLinkController;
use App\Http\Controllers\Link\DeactivateLinkController;
use App\Http\Controllers\Link\GetLinkById;
use App\Http\Controllers\Link\GetLinksByCustomerController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('customer')->as('customer.')->group(function () {
    Route::get('current', GetCurrentCustomerController::class)->name('current');
    Route::post('logout', LogoutCustomer::class)->name('logout');
    Route::post('create', CreateCustomerController::class)->name('create');
});

Route::prefix('link')->as('link.')->group(function () {
    Route::get('index', GetLinksByCustomerController::class)->name('index');
    Route::get('show/{linkId}', GetLinkById::class)->name('show');
    Route::post('create', CreateLinkController::class)->name('create');
    Route::post('{linkId}/deactivate', DeactivateLinkController::class)->name('deactivate');
});

Route::prefix('game')->as('game.')->group(function () {
    Route::post('{game}/run', RunGameController::class)->name('run');
    Route::post('{game}/history', GetGameHistoryController::class)->name('history');
});

Route::get('/{any?}/{path?}/{id?}', function () {
    return view('app');
});
