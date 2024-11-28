<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });





Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});



// Route::middleware('auth:api', 'throttle:2,1')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:api','throttle:3,1')->get('/quote', [QuoteController::class, 'index']);
Route::middleware('auth:api','throttle:3,1')->post('/quote', [QuoteController::class, 'createQuote']);
Route::middleware('auth:api','throttle:2003,1')->post('/customer', [CustomerController::class, 'customerInfo']);




Route::get('/lang/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'fr'])) {
        session(['locale' => $lang]);
    }
    return redirect()->back();
});


// Route::controller(QuoteController::class)->group(function () {
//     Route::get('quote', 'index');
//     // Route::post('todo', 'store');
//     // Route::get('todo/{id}', 'show');
//     // Route::put('todo/{id}', 'update');
//     // Route::delete('todo/{id}', 'destroy');
// });