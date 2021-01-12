<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\Authcontroller;
use App\Http\Controllers\Student\StudentController;

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
    return view('auth.login');
})->name('home');

Route::post('authenticate',  [Authcontroller::class, 'checkValidUser'])->name('authenticate');

Route::middleware(['authenticateCheck'])->group(function(){
	Route::get('index',  [StudentController::class, 'index'])->name('index');
	Route::post('store',  [StudentController::class, 'store'])->name('store');
	Route::get('show/{id}',  [StudentController::class, 'show'])->name('showStudentData');
	Route::post('update', [StudentController::class, 'update'])->name('update');
	Route::get('destroy/{id}',  [StudentController::class, 'destroy'])->name('remove');
	Route::get('dashboard', [Authcontroller::class, 'dashboardView'])->name('dashboard');
	Route::get('logout',  [Authcontroller::class, 'logout'])->name('logout');
});

Route::get('student/dashboard', [Authcontroller::class, 'StudentDashboardView'])->name('StudentDashboard')->middleware('authenticateStudent');
