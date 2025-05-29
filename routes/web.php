<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;


Route::get('/', function () {
    return view('welcome');
});


// project
Route::get('/LMC', [ProjectController::class,'newBlog'])->name('home');
Route::get('/LMC/recipe', [ProjectController::class,'showRecipes'])->name('guides');
Route::get('/LMC/asianFood', [ProjectController::class,'asianFood'])->name('asianF');
Route::get('/LMC/westernFood', [ProjectController::class,'westernFood'])->name('westF');
Route::get('/LMC/bookmarks', [ProjectController::class,'bookmarks'])->name('bookmarks');
Route::post('/LMC/bookmarks/{id}', [ProjectController::class, 'addBookmarks'])->name('addBookmarks');
Route::get('/LMC/removeBookmarks/{id}', [ProjectController::class,'bookRemove'])->name('bookRemove');
Route::get('/LMC/search', [ProjectController::class,'search'])->name('srch');
Route::post('/LMC/search', [ProjectController::class,'search'])->name('srch');
Route::get('/LMC/details/{id}', [ProjectController::class,'showDetail'])->name('detail');
Route::get('/LMC/asian_details/{id}', [ProjectController::class,'afDetail'])->name('asianDetail');
Route::get('/LMC/western_details/{id}', [ProjectController::class,'wfDetail'])->name('westernDetail');


//user

Route::get('/LMC/register', [UserController::class,'register'])->name('register');
Route::post('/LMC/register', [UserController::class,'registerPost'])->name('registerPost');
Route::get('/LMC/login', [UserController::class,'login'])->name('login');
Route::post('/LMC/login', [UserController::class,'loginP'])->name('loginP');
Route::get('/LMC/back-to-login', [UserController::class,'signOut'])->name('signOut');
Route::get('/LMC/contact', [UserController::class,'contactUs'])->name('contactUs');
Route::post('/LMC/contact', [UserController::class,'submitMsg'])->name('submitMsg');
Route::get('/LMC/reviews/{id}', [UserController::class,'reviewUser'])->name('reviewUser');
Route::post('/LMC/reviews/{id}', [UserController::class,'submitReview'])->name('submitReview');
Route::get('/LMC/Privacy&Policy', [UserController::class,'privacyNPolicy'])->name('privacyNPolicy');


//user forget password
Route::get('/LMC/forgot_password', [UserController::class,'ShowForgotPwd'])->name('forgotPWD');
Route::post('/LMC/forgot_password', [UserController::class,'forgotPwdPost'])->name('forgotPwdPost');
Route::get('/LMC/reset-password/{token}', [UserController::class, 'displayResetPasswordForm'])->name('resetGet');
Route::post('/LMC/reset-password', [UserController::class, 'submitResetPassword'])->name('resetPost');
//admin
Route::get('/admin', [AdminController::class,'admin'])->name('admin_index');
Route::post('/admin', [AdminController::class,'adminIndexPost'])->name('adminIndexPost');

Route::middleware([Admin::class])->group(function(){
Route::get('/admin/dashboard', [AdminController::class,'dashboard'])->name('adminDashboard');
Route::get('/admin/back-to-dashboard',[AdminController::class,'adminLogout'])->name('adminLogout');
Route::get('/admin/recipes',[AdminController::class,'allRecipes'])->name('allRecipes');
Route::get('/admin/recipes-details/{id}',[AdminController::class,'recipesDetailAdmin'])->name('recipesDetailAdmin');
Route::get('/admin/recipes-details/delete-cmt/{id}', [AdminController::class,'deleteUserCmt'])->name('deleteUserCmt');
Route::get('/admin/add-blog',[AdminController::class,'addBlog'])->name('addBlog');
Route::post('/admin/add-blog',[AdminController::class,'addBlogPost'])->name('addBlogPost');
Route::get('/admin/all-users',[AdminController::class,'allUsers'])->name('allUsers');
Route::get('/admin/all-users/delete-user/{id}', [AdminController::class,'deleteUser'])->name('deleteUser');
Route::get('/admin/contact-message',[AdminController::class,'contactMsg'])->name('contactMsg');
Route::get('/admin/contact-message/delete-msg/{id}', [AdminController::class,'deleteMsg'])->name('deleteMsg');
Route::get('/admin/edit-blog',[AdminController::class,'editBlog'])->name('editBlog');
Route::get('/admin/editPage/{id}',[AdminController::class,'editPage'])->name('editPage');
Route::post('/admin/editPage/{id}',[AdminController::class,'editBlogPost'])->name('editBlogPost');
Route::get('/admin/admin-team',[AdminController::class,'adminTeam'])->name('adminTeam');
Route::get('/admin/all-admins/remove-admin/{aid}', [AdminController::class,'deleteAdmin'])->name('deleteAdmin');
Route::get('/admin/add-admins',[AdminController::class,'addAdmins'])->name('addAdmins');
Route::post('/admin/add-admins',[AdminController::class,'newAdminPost'])->name('newAdminPost');
Route::get('/admin/setting',[AdminController::class,'setting'])->name('setting');
Route::post('/admin/change-username',[AdminController::class,'editProfilePost'])->name('editProfilePost');
Route::get('/admin/search',[AdminController::class,'searchAdmin'])->name('searchAdmin');
Route::get('/admin/change-password',[AdminController::class,'changeAdminPwd'])->name('changeAdminPwd');
Route::post('/admin/change-password',[AdminController::class,'changeAdminPwdPost'])->name('changeAdminPwdPost');


});
