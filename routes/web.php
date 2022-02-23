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

Route::get('/',[\App\Http\Controllers\MemberController::class,'showMemberForm'])->name('show-member-form');
Route::post('/',[\App\Http\Controllers\MemberController::class,'submitMemberForm'])->name('submit-member-form');
Route::get('/{code}',[\App\Http\Controllers\MemberController::class,'getMemberDataByCode'])->name('get-member-data');
Route::get('/print/{code}',[\App\Http\Controllers\MemberController::class,'printPdf'])->name('print');
