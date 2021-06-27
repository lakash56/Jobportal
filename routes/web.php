<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserprofileController;
use App\Http\Controllers\EmployerRegisterController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\TestimonialController;
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

Route::get('/', [JobController::class, 'index'])->name('landing.page');
Route::get('jobs/edit/{id}',[JobController::class,'edit'])->name('job.edit');
Route::post('jobs/edit/{id}',[JobController::class,'update'])->name('job.update');
Route::get('/jobs/{id}/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/company/{id}/{company}', [CompanyController::class, 'index'])->name('company.index');

Route::get('/category/{id}', [CategoryController::class, 'singleJob'])->name('category.jobs');

//apply
Route::post('/applications/{id}',[JobController::class,'apply'])->name('apply');
Route::get('/jobs/application',[JobController::class,'applicant'])->name('my.applicants');


//user Profile
Route::get('user/profile',[UserprofileController::class,'index'])->name('profile.view');
Route::post('user/profile/create',[UserprofileController::class,'store'])->name('profile.create');
Route::post('user/coverletter',[UserprofileController::class,'coverletter'])->name('cover.letter');
Route::post('user/resume',[UserprofileController::class,'resume'])->name('resume');
Route::post('user/avatar',[UserprofileController::class,'avatar'])->name('avatar');
Route::get('user/cv',[UserprofileController::class,'createcv'])->name('profile.cv');

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
Route::get('jobs/my-job',[JobController::class,'myjob'])->name('myjob');
Route::get('all-jobs',[JobController::class ,'listAllJobs'])->name('all.jobs');
Route::get('search-jobs',[JobController::class,'search'])->name('search.job.options');
Route::get('find-jobs',[JobController::class,'homeSearch'])->name('find.jobs');

Route::get('/select/{id}/toggle',[JobController::class,'applicantsToggle'])->name('select.toggle');


//add to fav
Route::post('/save/{id}',[FavouriteController::class, 'saveJob'])->name('save');
Route::post('/unsave/{id}',[FavouriteController::class, 'unSaveJob'])->name('unsave');

//select
//Route::post('/select/{id}',[SelectController::class, 'select'])->name('save');

//search

Route::get('/jobs/search',[JobController::class,'searchJobs'])->name('search.job');

//company
Route::get('/all-company',[CompanyController::class,'company'])->name('list.all.company');

//email
Route::post('/job/send',[EmailController::class, 'send'])->name('mail.send');

//admin
Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.home')->middleware('admin');
Route::get('/dashboard/create',[DashboardController::class,'create'])->name('post.create')->middleware('admin');
Route::post('/dashboard/create',[DashboardController::class,'store'])->name('post.store')->middleware('admin');
Route::post('/dashboard/destroy',[DashboardController::class,'destroy'])->name('post.delete')->middleware('admin');
Route::get('/dashboard/{id}/edit',[DashboardController::class,'edit'])->name('post.edit')->middleware('admin');
Route::post('/dashboard/{id}/update',[DashboardController::class,'update'])->name('post.update')->middleware('admin');
Route::get('/dashboard/trash',[DashboardController::class,'trash'])->name('post.trash')->middleware('admin');
Route::get('/dashboard/{id}/create',[DashboardController::class,'restore'])->name('post.restore')->middleware('admin');
Route::get('/dashboard/{id}/toggle',[DashboardController::class,'toggle'])->name('post.toggle')->middleware('admin');

//blog
Route::get('/blog/{id}/{slug}',[DashboardController::class,'read'])->name('post.read');

//testimonial
Route::get('testimonial',[TestimonialController::class,'index'])->name('testimonial.view')->middleware('admin');
Route::get('testimonial/create',[TestimonialController::class,'creteTestimonial'])->name('testimonial')->middleware('admin');
Route::post('testimonial/create',[TestimonialController::class,'store'])->name('testimonial.store')->middleware('admin');

//admin job
Route::get('/dashboard/job',[DashboardController::class,'getAllJobs'])->name('admin.jobs')->middleware('admin');
Route::get('/dashboard/{id}/jobs',[DashboardController::class,'changeJobStatus'])->name('job.status')->middleware('admin');


Route::get('/dashboard/users',[DashboardController::class,'getAllUser'])->name('admin.user')->middleware('admin');
Route::get('/dashboard/addCategory',[DashboardController::class,'addCategory'])->name('admin.category')->middleware('admin');
Route::post('/dashboard/addCategory',[DashboardController::class,'category'])->name('admin.addcategory')->middleware('admin');



Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

