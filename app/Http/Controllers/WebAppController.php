<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebAppController extends Controller
{
    public function home() {
        return view('app.home');//qui metterai la home della tua webapp, (ragiona lato utente)
    }
}
