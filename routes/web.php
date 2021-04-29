<?php

use App\Http\Controllers\AssociationsController;
use App\Http\Controllers\ElementSitesController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcmsController;

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



Route::get('/', [ExcmsController::class, 'index'])->name('/');
Route::get('/detail', [ExcmsController::class, 'detail'])->name('detail');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group([
    'prefix' => 'admin' , 'as' => 'admin.', 'middleware' => 'can:admin'
], function (){

    Route::name('dashboard-admin')->get('dashboard-admin', [UsersController::class, 'admin']);
    Route::resource('users', UsersController::class);
    Route::resource('assoc', AssociationsController::class);
    //Route::resource('elems', ElementSitesController::class);
    Route::get('elems', [ElementSitesController::class, 'index'])->name('elems.index');
    Route::get('elems/create', [ElementSitesController::class, 'create'])->name('elems.create');
    Route::get('elems/{elem}/edit', [ElementSitesController::class, 'edit'])->name('elems.edit');
    Route::get('elems/{elem}', [ElementSitesController::class, 'show'])->name('elems.show');
    Route::delete('elems/{elem}', [ElementSitesController::class, 'destroy'])->name('elems.destroy');
    Route::post('elems', [ElementSitesController::class, 'store'])->name('elems.store');
    Route::post('elems', [ElementSitesController::class, 'update'])->name('elems.update');


    Route::post('ckeditor/upload', [ElementSitesController::class, 'upload'])->name('ckeditor.image-upload');
    Route::resource('imgs', FileUpload::class);
    Route::get('image-upload', [FileUpload::class, 'createForm'])->name('imgs');
    Route::post('image-upload', [FileUpload::class, 'fileUpload'])->name('imageUpload');

});
