<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WebController;
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



Auth::routes();

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {return view('welcome');});
    Route::get('/signup-page', [UserController::class, 'signup'])->name('signup-page');
    Route::get('/login-page', [UserController::class, 'login'])->name('login-page');
    Route::post('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/doLogin', [UserController::class, 'doLogin'])->name('user.doLogin');
    });
Route::middleware(['auth:register'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/admin_profile', [UserController::class, 'admin_profile'])->name('admin.profile');
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/admission-page', [StudentController::class, 'admission_page'])->name('user.admission.page');
    Route::post('/admission', [StudentController::class, 'admission'])->name('user.admission');
    Route::get('/student', [StudentController::class, 'all_student'])->name('user.student');
    Route::post('/student', [StudentController::class, 'search_student'])->name('search.student');
    Route::get('/student_profile/{id}', [StudentController::class, 'student_profile']);
    Route::get('/student_profile/delete_student/{id}', [StudentController::class, 'delete_student']);
    Route::get('/student_profile/edit_student/{id}', [StudentController::class, 'edit_student']);
    Route::post('/edit_student_profile/{id}', [StudentController::class, 'edit_student_profile'])->name('edit_student_profile');
    Route::get('/student_profile/admission_fee/{id}', [StudentController::class, 'admission_fee'])->name('admission_fee');
    Route::get('/add_fee_page', [StudentController::class, 'add_fee_page'])->name('add_fee_page.student');
    Route::post('/add_fee_page/add_fee', [StudentController::class, 'add_fee'])->name('add_fee.student');
    Route::get('/student_profile/midturm_fee/{id}', [StudentController::class, 'midturm_fee'])->name('midturm_fee');
    Route::get('/student_profile/final_fee/{id}', [StudentController::class, 'final_fee'])->name('final_fee');
    Route::get('/fee_list_page', [StudentController::class, 'fee_list_page'])->name('fee_list_page.student');
    Route::post('/fee_list', [StudentController::class, 'fee_list'])->name('search.fee_list.student');
    Route::get('/fee_list/delete_fee_list/{id}', [StudentController::class, 'delete_fee_list']);
    Route::get('/fee_list/edit_fee_list/{id}', [StudentController::class, 'edit_fee_list']);
    Route::post('/update_fee/{id}', [StudentController::class, 'update_fee'])->name('update_fee.student');
});

