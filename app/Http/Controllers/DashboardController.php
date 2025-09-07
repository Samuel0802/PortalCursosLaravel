<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   //Carregar a view da pagina inicial do admin
    public function index()
    {
        return view('dashboard.index');
    }
}
