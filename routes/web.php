<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;

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
Route::get('/', [HomeController::class, 'index']);
Route::get('book-lists', [PublicController::class, 'index'])->name('book-lists');
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginProcess']);
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    // Client
    Route::middleware('onlyClient')->group(function () {
        Route::get('profile', [ProfileController::class, 'index'])->name('profile')->middleware('onlyClient');
        Route::get('/book-rent', [BookRentController::class, 'index'])->name('bookRent');
        Route::post('/book-rent', [BookRentController::class, 'store'])->name('bookRentStore');

        Route::get('/return-book', [RentLogController::class, 'returnBook'])->name('returnBook');
        Route::post('/return-book', [RentLogController::class, 'saveReturnBook'])->name('saveReturnBook');
    });

    // Admin
    Route::middleware('onlyAdmin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('books', [BookController::class, 'index'])->name('books');
        Route::get('books/add', [BookController::class, 'add'])->name('booksAdd');
        Route::post('books', [BookController::class, 'addBook'])->name('booksStore');
        Route::get('books/edit/{id}', [BookController::class, 'editBook'])->name('booksEdit');
        Route::put('books/{id}', [BookController::class, 'updateBook'])->name('booksUpdate');
        Route::get('books/delete/{id}', [BookController::class, 'deleteBook'])->name('booksDelete');
        Route::get('books/softdelete', [BookController::class, 'viewBookSoftDelete'])->name('booksSoftDelete');
        Route::get('books/restore/{id}', [BookController::class, 'restoreBooks'])->name('booksRestore');
        Route::get('books/deletePermanent/{id}', [BookController::class, 'deletePermanentlyBook'])->name('booksDeletePermanent');
    
        Route::put('books/{id}', [BookController::class, 'updateBook'])->name('booksUpdate');
        Route::get('categories', [CategoryController::class, 'index'])->name('categories');
        Route::get('categories/add', [CategoryController::class, 'add'])->name('categoriesAdd');
        Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('categoriesEdit');
        Route::post('categories', [CategoryController::class, 'addCategory'])->name('categoriesStore');
        Route::put('categories/{id}', [CategoryController::class, 'addUpdate'])->name('categoriesUpdate');
        Route::get('categories/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('categoriesDelete');
        Route::get('categories/softdeletes', [CategoryController::class, 'viewCategorySoftDelete'])->name('categoriesSoftDelete');
        Route::get('categories/restore/{id}', [CategoryController::class, 'restoreCategory'])->name('categoriesRestore');
        Route::get('categories/deletePermanent/{id}', [CategoryController::class, 'deletePermanentlyCategory'])->name('categoriesDeletePermanently');
    
        Route::get('/users', [UsersController::class, 'index'])->name('users');
        Route::get('/users/actived', [UsersController::class, 'actived'])->name('usersActived');
        Route::get('/users/detail/{slug}', [UsersController::class, 'detailUser'])->name('usersDetail');
        Route::post('/users', [UsersController::class, 'addUsers'])->name('usersStore');
        Route::get('/users/approve/{slug}', [UsersController::class, 'approveUser'])->name('approveUsers');
        Route::get('/users/banned/{slug}', [UsersController::class, 'banned'])->name('usersBanned');
        Route::get('/users/banUser', [UsersController::class, 'userBanned'])->name('usersBannedView');
        Route::get('/users/restore/{slug}', [UsersController::class, 'restoreUsers'])->name('usersRestore');
        Route::get('/users/banned-user/{slug}', [UsersController::class, 'bannedUsers'])->name('bannedUsers');




        Route::get('/rent-log', [RentLogController::class, 'index'])->name('rentLog');
    });    
});





