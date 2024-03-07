<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use Illuminate\Http\Request;
use Plank\Mediable\Facades\MediaUploader;

class ImagemController extends Controller
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
        $imagem = null;
        $sms = "";
        if(isset($request->id)){
            $imagem = Imagem::find($request->id);
            $sms = 'Imagem actualizado com exito';
        }else{
            $imagem = new Imagem();
            $sms = 'Produto cadastrado com exito';
        }
        if (request()->hasFile('imagem')) {
            $media = MediaUploader::fromSource(request()->file('imagem'))
                ->toDirectory('produto')->onDuplicateIncrement()
                ->useHashForFilename()
                ->setAllowedAggregateTypes(['image'])->upload();
            $imagem->imagem = $media->basename;
        }
        $imagem->produto_id = $request->produto_id;
        $imagem->save();
        return redirect()->back()->with('Sucesso', $sms);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $imga = Imagem::find($id);
        $imga->delete();
        $sms = 'Imagem de produto Eliminado com exito';
        return redirect()->back()->with('Sucesso', $sms);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imagem $imagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imagem $imagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Imagem $imagem)
    {
        //
    }
}
