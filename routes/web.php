<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Plank\Mediable\Media;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\{
    AuthController,
    CategoriaController,
    ClienteController,
    EncomendaController,
    EntradaController,
    ImagemController,
    ProdutoController,
    UserController
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



Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('',function(){
        return view('admin.index');
    })->name('admin.inicio');

    Route::resource('produto', ProdutoController::class);
    Route::resource('cliente', ClienteController::class);
    Route::resource('entrada', EntradaController::class);
    Route::resource('categoria', CategoriaController::class);
    Route::resource('imagens', ImagemController::class);

    Route::get('perfil',function(){
        return view('admin.perfil');
    })->name('perfil');

    Route::get('produto/{id}/apagar',[ProdutoController::class,'apagar'])->name('produto.apagar');
    Route::post('produto/img',[ProdutoController::class,'imagens'])->name('produto.img');
    Route::post('actualizar',[UserController::class,'actualizar'])->name('user.actualizar');
    Route::post('senha',[UserController::class,'senha'])->name('user.senha');
});

Route::get('/',function(){
    return view('pages.index');
})->name('inicio');

Route::get('produto',function(){
    return view('pages.product',['produto'=>App\Models\Produto::orderBy('id','DESC')->paginate(12)]);
})->name('produto');

Route::get('produto/{id}/view',function($id){
    return view('pages.productview',['produto'=>App\Models\Produto::find($id)]);
})->name('product.view');

Route::post('entrar',[AuthController::class,'login'])->name('auth');
Route::group(['middleware'=>'auth'],function(){
    Route::get('sair',[AuthController::class,'logout'])->name('sair');
    Route::get('minhaEncomenda',[EncomendaController::class,'minhaEncomenda'])->name('my');
    Route::resource('encomenda', EncomendaController::class);
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');