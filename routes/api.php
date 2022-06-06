<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post("register", [AuthorController::class, "register"])->name('author.register');
Route::post("login", [AuthorController::class, "login"])->name('author.login');
Route::get("books/list", [BookController::class, "listBook"])->name('books.list');

Route::group(["middleware" => ["auth:api"]], function(){

    Route::get("profile", [AuthorController::class, "profile"])->name('author.profile');
    Route::post("logout", [AuthorController::class, "logout"])->name('author.logout');

    Route::post("book/create", [BookController::class, "createBook"])->name('book.create');
    Route::get("author/books", [BookController::class, "authorBook"])->name('author.books');
    Route::get("book/single/{id}", [BookController::class, "singleBook"])->name('book.single');
    Route::post("book/update/{id}", [BookController::class, "updateBook"])->name('book.update');
    Route::get("book/delete/{id}", [BookController::class, "deleteBook"])->name('book.delete');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
