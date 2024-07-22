<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        return view('admin.user',['user'=>User::where('tipo','<>','Admin')->get()]);
    }

    public function store(Request $request){
        $user = null;
        if(!isset($request->id)){
            $user = new User();
        }else{
            $user = User::find($request->id);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tipo = "Funcionario";
        $user->password = bcrypt("1234funcionario");
        $user->save();
        return redirect()->back()->with("Sucesso","User Inserida com exito");
    }

    public function apagar($id){
        User::find($id)->delete();
        return redirect()->back()->with("Sucesso","User Eliminado com exito");
    }
}
