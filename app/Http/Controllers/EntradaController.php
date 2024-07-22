<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entrada = Entrada::orderBy('id','DESC')->get();
        return view('admin.entrada', compact('entrada'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $entrada = null;
        if(isset($request->id)){
            $entrada = Entrada::find($request->id);
            $produto = Produto::find($request->produto_id);
            if($request->qtd > $entrada->qtd){
                $produto->qtd = $produto->qtd + ($request->qtd - $entrada->qtd); 
            }else{
                if($request->qtd < $entrada->qtd){
                    $produto->qtd = $produto->qtd - ($entrada->qtd - $request->qtd); 
                } 
            }
            $produto->save();
        }else{
            $entrada = new Entrada();
            $produto = Produto::find($request->produto_id);
            $produto->qtd = $produto->qtd + $request->qtd;
            $produto->save();
        }

        $entrada->qtd = $request->qtd;
        $entrada->data_entrada = $request->data;
        $entrada->descricao = $request->descricao;
        $entrada->produto_id = $request->produto_id;
        $entrada->user_id = Auth::user()->id;
        $entrada->preco = $request->preco;
        $entrada->total = $request->preco * $request->qtd;
        $entrada->save();
        return redirect()->back()->with('Sucesso','Entrada cadastrado com exito');
    }

    public function show( $entrada)
    {
        Entrada::find($entrada)->delete();
        return redirect()->back()->with("Sucesso","Entrada eliminada com exito");
    }
}
