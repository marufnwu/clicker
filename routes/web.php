<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\MustLoginMiddleware;
use App\Http\Middleware\MustNotLoggedMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

//protected routes

Route::get("/test", [TestController::class, 'test']);

Route::middleware(MustLoginMiddleware::class)->group(function(){
    Route::get('/', [HomePageController::class, 'page'])->name("home");
    Route::post("/link/{id}/click", [LinkController::class, "click"])->name("link.click");
    Route::post("/balance/click", [BalanceController::class, "clickBalance"])->name("balance.click");
    Route::get('/profile', [ProfileController::class, 'page'])->name("profile");
});


//must not logged routes
Route::middleware(MustNotLoggedMiddleware::class)->group(function(){
    Route::get('/signup', function () {
        return view("signup");
    })->name("signup");

    Route::get('/login', function () {
        return view("login");
    })->name("login");

});

Route::prefix("auth")->controller(AuthController::class)->group(function(){
    Route::post("/signup", "submitSignup")->name("submitSignup");
    Route::post("/login", "submitLogin")->name("submitLogin");
});
