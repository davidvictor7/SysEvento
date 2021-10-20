<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class RoutesController extends Controller {
    public function sendView(Request $request){
        if($request ->idTab == null){
            return view('Layout.index');
        }
        return view($request -> idTab);
    }
}
