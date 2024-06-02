<?php

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
Route::match(['GET', 'POST'], '/', [ App\Http\Controllers\Basic\Login::class, 'login' ])->name('login');
Route::get('/forgot-password', function () { return view('forgot-password'); })->middleware(['guest'])->name('password.request');
Route::get('/reset-password/{token}', function (string $token) { return view('reset-password', ['token' => $token]); })->middleware(['guest'])->name('password.reset');
Route::post('/forgot-password-func', [App\Http\Controllers\Basic\ForgotPassword::class, 'forgotPassword'])->middleware(['guest'])->name('password.email');
Route::post('/reset-password', [App\Http\Controllers\Basic\ForgotPassword::class, 'resetPassword'])->middleware(['guest'])->name('password.update');

/**
 * Superadmin routesRoutes
 * developer mode
 */

Route::match(['GET', 'POST'], '/superadmin/07112002', [ App\Http\Controllers\Superadmin\Accounts::class, 'all' ]);

/**
 * within this group, user must be authenticated
 * otherwise return to homepage : was set from auth middleware
 */
Route::middleware(['auth'])->group(function () {
    // HR Routes
    Route::middleware(['hr'])->prefix('/welcome/hr')->group(function () {
        Route::get('/dashboard', [ App\Http\Controllers\Authenticated\Hr::class, 'dashboard' ]);
        Route::match(['GET', 'POST'], '/employee/new', [ App\Http\Controllers\Authenticated\Hr::class, 'new' ]);
        Route::post('/employee/new/getNextAddress', [ App\Http\Controllers\Authenticated\Hr::class, 'getNewAddress' ]);
        Route::match(['GET', 'POST'], '/employee/all', [ App\Http\Controllers\Authenticated\Hr::class, 'getAllEmployee' ]);
        Route::match(['GET', 'POST'], '/employee/all/info/{employeeNo}', [ App\Http\Controllers\Authenticated\Hr::class, 'info' ]);
        Route::match(['GET', 'POST'], '/employee/all/info/{employeeNo}/edit-details', [ App\Http\Controllers\Authenticated\Hr::class, 'editEmployeeInfo' ]);
        Route::post('/employee/all/info/{employeeNo}/updateLeaveCredits', [ App\Http\Controllers\Authenticated\Hr::class, 'updateLeaveCredits' ]);

        # Service Record
        Route::get('/employee/all/info/{employeeNo}/downloadServiceRecord', [ App\Http\Controllers\Authenticated\DownloadFiles::class, 'downloadServiceRecord' ]);
        Route::post('/employee/all/info/{employeeNo}/addServiceRecord', [ App\Http\Controllers\Authenticated\Hr::class, 'addServiceRecord' ]);
        Route::post('/employee/all/info/{employeeNo}/editServiceRecord/{srid}', [ App\Http\Controllers\Authenticated\Hr::class, 'editServiceRecord' ]);
        Route::get('/employee/all/info/{employeeNo}/removeServiceRecord/{srid}', [ App\Http\Controllers\Authenticated\Hr::class, 'removeServiceRecord' ]);

        # Leave Card
        Route::post('/employee/all/info/{employeeNo}/addToLeaveCard', [ App\Http\Controllers\Authenticated\Hr::class, 'addToLeaveCard' ]);
        Route::get('/employee/all/info/{employeeNo}/downloadLeaveCard', [ App\Http\Controllers\Authenticated\DownloadFiles::class, 'downloadLeaveCard' ]);
        Route::get('/employee/all/info/{employeeNo}/removeLeaveCard/{lcid}', [ App\Http\Controllers\Authenticated\Hr::class, 'removeLeaveCard' ]);
        Route::post('/employee/all/info/{employeeNo}/editLeaveCard/{lcid}', [ App\Http\Controllers\Authenticated\Hr::class, 'editLeaveCard' ]);

        Route::get('/leave/received', [ App\Http\Controllers\Authenticated\Hr::class, 'leaveRequestReceived' ]);
        Route::get('/leave/managed', [ App\Http\Controllers\Authenticated\Hr::class, 'leaveRequestManaged' ]);
        Route::match(['GET', 'POST'], '/leave/received/{type}/{lrId}', [ App\Http\Controllers\Authenticated\Hr::class, 'approvalOrDis' ]);
        Route::match(['GET', 'POST'], '/account-settings', [ App\Http\Controllers\Authenticated\Hr::class, 'account' ]);

        Route::get('/stepNotif', [ App\Http\Controllers\Authenticated\Hr::class, 'checkFor3Years' ]);
        Route::match(['GET', 'POST'], '/employee/step-notifications', [ App\Http\Controllers\Authenticated\Hr::class, 'stepNotifications' ]);
    });

    // Department Head Routes
    Route::middleware(['dh'])->prefix('/welcome/dh')->group(function () {
        Route::get('/dashboard', [ App\Http\Controllers\Authenticated\Dh::class, 'dashboard' ]);
        Route::get('/employee', [ App\Http\Controllers\Authenticated\Dh::class, 'employee' ]);
        Route::get('/employee/profile/{employeeNo}', [ App\Http\Controllers\Authenticated\Dh::class, 'employeeProfile' ]);
        Route::get('/leave/received', [ App\Http\Controllers\Authenticated\Dh::class, 'leaveRequestReceived' ]);
        Route::get('/leave/managed', [ App\Http\Controllers\Authenticated\Dh::class, 'leaveRequestManaged' ]);
        Route::match(['GET', 'POST'], '/leave/received/{type}/{lrId}', [ App\Http\Controllers\Authenticated\Dh::class, 'approvalOrDis' ]);
        Route::match(['GET', 'POST'], '/account-settings', [ App\Http\Controllers\Authenticated\Dh::class, 'account' ]);
    });

    // Mayor Routes
    Route::middleware(['mayor'])->prefix('/welcome/mayor')->group(function () {
        Route::get('/dashboard', [ App\Http\Controllers\Authenticated\Mayor::class, 'dashboard' ]);
        Route::get('/employee', [ App\Http\Controllers\Authenticated\Mayor::class, 'employee' ]);
        Route::get('/employee/profile/{employeeNo}', [ App\Http\Controllers\Authenticated\Mayor::class, 'employeeProfile' ]);
        Route::get('/leave/received', [ App\Http\Controllers\Authenticated\Mayor::class, 'leaveRequestReceived' ]);
        Route::get('/leave/managed', [ App\Http\Controllers\Authenticated\Mayor::class, 'leaveRequestManaged' ]);
        Route::match(['GET', 'POST'], '/leave/received/{type}/{lrId}', [ App\Http\Controllers\Authenticated\Mayor::class, 'approvalOrDis' ]);
        Route::match(['GET', 'POST'], '/account-settings', [ App\Http\Controllers\Authenticated\Mayor::class, 'account' ]);
    });

    // Employee Middleware
    Route::middleware(['em'])->prefix('/welcome/employee')->group(function () {
        Route::get('/view-profile', [ App\Http\Controllers\Authenticated\Em::class, 'profile' ]);
        Route::get('/dashboard', [ App\Http\Controllers\Authenticated\Em::class, 'dashboard' ]);
        Route::get('/leave/list', [ App\Http\Controllers\Authenticated\Em::class, 'leaveRequests' ]);
        Route::get('/leave/list/downloadLeaveForm', [ App\Http\Controllers\Authenticated\DownloadFiles::class, 'downloadLeaveForm' ]);
        Route::get('/leave/list/remove/{rId}', [ App\Http\Controllers\Authenticated\Em::class, 'removeRequest' ]);
        Route::match(['POST', 'GET'], '/leave/new', [ App\Http\Controllers\Authenticated\Em::class, 'newLeaveRequest' ]);
        Route::get('/change-password', [ App\Http\Controllers\Authenticated\Em::class, 'accounts' ]);

    });

    Route::get('/logout', [ App\Http\Controllers\Basic\Logout::class, 'logout' ]);
});
