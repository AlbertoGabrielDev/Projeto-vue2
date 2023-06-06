<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Models\Registro;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RenderController extends Controller
{
    public function cadastro(): Response {
        return Inertia::render('Cadastro');
    }

    public function index(): Response{
         return Inertia::render('Index');
    }
    public function register(Request $request){
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'name' =>'required',
                'email'=>'required|email|unique:registro',
                'password'=> 'required|min:8|confirmed',
                'phone' =>'required'
            ]);

            $registro = Registro::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'phone' => $validatedData['phone']
            ]);

            DB::commit();
            //  return Inertia::location('/index');
            
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            return response()->json(['message' => 'Ocorreu um erro durante o registro do usuário.'], 500);
        }
        
    }
    }

