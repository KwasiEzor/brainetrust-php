<?php

use App\Http\Controllers\AbonnementController;
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
use App\Http\Controllers\AboutClubController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\InterclubController;
use App\Http\Controllers\MailContactController;
use App\Http\Controllers\PlayScrabbleController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\ScGameController;

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

Route::get('/', [HomepageController::class, 'index'])->name('home-page');

Auth::routes();

Route::controller(AbonnementController::class)->group(function () {
    Route::get('/abonnement', 'index')->name('abonnement.index');
    Route::get('/abonnement/thank-you', 'paymentSuccess')->name('abonnement.thankyou');
    Route::get('/abonnement/amateur', 'amateurPurchase')->name('abonnement.amateur')->middleware('auth');
    Route::get('/abonnement/confirmed', 'confirmedPurchase')->name('abonnement.confirmed')->middleware('auth');
    Route::post('/abonnement/amateur', 'sendPayment')->name('abonnement.amateur-payment')->middleware('auth');
    Route::post('/abonnement/confirmed', 'sendPayment')->name('abonnement.confirmed-payment')->middleware('auth');
});

Route::controller(RankingController::class)->group(function () {
    Route::get('/classements', 'index')->name('rankings.index');
});

Route::controller(InterclubController::class)->group(function () {
    Route::get('/interclubs', 'index')->name('interclubs.index');
    Route::get('/interclubs/{interclub}', 'show')->name('interclubs.show');
    Route::get('/interclubs/club/{id}', 'fetchClubById')->name('interclubs.single-club');
});
Route::controller(ScGameController::class)->group(function () {
    Route::get('/amicales', 'index')->name('scgames.index');
    Route::get('/amicales/{scGame}', 'show')->name('scgames.show');
    Route::get('/files-export', 'exportFile')->name('files-export');
    Route::get('/pdf-export/{param}', 'createPDF')->name('pdf-export');
});
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
    Route::get('/agendas/create', 'create')->name('agendas.create');
    Route::post('/agendas', 'store')->name('agendas.store');
    Route::get('/agendas/{agenda}', 'edit')->name('agendas.edit');
    Route::put('/agendas/{agenda}', 'update')->name('agendas.update');
    Route::delete('/agendas/{agenda}', 'destroy')->name('agendas.delete');
});
Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/blog', 'index')->name('posts.index');
    Route::get('/posts/{param}', 'show')->name('posts.show');
    Route::get('/blog/{param}', 'show')->name('posts.show');
    Route::any('/search', 'search')->name('posts.search');
    Route::get('/posts', 'create')->name('posts.create');
    Route::post('/posts', 'store')->name('posts.store');
    Route::get('/posts/{post}', 'edit')->name('posts.edit');
    Route::put('/posts/{post}', 'update')->name('posts.update');
    Route::delete('/posts/{id}', 'destroy')->name('posts.delete');
});

Route::controller(AboutClubController::class)->group(function () {
    Route::get('/about', 'index')->name('about-page');
    Route::get('/infos', 'showInfos')->name('infos');
});
Route::controller(PlayScrabbleController::class)->group(function () {
    Route::get('/scrabble', 'index')->name('scrabble-page');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
});
