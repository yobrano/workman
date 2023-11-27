<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceGroupController;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\Worker\WorkerDashboardController;
use Illuminate\Support\Facades\Auth;
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

/* Google Social Login */
Route::get('/login/google', [App\Http\Controllers\GoogleLoginController::class,'redirect'])->name('login.google-redirect');
Route::get('/login/google/callback',  [App\Http\Controllers\GoogleLoginController::class,'callback'])->name('login.google-callback');


Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::group(['middleware'=>'role:admin'],function () {
    Route::group(['namespace'=>'Admin','prefix'=>'admin'],function () {
        Route::get('/', [AdminDashboardController::class,'index'])->name('admin.dashboard');
        Route::get('/stats', [AdminDashboardController::class,'stats'])->name('admin.stats');
        // Projects
        Route::get('/projects', [ProjectController::class,'index'])->name('admin.projects');
        Route::get('/get/projects', [ProjectController::class,'getProjects'])->name('admin.get.projects');
        Route::post('/project', [ProjectController::class,'store'])->name('admin.store.project');
        Route::get('/project/{id}/edit', [ProjectController::class,'edit'])->name('admin.edit.project');
        Route::put('/project/{id}/update', [ProjectController::class,'update'])->name('admin.update.project');
        Route::get('/project/{id}/delete', [ProjectController::class,'destroy'])->name('admin.delete.project');
        // Project Categories
        Route::get('/project/categories', [ProjectCategoryController::class,'index'])->name('admin.categories.project');
        Route::get('/get/project/categories', [ProjectCategoryController::class,'getCategories'])->name('admin.get.categories.project');
        Route::post('/project/category', [ProjectCategoryController::class,'store'])->name('admin.store.category.project');
        Route::get('/project/category/{id}/edit', [ProjectCategoryController::class,'edit'])->name('admin.edit.category.project');
        Route::put('/project/category/{id}/update', [ProjectCategoryController::class,'update'])->name('admin.update.category.project');
        Route::get('/project/category/{id}/delete', [ProjectCategoryController::class,'destroy'])->name('admin.delete.category.project');
        //Services
        Route::get('/services', [ProjectController::class,'index'])->name('admin.service');
        // Services Group
        Route::get('/service/groups', [ServiceGroupController::class,'index'])->name('admin.groups.service');
        Route::get('/get/service/groups', [ServiceGroupController::class,'getServiceGroup'])->name('admin.get.groups.service');
        Route::post('/service/group', [ServiceGroupController::class,'store'])->name('admin.store.group.service');
        Route::get('/service/group/{id}/edit', [ServiceGroupController::class,'edit'])->name('admin.edit.group.service');
        Route::put('/service/group/{id}/update', [ServiceGroupController::class,'update'])->name('admin.update.group.service');
        Route::get('/service/group/{id}/delete', [ServiceGroupController::class,'destroy'])->name('admin.delete.group.service');
        
    });
}); 

//Professional
Route::group(['middleware'=>'role:worker'],function () {
    Route::group(['namespace'=>'Worker','prefix'=>'worker'],function () {
        Route::get('/', [WorkerDashboardController::class,'index'])->name('worker.dashboard');
      
      
    });
}); 

//Customer
Route::group(['middleware'=>'role:customer'],function () {
    Route::group(['namespace'=>'Customer','prefix'=>'cust'],function () {
        Route::get('/', [CustomerDashboardController::class,'index'])->name('cust.dashboard');
      
      
    });
}); 