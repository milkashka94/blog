<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('exit');

Route::get('/', App\Http\Controllers\User\IndexController::class)->name('main');
Route::get('/category', App\Http\Controllers\User\CategoryController::class)->name('categories');
Route::get('/category/{category}', App\Http\Controllers\User\CategoryController::class)->name('category');
Route::get('/tag', App\Http\Controllers\User\TagController::class)->name('tags');
Route::get('/tag/{tag}', App\Http\Controllers\User\TagController::class)->name('tag');
Route::get('/post/{post}', App\Http\Controllers\User\Post\ShowController::class)->name('post');
Route::get('/post/{post}/edit', App\Http\Controllers\User\Post\EditController::class)->middleware('staff')->name('post.edit');
Route::patch('/post/{post}/edit', App\Http\Controllers\User\Post\UpdateController::class)->middleware('staff')->name('post.update');
Route::delete('/post/{post}/delete', App\Http\Controllers\User\Post\DeleteController::class)->middleware('staff')->name('post.delete');
Route::post('/post/{post}/comment', App\Http\Controllers\User\Comments\StoreController::class)->name('comments.store');
Route::get('/offer', App\Http\Controllers\User\Offer\IndexController::class)->name('offer.index');
Route::post('/offer', App\Http\Controllers\User\Offer\StoreController::class)->name('offer.store');
Route::get('/authors', App\Http\Controllers\User\AuthorsController::class)->name('authors');
Route::get('/feedback', App\Http\Controllers\User\Feedback\IndexController::class)->name('feedback');
Route::post('/feedback', App\Http\Controllers\User\Feedback\StoreController::class)->name('feedback.store');
Route::get('/about', App\Http\Controllers\User\AboutController::class)->name('about');
Route::get('/vacancy', App\Http\Controllers\User\VacancyController::class)->name('vacancy');
Route::get('/team', App\Http\Controllers\User\TeamController::class)->name('team');

Route::prefix('profile')->group(function () {

    Route::get('/{name}', App\Http\Controllers\User\Profile\IndexController::class)->name('profile.index');
    Route::get('/{name}/comments', App\Http\Controllers\User\Profile\CommentController::class)->name('profile.comments');
    Route::get('/{name}/offers', App\Http\Controllers\User\Profile\OfferController::class)->name('profile.offers');
    Route::get('/{name}/edit', App\Http\Controllers\User\Profile\EditController::class)->name('profile.edit');
    Route::patch('/{user}/edit', App\Http\Controllers\User\Profile\UpdateController::class)->name('profile.update');

});

Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/', App\Http\Controllers\Admin\IndexController::class)->name('admin.index');

    Route::prefix('categories')->group(function () {
        Route::get('/', App\Http\Controllers\Admin\Category\IndexController::class)->name('categories.index');
        Route::get('/create', App\Http\Controllers\Admin\Category\CreateController::class)->name('categories.create');
        Route::post('/create', App\Http\Controllers\Admin\Category\StoreController::class)->name('categories.store');
        Route::get('/{category}/edit', App\Http\Controllers\Admin\Category\EditController::class)->name('categories.edit');
        Route::patch('/{category}', App\Http\Controllers\Admin\Category\UpdateController::class)->name('categories.update');
        Route::delete('/{category}', App\Http\Controllers\Admin\Category\DeleteController::class)->name('categories.delete');
    });

    Route::prefix('tags')->group(function () {
        Route::get('/', App\Http\Controllers\Admin\Tag\IndexController::class)->name('tags.index');
        Route::get('/create', App\Http\Controllers\Admin\Tag\CreateController::class)->name('tags.create');
        Route::post('/create', App\Http\Controllers\Admin\Tag\StoreController::class)->name('tags.store');
        Route::get('/{tag}/edit', App\Http\Controllers\Admin\Tag\EditController::class)->name('tags.edit');
        Route::patch('/{tag}', App\Http\Controllers\Admin\Tag\UpdateController::class)->name('tags.update');
        Route::delete('/{tag}', App\Http\Controllers\Admin\Tag\DeleteController::class)->name('tags.delete');
    });

    Route::prefix('posts')->group(function () {
        Route::get('/', App\Http\Controllers\Admin\Post\IndexController::class)->name('posts.index');
        Route::get('/create', App\Http\Controllers\Admin\Post\CreateController::class)->name('posts.create');
        Route::post('/create', App\Http\Controllers\Admin\Post\StoreController::class)->name('posts.store');
        Route::get('/{post}/edit', App\Http\Controllers\Admin\Post\EditController::class)->name('posts.edit');
        Route::patch('/{post}', App\Http\Controllers\Admin\Post\UpdateController::class)->name('posts.update');
        Route::delete('/{post}', App\Http\Controllers\Admin\Post\DeleteController::class)->name('posts.delete');

        Route::prefix('moderate')->group(function () {
            Route::get('/', App\Http\Controllers\Admin\Post\Moderate\IndexController::class)->name('moderation.index');
            Route::get('/{post}', App\Http\Controllers\Admin\Post\Moderate\ModerateController::class)->name('moderation.post');
            Route::patch('/{post}', App\Http\Controllers\Admin\Post\Moderate\UpdateController::class)->name('moderation.update');
            Route::delete('/{post}', App\Http\Controllers\Admin\Post\Moderate\DeleteController::class)->name('moderation.delete');
        });
    });

    Route::prefix('users')->group(function () {
        Route::get('/', App\Http\Controllers\Admin\User\IndexController::class)->name('users.index');
        Route::get('/create', App\Http\Controllers\Admin\User\CreateController::class)->name('users.create');
        Route::post('/create', App\Http\Controllers\Admin\User\StoreController::class)->name('users.store');
        Route::get('/{user}/edit', App\Http\Controllers\Admin\User\EditController::class)->name('users.edit');
        Route::patch('/{user}', App\Http\Controllers\Admin\User\UpdateController::class)->name('users.update');
        Route::delete('/{user}', App\Http\Controllers\Admin\User\DeleteController::class)->name('users.delete');
    });

    Route::prefix('comments')->group(function () {
        Route::get('/', App\Http\Controllers\Admin\Comment\IndexController::class)->name('comments.index');
        Route::get('/{comment}/edit', App\Http\Controllers\Admin\Comment\EditController::class)->name('comments.edit');
        Route::delete('/{comment}', App\Http\Controllers\Admin\Comment\DeleteController::class)->name('comments.delete');
        Route::patch('/{comment}', App\Http\Controllers\Admin\Comment\UpdateController::class)->name('comments.update');
    });

    Route::prefix('feedback')->group(function () {
        Route::get('/', App\Http\Controllers\Admin\Feedback\IndexController::class)->name('feedback.index');
        Route::get('/{message}', App\Http\Controllers\Admin\Feedback\ShowController::class)->name('feedback.show');
        Route::delete('/{message}', App\Http\Controllers\Admin\Feedback\DeleteController::class)->name('feedback.delete');
    });
});
