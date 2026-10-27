<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\InsightController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoryController::class, 'index'])->name('home');
Route::get('/kumpulan', [StoryController::class, 'index'])->name('stories.index');
Route::get('/kumpulan/{tag}', [StoryController::class, 'category'])->name('stories.category');
Route::get('/thread', [StoryController::class, 'index']);
Route::get('/thread/{tag}', [StoryController::class, 'category']);
Route::get('/blog/{tag}', [StoryController::class, 'category']);
Route::get('/home/{path?}', fn () => redirect()->route('home'))->where('path', '.*');

Route::get('/rss', [FeedController::class, 'index'])->name('feed');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:10,1');
Route::post('/login/login', [AuthController::class, 'login'])->middleware('throttle:10,1');
Route::post('/auth/login', [AuthController::class, 'login'])->middleware('throttle:10,1');
Route::get('/register', [AuthController::class, 'showRegistration'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:5,1');
Route::post('/login/register', [AuthController::class, 'register'])->middleware('throttle:5,1');
Route::post('/auth/register', [AuthController::class, 'register'])->middleware('throttle:5,1');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::get('/auth/login', fn () => redirect()->route('login'));
Route::get('/auth/register', fn () => redirect()->route('register'));
Route::get('/auth', fn () => redirect()->route('login'));
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendPasswordResetLink'])->middleware('throttle:5,1')->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('throttle:5,1')->name('password.store');
Route::get('/auth/forgot_password', fn () => redirect()->route('password.request'));
Route::get('/login/forgot_password', fn () => redirect()->route('password.request'));
Route::get('/auth/send_again', fn () => redirect()->route('password.request'));
Route::get('/login/{action}', function (string $action) {
    return in_array($action, ['register', 'signup'], true)
        ? redirect()->route('register')
        : redirect()->route('login');
});
Route::get('/auth_oa2/session/google', fn () => redirect()->route('login')->with('status', 'Login Google perlu konfigurasi OAuth baru.'));

Route::get('/insight', [InsightController::class, 'index'])->middleware('auth')->name('insight.index');
Route::get('/insight/addthread', [InsightController::class, 'create'])->middleware('auth')->name('insight.create');
Route::post('/insight/add_article', [InsightController::class, 'store'])->middleware('auth')->name('insight.store');

Route::post('/ajax/add_comment/{id}', [StoryController::class, 'comment'])->middleware('throttle:5,1')->name('legacy.comment');
Route::get('/ajax/show_article/{id}', [StoryController::class, 'showJson'])->middleware('auth')->name('legacy.story-json');
Route::get('/ajax/show_full_article/{id}', [StoryController::class, 'showJson'])->middleware('auth');
Route::get('/ajax/show_full_mobile_article/{id}', [StoryController::class, 'showJson'])->middleware('auth');
Route::get('/ajax/show_all_article', [StoryController::class, 'allArticles'])->middleware('auth');
Route::post('/ajax/update_article', [StoryController::class, 'updateArticle'])->middleware('auth');
Route::post('/ajax/upload_picture', [StoryController::class, 'uploadPicture'])->middleware('auth');
Route::post('/ajax/load', [StoryController::class, 'loadMore']);

Route::get('/art', [StoryController::class, 'index'])->name('authors.index');
Route::get('/art/{author}', [StoryController::class, 'author'])->name('authors.show');

Route::get('/page/{path}', [StoryController::class, 'showByPath'])->where('path', '.*');
Route::get('/p/{path}', [StoryController::class, 'showByPath'])->where('path', '.*');
Route::get('/{path}', [StoryController::class, 'showByPath'])->where('path', '.*')->name('stories.show');
