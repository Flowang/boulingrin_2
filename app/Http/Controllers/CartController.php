<?php

namespace App\Http\Controllers;
use Cart;
use App\Product;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facade as Debugbar;


class CartController extends Controller
{
    public function index(){
        $cart = Cart::content();
        return view ('cart.index',[ 'data' => $cart]);
    }

    public function addItem($id)
    {
    $pro = product::find($id);
    Cart::add(['id' => $pro->id_prod, 'name' => $pro->nom, 'qty' => 1, 'price' => $pro->prix_unite, 'options' => ['description' => $pro->description,'img' => $pro->img]]);
    return back();
}

public function removeItem($id)
    {
        Cart::remove($id);
        return back();
    }

}
