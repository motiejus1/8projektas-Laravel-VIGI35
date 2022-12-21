<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\GroupController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//studentus
// /students/index
// /studnets/create
// /students/edit
// /students/show

//groups
// /groups/index
// /groups/create
// /groups/edit
// /groups/show




//prefix - tekstukas kuri prideda kiekvieno teksto pradzioje
//fiksuota teksto pradzia

//Studentu keliu grupe
Route::prefix('students')->group(function(){
    // /students/index
    Route::get('/index', [StudentController::class,'index'])->name('students.index')->middleware('auth');
    Route::get('/create', [StudentController::class,'create'])->name('students.create')->middleware('auth');
    Route::post('/store', [StudentController::class,'store'])->name('students.store')->middleware('auth');
    Route::get('/edit/{student}', [StudentController::class,'edit'])->name('students.edit')->middleware('auth');
    Route::post('/update/{student}', [StudentController::class,'update'])->name('students.update')->middleware('auth');
    Route::get('/show/{student}', [StudentController::class,'show'])->name('students.show')->middleware('auth');
    Route::post('/destroy/{student}', [StudentController::class,'destroy'])->name('students.destroy')->middleware('auth');
    Route::post('/storeGroupView', [StudentController::class,'storeGroupView'])->name('students.storeGroupView')->middleware('auth');
});

//Grupes keliu grupe
//groups -> group
Route::prefix('groups')->group(function(){
    // /students/index
    Route::get('/index', [GroupController::class,'index'])->name('groups.index')->middleware('auth');
    Route::get('/create', [GroupController::class,'create'])->name('groups.create')->middleware('auth');
    Route::post('/store', [GroupController::class,'store'])->name('groups.store')->middleware('auth');
    Route::get('/edit/{group}', [GroupController::class,'edit'])->name('groups.edit')->middleware('auth');
    Route::post('/update/{group}', [GroupController::class,'update'])->name('groups.update')->middleware('auth');
    Route::get('/show/{group}', [GroupController::class,'show'])->name('groups.show')->middleware('auth');
    Route::post('/destroy/{group}', [GroupController::class,'destroy'])->name('groups.destroy')->middleware('auth');
});