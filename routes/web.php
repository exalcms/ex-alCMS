<?php

use App\Http\Controllers\AssociationsController;
use App\Http\Controllers\DiretoriasController;
use App\Http\Controllers\DiretoriaUsersController;
use App\Http\Controllers\ElementSitesController;
use App\Http\Controllers\ExPresidentesController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\MensPresidsController;
use App\Http\Controllers\PhotosController;
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
Route::get('/history', [ExcmsController::class, 'history'])->name('history');
Route::get('/message-pres', [ExcmsController::class, 'messagePres'])->name('message-pres');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group([
    'prefix' => 'admin' , 'as' => 'admin.', 'middleware' => 'can:admin'
], function (){

    Route::name('dashboard-admin')->get('dashboard-admin', [UsersController::class, 'admin']);
    Route::resource('users', UsersController::class);
    Route::resource('assoc', AssociationsController::class);
    Route::resource('elems', ElementSitesController::class);
    Route::post('elems/ele', [ElementSitesController::class, 'atualiz'])->name('elems.myupdate');
    Route::resource('diret', DiretoriasController::class);
    Route::resource('compos', DiretoriaUsersController::class);
    Route::get('compos/{compo}/photo-rel', [DiretoriaUsersController::class, 'photorel'])->name('compos.photorel');
    Route::resource('menspres', MensPresidsController::class);
    Route::resource('expresids', ExPresidentesController::class);
    Route::get('expresids/{expresid}/photo-rel', [ExPresidentesController::class, 'photorel'])->name('expresids.photorel');


    Route::post('ckeditor/upload', [ElementSitesController::class, 'upload'])->name('ckeditor.image-upload');
    Route::resource('photos', PhotosController::class);
    Route::get('photo-upload', [PhotosController::class, 'upload'])->name('photos');
    Route::post('photo-upload', [PhotosController::class, 'photoUpload'])->name('photoUpload');

});
