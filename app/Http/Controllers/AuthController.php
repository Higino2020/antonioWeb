<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->back();
        }
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem a nenhum usuário.',
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }


}
