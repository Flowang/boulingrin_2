<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests;
use Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
           $products = Product::latest()->paginate();
            return view('product.index', compact('products'));

    }

    public function create()
    {
            return view('product.create');

    }

    public function store(Request $request)
    {
      $products = new Product();


       $data = $this->validate($request, [
            'nom'=>'required',
            'prix_unite'=>'required',
            'description'=>'required',
            'img'=> 'nullable',
        ]);

        $products->prix_unite = $data['prix_unite'];
        $products->description = $data['description'];
        $products->nom = $data['nom'];


   if ($request->hasFile('featured_image')) {
                $img = $request->file('featured_image');
                $filename =  time() . '.' . $img->getClientOriginalExtension();
                $location = public_path('img/' . $filename);
                Image::make($img)->resize(800, 400)->save($location);

                $filename = ('../img/') . $filename;
                $products->img = $filename;
            }
        $products->save();
        return redirect('product')->with('flash_message', 'Utilisateurs ajouté!');

    }


    public function show($id)
    {
        $products = Product::findOrFail($id);
        $products->select('id', 'nom', 'prix_unite','description')->findOrFail($id);
        return view('product.show', compact('products'));
    }


    public function edit($id)
    {

    $products = Product::where('id', $id)
                        ->first();

        return view('product.edit', compact('products','id'));
    }


    public function update(Request $request, $id)
    {
        $products = new Product();
        $data = $this->validate($request, [
            'nom'=>'required',
            'prix_unite'=>'required',
            'description'=>'required',
            'img'=> 'nullable',
        ]);
        $data['id'] = $id;

        $products = $products->find($data['id']);
        $products->prix_unite = $data['prix_unite'];
        $products->description = $data['description'];
        $products->nom = $data['nom'];


   if ($request->hasFile('files_img')) {
                $img = $request->file('files_img');
                $filename =  time() . '.' . $img->getClientOriginalExtension();
                $location = public_path('img/' . $filename);
                Image::make($img)->resize(800, 400)->save($location);

                $filename = ('../img/') . $filename;
                $products->img = $filename;
            }
        $products->save();

        return redirect('/product')->with('flash_message', 'Produit mis à jour!');
    }


    public function destroy($id)
    {
        //
    }
}
