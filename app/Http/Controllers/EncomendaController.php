<?php

namespace App\Http\Controllers;

use App\Models\Encomenda;
use Illuminate\Http\Request;

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
        $encomenda->user_id = $request->user_id;
        $encomenda->data_entrega = $request->data_entrega;
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Encomenda $encomenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Encomenda $encomenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Encomenda $encomenda)
    {
        //
    }
}
