<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;


Route::prefix('author')->name('author.')->group(function () {
    Route::middleware('guest:web')->group(function () {
        Route::view('/', 'admin.pages.auth.login')->name('login');
        Route::view('/login', 'admin.pages.auth.login')->name('login');
        Route::view('/forgot-password', 'admin.pages.auth.forgot')->name('forgot-password');
        Route::get('/password/reset/{token}', [AuthorController::class, 'ResetForm'])->name('reset-form');
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/home', [AuthorController::class, 'index'])->name('home');
        Route::post('/logout', [AuthorController::class, 'logout'])->name('logout');
        Route::view('/profile', 'admin.pages.profile')->name('profile');
        Route::view('/categories', 'admin.pages.categories')->name('categories');
        Route::get('/getCategories', [AuthorController::class, 'getCategories'])->name('getCategories');
        Route::get('/getSubCategories', [AuthorController::class, 'getSubCategories'])->name('getSubCategories');
        Route::get('/getResources', [AuthorController::class, 'getResources'])->name('getResources');
        Route::post('/save-category', [AuthorController::class, 'save_category'])->name('save-category');
        Route::post('/edit-category', [AuthorController::class, 'edit_category'])->name('edit-category');
        Route::post('/delete-category', [AuthorController::class, 'delete_category'])->name('delete-category');
        Route::post('/save-subcategory', [AuthorController::class, 'save_subcategory'])->name('save-subcategory');
        Route::post('/edit-subcategory', [AuthorController::class, 'edit_subcategory'])->name('edit-subcategory');
        Route::post('/delete-subcategory', [AuthorController::class, 'delete_subcategory'])->name('delete-subcategory');
        Route::view('/resources', 'admin.pages.resources')->name('resources');
        Route::view('/add-resource', 'admin.pages.add-resource')->name('add-resource');
        Route::get('/edit-resource/{resource_id}', [AuthorController::class, 'edit_resource'])->name('edit-resource');
        Route::post('/save-resource', [AuthorController::class, 'save_resource'])->name('save-resource');
        Route::post('/delete-resource',  [AuthorController::class, 'delete_resource'])->name('delete-resource');
        Route::post('/getSubCategoriesByCategory', [AuthorController::class, 'getSubCategoriesByCategory'])->name('getSubCategoriesByCategory');
        Route::view('/contact-data', 'admin.pages.contact-data')->name('contact-data');
        Route::get('/getContactFormData', [AuthorController::class, 'getContactFormData'])->name('getContactFormData');
        Route::view('/users', 'admin.pages.users')->name('users');
        Route::get('/getUsers', [AuthorController::class, 'getUsers'])->name('getUsers');
        Route::post('/save-user', [AuthorController::class, 'save_user'])->name('save-user');
        Route::get('/edit-user/{user_id}', [AuthorController::class, 'edit_user'])->name('edit-user');
        Route::post('/delete-user', [AuthorController::class, 'delete_user'])->name('delete-user');
        Route::post('/change-user-status', [AuthorController::class, 'change_user_status'])->name('change-user-status');
    });
});
