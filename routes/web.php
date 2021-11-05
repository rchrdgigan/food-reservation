<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\{
    LoginController,
    RegisterController,
};

use App\Http\Controllers\{
    FoodController,
    FoodPackageController,
    HomeController,
    ReservationController,
    AdminPageController,
    BusinessSettingController,
    PageController,
    UserController,
    ScheduleController,
};

use App\Models\Business;

Route::get('/',[PageController::class, 'mainPage'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::prefix('client')->group(function(){
        Route::put('/udpate/profile', [UserController::class, 'updateUser'])->name('update.profile');
        Route::get('reservation', [ReservationController::class, 'index'])->name('reservation');
        Route::post('add/reservation', [ReservationController::class, 'store'])->name('add.reservation');
        Route::post('add/transaction', [ReservationController::class, 'transaction'])->name('transaction');
        //show transaction log
        Route::get('transaction/log/history', [ReservationController::class, 'transactionHistory'])->name('transaction.history');
        Route::get('transaction/current/history', [ReservationController::class, 'currentHistory'])->name('current.history');
        Route::get('transaction/log/history/{id}', [ReservationController::class, 'showInfo'])->name('log.info');
    });
});

Auth::routes();

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::post('/login/admin', [LoginController::class,'adminLogin']);

Route::get('logout', [LoginController::class,'logout']);

Route::get('/event/schedule', [ScheduleController::class, 'listEvents'])->name('events');

Route::group(['middleware' => 'auth:admin'], function () {
    
    Route::prefix('admin')->group(function(){
        //page controll
        Route::get('/',  [AdminPageController::class, 'dashboardPage'])->name('admin.dashboard');
        Route::get('list/food', [AdminPageController::class, 'foodPage'])->name('admin.foodmenu');
        Route::get('list/package', [AdminPageController::class,'foodPackagePage'])->name('admin.foodpackage');
        Route::get('pending/transaction/list', [AdminPageController::class, 'pendingList'])->name('pending.transaction');
        Route::get('inprocess/transaction/list', [AdminPageController::class, 'approvedList'])->name('inprocess.transaction');
        Route::get('completed/transaction/list', [AdminPageController::class, 'completedList'])->name('completed.transaction');
        Route::get('cancel/transaction/list', [AdminPageController::class, 'cancelList'])->name('cancel.transaction');
        Route::get('setting/business', [AdminPageController::class, 'adminSetting'])->name('business.setting');
        //setting crud
        Route::post('setting/business/information', [BusinessSettingController::class, 'settingInformation'])->name('setting.information');
        Route::post('setting/business/links', [BusinessSettingController::class, 'settingLinks'])->name('setting.links');
        Route::post('setting/business/gcash', [BusinessSettingController::class, 'settingGCash'])->name('setting.gcash');
        // food package
        Route::post('add/package', [FoodPackageController::class, 'store'])->name('add.foodpackage');
        Route::put('update/package', [FoodPackageController::class, 'update'])->name('update.foodpackage');
        Route::delete('list/package/{id}', [FoodPackageController::class, 'destroy'])->name('delete.foodpackage');
        // foods
        Route::post('add/food', [FoodController::class, 'store'])->name('add.food');
        Route::delete('list/food/{id}', [FoodController::class, 'destroy'])->name('delete.food');
        Route::put('update/food', [FoodController::class, 'update'])->name('update.food');
        //trasaction pending
        Route::post('pending/transaction/view/{id}', [ReservationController::class, 'viewPending'])->name('view.pending');
        //trasaction approved
        Route::put('approved/transaction/{id}', [ReservationController::class, 'approvedReservation'])->name('approved');
        Route::post('inprocess/transaction/view/{id}', [ReservationController::class, 'viewApproved'])->name('view.inprocess');
        //trasaction complete
        Route::put('completed/transaction/{id}', [ReservationController::class, 'completedReservation'])->name('completed');
        Route::post('completed/transaction/view/{id}', [ReservationController::class, 'viewCompleted'])->name('view.completed');
        //trasaction cancel
        Route::put('cancel/transaction', [ReservationController::class, 'cancelReservation'])->name('cancel');
        Route::post('cancel/transaction/view/{id}', [ReservationController::class, 'viewCanceled'])->name('view.cancel');
        //schedule setting
        Route::get('list/schedule', [ScheduleController::class, 'listSchedule'])->name('schedule.view');
        Route::post('setting/schedule', [ScheduleController::class, 'settingSchedule'])->name('assign.team');
        //account management
        Route::get('list/users/account', [AdminPageController::class, 'listUsers'])->name('list.user');
        Route::post('register/admin', [AdminPageController::class,'createAdmin'])->name('create.user');
        Route::put('update/admin', [AdminPageController::class,'updateAdmin'])->name('update.user');
        Route::delete('del/admin/{id}', [AdminPageController::class,'delAdmin'])->name('del.user');

    });
});