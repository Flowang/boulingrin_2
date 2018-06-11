<?php

namespace App\Http\Controllers;

use App\Joma;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Barryvdh\Debugbar\Facade as Debugbar;
use App\Http\Requests;


class JomaController extends Controller
{
    public function index()
    {
        $jomas = Joma::all();  

            return view('joma.index', compact('jomas'));
    }


    public function joma_production (Request $request,$id)
    {
        
        // SELECT * FROM `products`, `joma_users`, `jomas`, `users` WHERE joma_users.id_joma = jomas.id 
        // AND joma_users.id_users = users.id
        // AND users.id = products.users_id
        //AND jomas.id = 7

      
    $joma = Joma::where('id', $id)
                        ->first();

 

        $joma_products = DB::table('products')
        ->join('users','products.users_id', '=', 'users.id')        
        ->join('joma_users','joma_users.id_users', '=', 'users.id')
        ->join('jomas','joma_users.id_joma', '=', 'jomas.id')
        ->where('jomas.id','=',$joma->id)
        ->get();

// LE PROBLEME VIENS DES JOINS

        // ->where ('jomas.id','=','joma_users.id_joma')
        // ->where ('joma_users.id_users','=','users.id')
        // ->where ('products.id_users','=','users.id')
        // ->where ('jomas.id','=',$joma->id);
        return view('joma.product_select',compact('joma_products','joma'));
    }
}
