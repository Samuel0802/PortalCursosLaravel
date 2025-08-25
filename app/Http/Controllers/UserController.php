<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
      return view('users.index');
    }

    public function create(){
      return view('users.create');
    }

    public function store(Request $request){

        try {

            User::create([
              'name' => $request->input('name'),
              'login' => $request->input('login'),
              'email' => $request->input('email'),
              'matricula' => $request->input('matricula'),
              'password' => $request->input('password'),
            ]);

            return redirect()->route('users.index')->with('success', 'Usuario Cadastrado com sucesso');

        } catch (\Exception $e) {

             return redirect()->route('users.create')->with('error', 'Erro ao cadastrar o usuario' . $e->getMessage());
        }
    }
}
