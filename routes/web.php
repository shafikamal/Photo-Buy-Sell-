<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\adminPhotoController;
use App\Http\Controllers\adminAuthController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\userController;
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
//USER DASHBOARD
Route::get('/index',[userController::class,'indexShow']);

//PHOTO UPLOAD
Route::middleware('userAuth')->group(function (){
    Route::get('upload',[PhotoController::class,'showPhotoUpload']);
    Route::post('upload',[PhotoController::class,'photoUpload']);
    Route::get('gallery',[PhotoController::class,'showGallery']);
    Route::get('image/approve/{image_id}/{status}',[PhotoController::class,'approveImage']);
    Route::get('balance',[PhotoController::class,'showBalance']);

});


//USER REGISTRATION
Route::get('register',[UserAuthController::class,'showRegister']);
Route::post('register',[UserAuthController::class,'register']);

//USER LOGIN
Route::get('login',[UserAuthController::class,'showLogin']);
Route::post('login',[UserAuthController::class,'login']);
Route::get('logout',[UserAuthController::class,'logout']);

//FORGET PASSWORD
Route::get('forget-password',[UserAuthController::class,'showForget']);
Route::post('forget-password',[UserAuthController::class,'Forget']);
Route::get('forget-password/{email}/{token}',[UserAuthController::class,'showPasswordReset']);
Route::post('forget-password/{email}/{token}',[UserAuthController::class,'passwordReset']);



//ADMIN

Route::get('admin/login',[adminAuthController::class,'showAdminLogin']);
Route::post('admin/login',[adminAuthController::class,'adminLogin']);
Route::get('admin/logout',[adminAuthController::class,'adminLogout']);


Route::middleware('adminAuth')->group(function (){
    Route::get('admin/dashboard',[AdminController::class,'dashboardShow']);

//ADMIN STATUS APPROVE
    Route::get('approve',[adminPhotoController::class,'showPhotoApprove']);
    Route::get('approve/status/{image_id}/{status}',[adminPhotoController::class,'PhotoApprove'])->name('admin.updateStatus');

//ADMIN STATUS BUY-OUT
    Route::get('admin/buyout',[adminPhotoController::class,'showPhotoBuyout']);
    Route::post('admin/buyout/{photo_id}',[adminPhotoController::class,'photoBuyout']);
});




