<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Joma;
use App\Categorie;
use App\Http\Requests;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{

    public function index()
    {
        //    $products = Product::all();   //Sort tout les produits
            $products = Product::where('users_id', auth()->user()->id)->get();    //Sort juste les produits de l'utilisateurs
            $categories = Categorie::all();    //Sort juste les produits de l'utilisateurs

            // $products = Product::where('users_id', '1')->get();      Sort juste les produits qui ont users_id =  1
            return view('product.index', compact('products','categories'));

    }

    public function create()
    {           
        $categories = Categorie::select('id_cat', 'libelle')->get();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
    $products = new Product();
       $data = $this->validate($request, [
            'nom'=>'required',
            'prix_unite'=>'required',
            'description'=>'required',
            'img'=> 'nullable',
            'categories_id'=>'required',
        ]);


        $products->prix_unite = $data['prix_unite'];
        $products->description = $data['description'];
        $products->nom = $data['nom'];
        $products->categories_id = $data['categories_id'];


   if ($request->hasFile('featured_image')) {
                $img = $request->file('featured_image');
                $filename =  time() . '.' . $img->getClientOriginalExtension();
                $location = public_path('img/' . $filename);
                Image::make($img)->resize(800, 400)->save($location);

                $filename = ('../img/') . $filename;
                $products->img = $filename;
            }

        $products->users_id = Auth::id();
        $products->save();

        return redirect('product')->with('flash_message', 'Utilisateurs ajouté!');

    }


    public function show($id)
    {
        $products = Product::findOrFail($id);
        $products->select('id', 'nom', 'prix_unite','description','categories_id')->findOrFail($id);
        return view('product.show', compact('products'));
    }


    public function edit($id_prod)
    {
        
    $categories = Categorie::select('id_cat', 'libelle')->get();
    $products = Product::where('id_prod', $id_prod)
                        ->first();

        return view('product.edit', compact('products','id_prod','categories'));
    }


    public function update(Request $request, $id_prod)
    {
        // $products = new Product();
        $products = Product::all(); //TEST ID IL SORT DE OU CE FDP

        $products = Product::where('id_prod',  '=', $id_prod)->first(); //TEST ID IL SORT DE OU CE FDP


        // $data = $this->validate($request, [
        //     'nom'=>'required',
        //     'prix_unite'=>'required',
        //     'description'=>'required',
        //     'img'=> 'nullable',
        //     'categories_id'=>'required',

        // ]);


        // $data['id'] = $id;

        // $products = $products->find($data['id']);
        // $products->prix_unite = $data['prix_unite'];
        // $products->description = $data['description'];
        // $products->nom = $data['nom'];
        // $products->categories_id = $data['categories_id'];


   if ($request->hasFile('files_img')) {
                $img = $request->file('files_img');
                $filename =  time() . '.' . $img->getClientOriginalExtension();
                $location = public_path('img/' . $filename);
                Image::make($img)->resize(800, 400)->save($location);

                $filename = ('../img/') . $filename;
                $products->img = $filename;
            }

        // $products->save();
        $products->update($request->all());   //TEST ID IL SORT DE OU CE FDP

        return redirect('/product')->with('flash_message', 'Produit mis à jour!');
    }


    public function destroy($id)
    {
        //
    }


    public function productsCat(Request $request)
    {
        $id_cat = $request->id_cat;
        $id = $request->id;

if($id_cat!="" && $id!=""){
            // echo "les deux sont selectionné";
    $data = DB::table('products')
    ->join('categories','categories.id_cat','products.categories_id')
    ->where('products.categories_id',$id_cat)
    ->where('products.users_id',$id)
    ->get();
}
else if($id_cat!=""){
        // echo "il y a que la cat selectionné";
    $data = DB::table('products')
    ->join('categories','categories.id_cat','products.categories_id')
    ->where('products.categories_id',$id_cat)
    // ->where('products.users_id',$id)
    ->get();
}
else if($id!=""){
    // echo "il y a que le commerçant selectionné";
    $data = DB::table('products')
    ->join('categories','categories.id_cat','products.categories_id')
    // ->where('products.categories_id',$id_cat)
    ->where('products.users_id',$id)
    ->get();
}
    return view('joma.product_page',[
        'data' => $data,
    ]);
    
    }


    public function commercantsCat(Request $request)
    {
    $id = $request->id;
    $data = DB::table('products')
    ->join('users','users.id','products.users_id')
    ->where('products.users_id',$id)
    ->get();

    return view('joma.product_page',[
        'data' => $data
    ]);
    }
}
