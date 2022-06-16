<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use Symfony\Component\Routing\Route as RoutingRoute;

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
    return view('index');
});
Route::get('/add-form',[StudentController::class,'index'])->name('add-form-data');
Route::get('/test',[StudentController::class,'test'])->name('test-form-data');
Route::post('/add-form',[StudentController::class,'store'])->name('add-form');
Route::get('/students-table',[StudentController::class,'show'])->name('students-table');
Route::get('/edit-form/{id}',[StudentController::class,'edit'])->name('student-edit-form');
Route::put('/update-form/{id}',[StudentController::class,'update'])->name('student-update-form');
Route::get('/delete/{id}',[StudentController::class,'destroy'])->name('student-delete-form');
;
Route::get('/company-form/create',[CompanyController::class,'create'])->name('company-form-create');
Route::post('/company-form-data/store',[CompanyController::class,'store'])->name('company-form-data-store');
Route::get('/company-form/edit/{id}',[CompanyController::class,'edit'])->name('company-form-edit');
Route::put('/company-form/update/{id}',[CompanyController::class,'update'])->name('company-form-data-update');
Route::get('/company-table',[CompanyController::class,'index'])->name('company-table');
Route::delete('/company-form/delete/{id}',[CompanyController::class,'destroy'])->name('companies.destroy');
;
Route::get('/logs',[EmployController::class,'index']);

Route::get('/ajax-images',[FileController::class,'index'])->name('ajax.image');
Route::post('/ajax-image',[FileController::class,'create'])->name('image.store');
