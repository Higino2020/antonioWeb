<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view();
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
        $user = null;
        $cliente = null;
        if(!isset($request->id)){
            $cliente = new Cliente();
            $user  = User::create([
                'name' =>$request->nome,
                'email' => $request->email,
                'tipo' => 'Cliente',
                'password' => $request->password
            ]);
            $cliente->user_id = $user->id;
        }else{
            $cliente = Cliente::find($request->id);
        }

        $cliente->nome = $request->nome;
        $cliente->provincia = $request->provincia;
        $cliente->municipio = $request->municipio;
        $cliente->zona = "N/A";
        $cliente->bairro = $request->bairro;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;
        $cliente->save();

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->back();
        }
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem a nenhum usuário.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->back()->with('Sucesso','Cliente eliminado com exito');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
