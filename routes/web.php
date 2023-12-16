<?php

use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('main');
});
Route::get('/الصفحة-الرئيسية', [HomeController::class, 'index'])->name('main');
Route::get('/search', [HomeController::class, 'search'])->name('search');


route::get('/عن-الكلية', function () {
    return view('home.about');
})->name('about');
Route::get('الاخبار', [NewsController::class, 'index'])->name('blog');

Route::resource('/admin/user', UsersController::class)->only(['index', 'update', 'edit', 'destroy'])->middleware('super');

Route::middleware(['auth', 'AdminOrSuper'])->group(function () {
    Route::resource('/admin/pages', PagesController::class, ['except' => 'show'])->names('admin');
    Route::resource('/admin/news', NewsController::class)->except('show')->names('news');
    Route::get('/admin/news', [NewsController::class, 'admin'])->name('newscontroller@admin');
    Route::get('/admin/settings', [SettingsController::class, 'index'])->name('setting');
    Route::put('/admin/settings/update', [SettingsController::class, 'update'])->name('setting/update');
    Route::post('/settings', [SettingsController::class, 'store'])->name('settings.store');
    Route::put('/admin/settings/{setting}', [SettingsController::class, 'update'])->name('settings.update');
});


//--------------------------------
Route::fallback(function () {
    abort(404);
});
//--------------------------------


require __DIR__ . '/auth.php';
