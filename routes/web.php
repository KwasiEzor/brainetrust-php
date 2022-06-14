<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailContactController;

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
    return view('home-page');
})->name('home-page');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts/categories/{category}', [CategoryController::class, 'categoriesWithPosts'])->name('category.posts');

Route::controller(ClubController::class)->group(function () {
    Route::get('/clubs', 'index')->name('clubs.index');
    Route::get('/clubs-data', 'getClubsData')->name('clubs.data');
    Route::get('/clubs/{id}', 'show')->name('clubs.show');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    // Route::get('/posts/categories/{category}', 'categoriesWithPosts')->name('posts.catgories');
});
Route::group(['middleware' => ['auth']], function () {
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('posts.addComment');
});

Route::controller(TagController::class)->group(function () {
    Route::get('/tags', 'index')->name('tags.index');
    Route::get('/tags/{tag}', 'show')->name('tags.show');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
});
Route::controller(MailContactController::class)->group(function () {
    Route::get('/contact', 'create')->name('contact-page');
    Route::post('/send-email', 'sendMail')->name('send-email');
});
Route::controller(AgendaController::class)->group(function () {
    Route::get('/agendas', 'index')->name('agendas.index');
});
Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/blog', 'index')->name('posts.index');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::any('/search', 'search')->name('posts.search');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
});
