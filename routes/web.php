<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PrimeNumberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Yonet;
use App\Http\Controllers\Formislemleri;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\SettingsController;
use App\Models\Todoapp;

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

// register
Route::get('/register-show', [RegisterController::class,'registerpage'])->name ('registerpage');
Route::post('/register-save', [RegisterController::class,'register'])->name('register');

// login
Route::get('/', [LoginController::class,'show'])->name ('show');
Route::post('/login', [LoginController::class,'login'])->name('login');

/* with auth method */
Route::group([
    'middleware' => ['auth']
], function(){
    // dashboard
    Route::get('/main', [MainController::class,'show'])->name('main.show');
    
    // add todo
    Route::get('/add', [MainController::class,'addView'])->name('addview');
    Route::post('/added', [MainController::class,'add'])->name('add');
    
    // edit todo
    Route::get('/edit/{id}', [EditController::class, 'editShow'])->name('edit');
   
    //update todo
    Route::patch('/update/{id}', [EditController::class, 'update'])->name('update');
   
    //view todo
    Route::post('/not/{id}', [MainController::class,'viewStatus'])->name('viewStatus');

    //delete todo
    Route::post('/deleted/{id}', [MainController::class,'delete'])->name('delete');

    //other todo activities
    Route::post('/removeFilter', [MainController::class,'removeFilter'])->name('removeFilter');
    Route::post('/sort', [MainController::class,'sort'])->name('sort');
  
    //home page
    Route::get('/home', [HomeController::class,'homeview'])->name('homeview');

    //settings page
    Route::get('/settings', [MainController::class,'settingsShow'])->name('settings');
    Route::post('/change/{id}', [SettingsController::class, 'changepassword'])->name('change');

    // logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
/* with auth method */
