<?php

namespace App\Controllers;

use App\Models\Customer;

class MainController extends Controller
{
    function home()
    {
        //$customers = Customer::all(); // works now déplacer dans CustomerController
        //dd($customers);
        render('main.home');
    }

    function about()
    {
        $texte = "ceci est mon about";
        render('main.about', ['message'=>$texte]); //indice tableau = variable dans la vue
        // dans views, crée folder layouts dans layouts je crée app.blade.php dans lequel je fais @yield('content') 
        //pour que toutes les pages html que je vais créer s'insèreront là
        // dans les pages home et about j'enlève le html
        // dans about j'écris en blade: @extends('layouts.app') et ensuite @section('content')
        // @yield peut servir pour les scripts javascrip: @yield('scripts')
    }
}