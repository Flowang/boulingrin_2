<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Joma;
use App\Product;
use App\User;
use App\Http\Requests;


class JomaController extends Controller
{
    public function index()
    {
        $jomas = Joma::all();  
            return view('joma.index', compact('jomas'));
    }
}
