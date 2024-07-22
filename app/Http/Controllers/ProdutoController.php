<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use App\Models\Produto;
use Illuminate\Http\Request;
use Plank\Mediable\Facades\MediaUploader;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.produto');
    }

    
    public function store(Request $request)
    {
        $produto = null;
        $sms = "";
        $verify = Produto::where('codigo',$request->codigo)->first();
        if($verify != null){
            return redirect()->back()->with('Error', "Este codigo já se encontra em uso");
        }

        if(isset($request->id)){
            $produto = Produto::find($request->id);
            $sms = 'Produto actualizado com exito';
        }else{
            $produto = new Produto();
            $sms = 'Produto cadastrado com exito';
        }
        if (request()->hasFile('foto')) {
            $media = MediaUploader::fromSource(request()->file('foto'))
                ->toDirectory('produto')->onDuplicateIncrement()
                ->useHashForFilename()
                ->setAllowedAggregateTypes(['image'])->upload();
            $produto->foto = $media->basename;
        }
        $produto->codigo = $request->codigo;
        $produto->nome = $request->nome;
        $produto->medicao = $request->medicao;
        $produto->qtd = $request->qtd;
        $produto->preco = $request->preco;
        $produto->caducidade = $request->caducidade;
        $produto->perecivel = $request->perecivel;
        $produto->categoria_id = $request->categoria_id;
        $produto->estado = "Em Análise";
        $produto->save();
        return redirect()->back()->with('Sucesso', $sms);
    }

    public function show( $produto)
    {
        $produto  = Produto::find($produto);
        return view('admin.imagens',compact('produto'));
    }
    public function apagar( $produto)
    {
        $produto  = Produto::find($produto)->delete();
        return redirect()->back()->with('Sucesso','Produto Eliminado com exito');
    }

    public function alter_estado($id,$estado){ 
        $produto  = Produto::find($id);
        $produto->estado = $estado;
        $produto->save();
        return redirect()->back()->with('Sucesso','Estado do Produto alterado com sucesso para '.$estado);
    }

    public function imagens(Request $request){
        foreach($request->fotos as $foto){
            $img = new Imagem();
            //dd($foto);
            $media = MediaUploader::fromSource($foto)
                ->toDirectory('produto/img')->onDuplicateIncrement()
                ->useHashForFilename()
                ->setAllowedAggregateTypes(['image'])->upload();
            $img->imagem = $media->basename;
            $img->produto_id = $request->produto_id;
            $img->save();
        }
        return redirect()->back()->with('Sucesso','Imagens inserida com sucesso');
    }
}
