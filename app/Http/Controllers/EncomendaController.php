<?php

namespace App\Http\Controllers;

use App\Models\Encomenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EncomendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $encomenda = null;
        if(!isset($request->id)){
            $encomenda = new Encomenda();
        }else{
            $encomenda = Encomenda::find($request->id);
        }
        $encomenda->qtd = $request->qtd;
        $encomenda->produto_id = $request->produto_id;
        $encomenda->user_id = Auth::user()->id;
        $encomenda->estado = "Em Analise";
        $encomenda->save();
        return redirect()->back()->with('Sucesso','encomenda Inserido com exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Encomenda $encomenda)
    {
        //
    }

    public function minhaEncomenda(){
        return view('pages.encomendas',['encomenda'=>Encomenda::where('user_id',Auth::user()->id)->paginate(10)]);
    }
}
