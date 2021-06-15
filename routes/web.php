<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserprofileController;
use App\Http\Controllers\EmployerRegisterController;
use App\Http\Controllers\HomeController;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [JobController::class, 'index'])->name('home');
Route::get('jobs/edit/{id}',[JobController::class,'edit'])->name('job.edit');
Route::post('jobs/edit/{id}',[JobController::class,'update'])->name('job.update');
Route::get('/jobs/{id}/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/company/{id}/{company}', [CompanyController::class, 'index'])->name('company.index');

//apply
Route::post('/applications/{id}',[JobController::class,'apply'])->name('apply');
Route::get('/jobs/application',[JobController::class,'applicant']);


//user Profile
Route::get('user/profile',[UserprofileController::class,'index'])->name('profile.view');
Route::post('user/profile/create',[UserprofileController::class,'store'])->name('profile.create');
Route::post('user/coverletter',[UserprofileController::class,'coverletter'])->name('cover.letter');
Route::post('user/resume',[UserprofileController::class,'resume'])->name('resume');
Route::post('user/avatar',[UserprofileController::class,'avatar'])->name('avatar');

/* employer routes */
Route::view('employer/register','auth.employer-register')->name('employer.register');
Route::post('employer/register',[EmployerRegisterController::class,'employerRegister'])->name('emp.register');
Route::get('/company/create',[CompanyController::class,'create'])->name('company.create');
Route::post('company/create',[CompanyController::class,'store'])->name('company.store');
Route::post('company/coverphoto',[CompanyController::class,'coverphoto'])->name('cover.photo');
Route::post('company/logo',[CompanyController::class,'companylogo'])->name('company.logo');

/* Jobs Routs */
Route::get('jobs/create',[JobController::class,'create'])->name('jobs.create');
Route::post('jobs/create',[JobController::class,'store'])->name('jobs.store');
Route::get('all-jobs',[JobController::class ,'listAllJobs'])->name('all.jobs');

Route::post('search-jobs',[JobController::class,'search'])->name('search.job.options');






Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
