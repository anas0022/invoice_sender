<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'register'])->name('register');
Route::get('/menu', [HomeController::class, 'menu'])->middleware('auth');  // Protect this route with auth middleware
Route::post('/register', [UserController::class, 'register_post'])->name('register.post');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/loginpost', [UserController::class, 'login_post'])->name('login.post');
Route::get('/home/{id}', [UserController::class, 'home'])->middleware('auth')->name('home');  // Protect this route with auth middleware
Route::post('/profile', [HomeController::class, 'addprofile'])->middleware('auth')->name('addprofile');
Route::get('/jobdone/{id}', [HomeController::class, 'jobdone'])->middleware('auth')->name('jobdone');
Route::post('/jobdonepost', [HomeController::class, 'jobdonepost'])->middleware('auth')->name('job.done');
Route::get('/job/{id}', [HomeController::class, 'job'])->middleware('auth')->name('job');
Route::post('/jobpost', [HomeController::class, 'jobpost'])->middleware('auth')->name('jobpost');
Route::get('/index', [HomeController::class, 'index'])->middleware('auth')->name('pdf');
Route::post('/send-email-pdf-post', [HomeController::class, 'indexpost'])->middleware('auth')->name('pdf.post');
Route::get('/view', [HomeController::class, 'view'])->middleware('auth')->name('view');
Route::post('/viewpost', [HomeController::class, 'viewpost'])->middleware('auth')->name('view.post');
Route::post('/logout', [HomeController::class, 'logout'])->middleware('auth')->name('logout');


