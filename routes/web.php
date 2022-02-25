<?php

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

Route::get('/',[\App\Http\Controllers\AuthController::class,'showLoginForm'])->name('login');
Route::post('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login.submit');
Route::get('/scan-result/{code}',[\App\Http\Controllers\MemberController::class,'scanResult'])->name('scan');

Route::group(['middleware'=>'user_middleware'],function (){
    Route::get('/user/dashboard',[\App\Http\Controllers\UserController::class,'index'])->name('user.home');
    Route::get('/user/file-submission',[\App\Http\Controllers\UserController::class,'getAllFileSubmissionList'])->name('user_submission_list');

    Route::get('/member/registration',[\App\Http\Controllers\MemberController::class,'showMemberForm'])->name('show-member-form');
    Route::post('/member/registration',[\App\Http\Controllers\MemberController::class,'submitMemberForm'])->name('submit-member-form');
    Route::get('/{code}',[\App\Http\Controllers\UserController::class,'getMemberDataByCode'])->name('get-member-data');
});

Route::group(['middleware'=>'admin'],function (){
    Route::get('/admin/home',[\App\Http\Controllers\AdminController::class,'index'])->name('admin.home');
    Route::get('/agent/list',[\App\Http\Controllers\AgentController::class,'index'])->name('agent_list');
    Route::get('/agent/request',[\App\Http\Controllers\AgentController::class,'requestList'])->name('agent_request');
    Route::post('/agent/status-change',[\App\Http\Controllers\AgentController::class,'agentStatusChange'])->name('agent_status_change');
    Route::get('/admin/file-submission',[\App\Http\Controllers\FileSubmissionController::class,'index'])->name('submission_list');

    Route::get('/member/{code}/edit',[\App\Http\Controllers\MemberController::class,'memberEdit'])->name('member_edit');
    Route::post('/member/update',[\App\Http\Controllers\MemberController::class,'memberUpdate'])->name('member_update');


    Route::get('/agent/signup',[\App\Http\Controllers\AuthController::class,'showSignupForm'])->name('signup');
    Route::post('/agent/signup',[\App\Http\Controllers\AuthController::class,'signup'])->name('signup.submit');

});

Route::group(['middleware' => 'auth'],function (){
    Route::get('/print/{code}',[\App\Http\Controllers\MemberController::class,'printPdf'])->name('print');
    Route::get('/auth/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');
});
