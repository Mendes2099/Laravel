<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandaController extends Controller
{
    public function banda(){
        return view('bandas.banda');
     }
}
