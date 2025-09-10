<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Controller pagina principal
class MainController extends Controller
{
   public function index(){
    //    dd("Carregando");
    return view('home');
   }
}
