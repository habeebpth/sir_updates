<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FaqDoubtController;
use App\Http\Controllers\PlaceholderController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationRepresentativeController;

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

Route::get('/', [PostController::class, 'showHomepage'])->name('main.index');

// Placeholder image generation
Route::get('/placeholder/{width}/{height}', [PlaceholderController::class, 'generate'])
    ->where(['width' => '[0-9]+', 'height' => '[0-9]+'])
    ->name('placeholder.generate');

Auth::routes(['verify' => false]);

Route::prefix('posters')->group(function () {
    Route::get('/', [PosterController::class, 'index'])
        ->name('poster.index');
});

Route::prefix('about')->group(function () {
    Route::get('/', [AboutController::class, 'showAbout'])
        ->name('about.index');
});

// TODO Use `use` instead of `namespace`
Route::prefix('category')->namespace('App\Http\Controllers\Category')->group(function () {
    Route::get('/', 'IndexController')->name('category.index');
    Route::prefix('{category}/posts')->namespace('Post')->group(function () {
        Route::get('/', 'IndexController')->name('category.post.index');
    });
});

Route::prefix('post')->namespace('')->group(function () {
    Route::get('/{post}', [PostController::class, 'show'])->name('post.show');

    Route::prefix('{post}/comments')->middleware('auth')->group(function () {
        Route::post('/', 'App\Http\Controllers\Post\Comment\StoreController')->name('post.comments.store');
    });
    Route::prefix('{post}/likes')->middleware('auth')->group(function () {
        Route::post('/', 'App\Http\Controllers\Post\Like\StoreController')->name('post.likes.store');
    });
});

Route::prefix('personal')->namespace('')->middleware(['auth'])->group(function () {
    Route::get('/', 'App\Http\Controllers\Personal\Main\IndexController')->name('personal.main.index');


    Route::prefix('liked')->group(function () {
        Route::get('/', 'App\Http\Controllers\Personal\Liked\IndexController')->name('personal.liked.index');
        Route::delete('/{post}', 'App\Http\Controllers\Personal\Liked\DeleteController')->name('personal.liked.delete');
    });
    Route::prefix('comment')->group(function () {
        Route::get('/', 'App\Http\Controllers\Personal\Comment\IndexController')->name('personal.comment.index');
        Route::delete('/{comment}', 'App\Http\Controllers\Personal\Comment\DeleteController')->name('personal.comment.delete');
        Route::patch('/{comment}', 'App\Http\Controllers\Personal\Comment\UpdateController')->name('personal.comment.update');
        Route::get('/{comment}', 'App\Http\Controllers\Personal\Comment\EditController')->name('personal.comment.edit');
    });
});

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth', 'admin'])->group(function () {
    Route::prefix('main')->namespace('Main')->group(function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });
    Route::prefix('category')->namespace('Category')->group(function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
    });
    Route::prefix('tag')->namespace('Tag')->group(function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
    });
    Route::prefix('post')->namespace('Post')->group(function () {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/{post}', 'DeleteController')->name('admin.post.delete');
    });
    Route::prefix('user')->namespace('User')->group(function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
    });

    // Organization Representative Responses
    Route::get('/organization-representative', [OrganizationRepresentativeController::class, 'index'])
        ->name('admin.organization-representative.index');
    Route::get('/organization-representative/export', [OrganizationRepresentativeController::class, 'export'])
        ->name('admin.organization-representative.export');

});


// Display the form
Route::get('/data-collection-form', [OrganizationRepresentativeController::class, 'create'])
    ->name('organization-representative.create');
Route::get('/data-collection', [OrganizationRepresentativeController::class, 'create'])
    ->name('organization-representative.create');

// Store the form data
Route::post('/organization-representative', [OrganizationRepresentativeController::class, 'store'])
    ->name('organization-representative.store');

// API endpoint for fetching organization data (for auto-populate)
Route::get('/api/organization-representative/{organizationName}', [OrganizationRepresentativeController::class, 'getOrganizationData'])
    ->name('organization-representative.get-data');


Route::get('/data_collection', function () {
    return view('data_collection_form');
})->name('data.collection.form');



Route::get('/faqs', [FaqController::class, 'index'])->name('faq.index');
Route::post('/faqs/doubts', [FaqDoubtController::class, 'store'])->name('faq.doubts.store');

// Admin FAQ routes (protected by auth and admin middleware)
Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth', 'admin'])->group(function () {
    Route::prefix('faq')->namespace('Faq')->group(function () {
        Route::get('/', 'IndexController')->name('admin.faq.index');
        Route::get('/create', 'CreateController')->name('admin.faq.create');
        Route::post('/', 'StoreController')->name('admin.faq.store');
        Route::get('/doubts', 'DoubtIndexController')->name('admin.faq.doubts.index');
        Route::patch('/doubts/{doubt}', 'DoubtUpdateController')->name('admin.faq.doubts.update');
        Route::get('/{faq}', 'ShowController')->name('admin.faq.show');
        Route::get('/{faq}/edit', 'EditController')->name('admin.faq.edit');
        Route::patch('/{faq}', 'UpdateController')->name('admin.faq.update');
        Route::delete('/{faq}', 'DeleteController')->name('admin.faq.delete');
    });
});
