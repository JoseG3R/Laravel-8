<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        
        //$name = config('app.undefined', 'welcome');
        //dd($name);
        //dump($name);

        return view('welcome')->with([
            'products' => Product::all(),
        ]);
    }
}
