<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Plank\Mediable\Media;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\{
    CategoriaController,
    ClienteController,
    EncomendaController,
    EntradaController,
    ImagemController,
    ProdutoController
};
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('getfile/{name}',function($name){
    $path = '';
    $media = Media::whereBasename($name)->first();

    if ($media != null) {
        $path = $media->getDiskPath();
    } else {
        $path = 'default.png';
    }
    $img = Image::make($media->getAbsolutePath());
    $w = 300;
    $h = 300;

    if (request()->w != null) {
        $w = request()->w;
    }
    if (request()->h != null) {
        $h = request()->h;
    }
    // resize the image to a width of 300 and constrain aspect ratio (auto height)
    $img->resize($w, $h, function ($constraint) {
        $constraint->aspectRatio();
    });
    $img->stream();
    //Log::debug(storage_path() . '/app/' . $path);
    return (new Response($img->__toString(), 200))
        ->header('Content-Type', '*');
})->name('getfile');



Route::group(['prefix'=>'admin'],function(){
    Route::get('',function(){
        return view('admin.index');
    })->name('admin.inicio');

    Route::resource('produto', ProdutoController::class);
    Route::resource('cliente', ClienteController::class);
    Route::resource('entrada', EntradaController::class);
    Route::resource('encomenda', EncomendaController::class);
    Route::resource('categoria', CategoriaController::class);
    Route::resource('imagens', ImagemController::class);

    Route::get('perfil',function(){
        return view('admin.perfil');
    })->name('perfil');

    Route::get('produto/{id}/apagar',[ProdutoController::class,'apagar'])->name('produto.apagar');

});

Route::get('/',function(){
    return view('pages.index');
})->name('inicio');

Route::get('produto',function(){
    return view('pages.product');
})->name('produto')->middleware('auth');




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');