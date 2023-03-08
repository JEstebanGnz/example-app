<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/books',[\App\Http\Controllers\BooksController::class, 'index'])->name('books.index');
Route::get('/api/books',[\App\Http\Controllers\BooksController::class, 'getBooks'])->name('api.books.index');
Route::post('/books',[\App\Http\Controllers\BooksController::class, 'store'])->name('books.index');
Route::get('/books/create',[\App\Http\Controllers\BooksController::class, 'create'])->name('books.create');
Route::get('/books/{id}',[\App\Http\Controllers\BooksController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}',[\App\Http\Controllers\BooksController::class, 'update'])->name('books.update');
Route::delete('/books/{id}',[\App\Http\Controllers\BooksController::class, 'destroy'])->name('books.delete');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
