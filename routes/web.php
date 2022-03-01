<?php

use App\Http\Controllers\AssociationsController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\CupomsController;
use App\Http\Controllers\DiretoriasController;
use App\Http\Controllers\DiretoriaUsersController;
use App\Http\Controllers\ElementSitesController;
use App\Http\Controllers\ExPresidentesController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\LogadoController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MensagemsControler;
use App\Http\Controllers\MensPresidsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\ProductController;
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
Route::get('/galery/{galery}', [ExcmsController::class, 'galery'])->name('galery');
Route::get('/galeries', [ExcmsController::class, 'galeries'])->name('galeries');
Route::get('/detail-conv/{convenio}', [ExcmsController::class, 'detailConv'])->name('detail-conv');
Route::get('/consult/{convenio}', [ExcmsController::class, 'consultConv'])->name('consult');
Route::post('consult-cpf', [ExcmsController::class, 'consultCPF'])->name('consult-cpf');
Route::get('/history', [ExcmsController::class, 'history'])->name('history');
Route::get('/message-pres', [ExcmsController::class, 'messagePres'])->name('message-pres');
Route::get('/mensagem', [MensagemsControler::class, 'create'])->name('mensagems.create');
Route::post('mensagems', [MensagemsControler::class, 'store'])->name('mensagems.store');
Route::get('/nossaloja', [ExcmsController::class, 'nossaLoja'])->name('nossaloja');
Route::get('/produto/{product}', [ExcmsController::class, 'produto'])->name('produto');
Route::get('retorno', function (){ return view('logado.index'); });
Route::post('notification', [LogadoController::class, 'notification'])->name('notification');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [LogadoController::class, 'index'])->name('dashboard');

//Route::get('/send-email', [MailController::class, 'sendEmail']);

Route::group([
    'prefix' => 'logado', 'as' => 'logado.', 'middleware' => 'autorizador:logado'
], function (){
    Route::post('adicionar', [LogadoController::class, 'adiCar'])->name('carrinho.adicionar');
    Route::get('nossaloja/{order}/cont-compra', [LogadoController::class, 'edit'])->name('nossaloja.cont-compra');
    Route::get('nossaloja/{user}', [LogadoController::class, 'nossaLojaUser'])->name('nossaloja.comprar');
    Route::get('produto/{product}/{order}', [LogadoController::class, 'productCont'])->name('produto-cont');
    Route::put('produto/{order}', [LogadoController::class, 'update'])->name('carrinho.update');
    Route::get('pedido/{order}', [LogadoController::class, 'show'])->name('pedido.show');
    Route::get('pedido/edit/{order}', [LogadoController::class, 'editMyOrder'])->name('pedido.editMyOrder');
    Route::delete('pedido/{order}', [LogadoController::class, 'destroy'])->name('pedido.destroy');
    Route::get('pedidos/{user}', [LogadoController::class, 'myOrders'])->name('pedido.myorders');
    Route::post('atualiza', [LogadoController::class, 'atualizOrder'])->name('atualiza.order');
    Route::get('pedido/checkout/{order}', [LogadoController::class, 'checkOut'])->name('checkout');
    Route::post('pedido/desconto', [LogadoController::class, 'aplicaDesct'])->name('desconta.order');
    Route::get('checkout/pagseguro/{order}', [LogadoController::class, 'pagseguro'])->name('pagseguro');



});

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
    Route::resource('convenios', ConvenioController::class);
    Route::get('convenios/{convenio}/photo-rel', [ConvenioController::class, 'photorel'])->name('convenios.photorel');
    Route::resource('galeries', GaleryController::class);
    Route::get('galeries/{galery}/photo-rel', [GaleryController::class, 'photorel'])->name('galeries.photorel');


    Route::post('ckeditor/upload', [ElementSitesController::class, 'upload'])->name('ckeditor.image-upload');
    Route::resource('photos', PhotosController::class);
    Route::get('photo-upload', [PhotosController::class, 'upload'])->name('photos');
    Route::post('photo-upload', [PhotosController::class, 'photoUpload'])->name('photoUpload');

    Route::get('mensagems/index', [MensagemsControler::class, 'index'])->name('mensagems.index');
    Route::get('mensagems/{mensagem}', [MensagemsControler::class, 'show'])->name('mensagems.show');
    Route::get('mensagems/{mensagem}/edit', [MensagemsControler::class, 'edit'])->name('mensagems.edit');
    Route::put('mensagems/{mensagem}', [MensagemsControler::class, 'update'])->name('mensagems.update');
    Route::delete('mensagems/{mensagem}', [MensagemsControler::class, 'destroy'])->name('mensagems.destroy');
    Route::post('send-emails/{mensagem}', [MensagemsControler::class, 'sendEmail'])->name('sendEmail');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('products/{product}/photo-rel', [ProductController::class, 'photorel'])->name('products.photorel');

    Route::get('painel-loja/painel', [OrdersController::class, 'index'])->name('painel');
    Route::get('orders/{order}', [OrdersController::class, 'show'])->name('orders.show');
    Route::get('orders', [OrdersController::class, 'create'])->name('orders.create');
    Route::post('orders', [OrdersController::class, 'store'])->name('orders.store');

    Route::resource('cupoms', CupomsController::class);

});
