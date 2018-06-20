<?php

namespace App\Http\Controllers;

use App\Joma;
use App\Product;
use App\User;
use App\Categorie;
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
        
    $categories = Categorie::all();
    $users = User::all();


        $joma = Joma::where('id', $id)
                        ->first();

        $joma_products = DB::table('products')
        ->join('users','products.users_id', '=', 'users.id')        
        ->join('joma_users','joma_users.id_users', '=', 'users.id')
        ->join('jomas','joma_users.id_joma', '=', 'jomas.id')
        ->where('jomas.id','=',$joma->id)
        ->get();

        return view('joma.product_select',compact('joma_products','joma','categories','users'));
    }
}
