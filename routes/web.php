<?php

use App\Http\Controllers\Admin\AdminDashbaord;
use App\Http\Controllers\Admin\AdminLinkController;
use App\Http\Controllers\Admin\AdminPaymentRequest;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\MustAdminMiddleware;
use App\Http\Middleware\MustAdminNotLoggedMiddleware;
use App\Http\Middleware\MustLoginMiddleware;
use App\Http\Middleware\MustNotLoggedMiddleware;
use App\Models\PaymentRequest;
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
    Route::put('/profile/change-profile-image', [ProfileController::class, 'updateProfilePhoto'])->name("changeProfileImage");
    Route::post("/payout", [PaymentController::class, "make"])->name("payout");
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

Route::prefix("admin")->group(function(){
    Route::prefix("auth")->middleware(MustAdminNotLoggedMiddleware::class)->group(function(){
        Route::get("/login", function(){
            return view("admin.login");
        })->name("admin.login");
    });

    Route::prefix("dashboard")->middleware(MustAdminMiddleware::class)->controller(AdminDashbaord::class)->group(function(){
        Route::get("/", "dashboard")->name("admin.dashboard");
        Route::get("/users", "users")->name("admin.users");
        Route::get("/users/{user}", "profile")->name("admin.profile");
        Route::get("/users/{user}/refers", "userReferral")->name("admin.userReferral");
        Route::get("/users/{user}/clicks", "clickHistory")->name("admin.clickHistory");
        Route::post("/users/{user}/suspend", "suspendUser")->name("admin.suspendUser");
        Route::post("/users/{user}/unsuspend", "unSuspendUser")->name("admin.unSuspendUser");
        Route::resource('notices', NoticeController::class);
        Route::resources([
            'links' => AdminLinkController::class,
            'payment' => AdminPaymentRequest::class,
        ]);
        Route::get('/logout', "adminLogout")->name("admin.logout");

    });
});
