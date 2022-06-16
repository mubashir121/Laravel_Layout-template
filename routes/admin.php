<?php
use App\Http\Controllers\EmployController;
use Illuminate\Support\Facades\Route;

Route::get('/admin',[EmployController::class,'index']);

?>


