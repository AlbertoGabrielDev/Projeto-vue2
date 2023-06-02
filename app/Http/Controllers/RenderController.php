<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Models\Registro;
use Illuminate\Support\Facades\Hash;

class RenderController extends Controller
{
    public function index(): Response {
        return Inertia::render('Redirecionar');
    }

    public function register(Request $request){
      dd();
        $validatedData = $request->validate([
            'name' =>'required',
            'email'=>'required|email|unique:registro',
            'password'=> 'required|min:8|confirmed',
            'phone' =>'required'
        ]);

        $user= new Registro;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->phone = $validatedData['phone'];
        $user->save();

        return response()->json(['message'=>'Usuario cadastrado com sucesso.']);
    }
}
