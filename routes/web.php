<?php

use Laravel\Jetstream\Rules\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\TrendPostController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.profiles.index');
    // })->name('dashboard');

    //admin
    Route::get('dashboard', [ProfilesController::class, 'index'])->name('dashboard');
    Route::post('admin/update', [ProfilesController::class, 'updateAdminAccount'])->name('admin#update');
    Route::get('admin/changePassword', [ProfilesController::class, 'directChangePassword'])->name('admin#directChangePassword');
    Route::post('admin/changePassword', [ProfilesController::class, 'changePassword'])->name('admin#changePassword');
    // admin list
    Route::get('admin/list', [ListController::class, 'index'])->name('admin#list');
    // admin category
    Route::get('category', [CategoryController::class, 'index'])->name('admin#category');
    //create category
    Route::post('admin/category', [CategoryController::class, 'createCategory'])->name('admin#createCategory');
    //category search
    Route::post('admin/categorySearch', [CategoryController::class, 'categorySearch'])->name('admin#categorySearch');
    // admin post
    Route::get('admin/post', [PostController::class, 'index'])->name('admin#post');
    // admin post create
    Route::post('admin/createPost', [PostController::class, 'createPost'])->name('admin#createPost');
    // admin list
    Route::get('admin/trendPost', [TrendPostController::class, 'index'])->name('admin#trendPost');
    //admin delete
    Route::get('admin/delete/{id}', [ListController::class, 'deleteAccount'])->name('admin#accountDelete');
    //data searching
    Route::post('admin/listSearch', [ListController::class, 'listSearch'])->name('admin#listSearch');
    //admin delete
    Route::get('admin/deleteCategory/{id}', [CategoryController::class, 'deleteCategory'])->name('admin#deleteCategory');
    // admin post edit
    Route::get('admin/posts/{id}/edit', [PostController::class, 'edit'])->name('admin#editPost');
    Route::delete('admin/posts/{id}', [PostController::class, 'destroy'])->name('admin.deletePost');
});
