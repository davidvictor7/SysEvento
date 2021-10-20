<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function index () { //Chama a tela inicial de Eventos
        return view('Layout.index');
    }
}
