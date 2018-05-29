<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Fiche;
use Image;



class FicheController extends Controller
{
    public function index(Request $request)
    {
        $fiches = Fiche::where('user_id', auth()->user()->id)->get();
        return view('profile.fiche.index',compact('fiches'));
    }
    ######################    ######################    ######################    ######################    ######################    ######################

    public function create()
    {

           return view('profile/fiche/create');
    }
    ######################    ######################    ######################    ######################    ######################    ######################

    public function store(Request $request)
    {
   
$fiches = new Fiche();

            $fiches->user_id = auth()->user()->id;
            $fiches->title = $request->title;
            $fiches->description = $request->description;
            $fiches->img = $request->img;


     if ($request->hasFile('featured_image')) {
                $img = $request->file('featured_image');
                $filename =  time() . '.' . $img->getClientOriginalExtension();
                $location = public_path('img/' . $filename);
                Image::make($img)->resize(800, 400)->save($location);

                $filename = ('../img/') . $filename;
                $fiches->img = $filename;
            }

        $fiches->save();

        return redirect('fiches')->with('message', 'Nouvelle fiche crée !');
    }
        ######################    ######################    ######################    ######################    ######################    ######################

    public function show($id)
    {
        //
    }
        ######################    ######################    ######################    ######################    ######################    ######################

    public function edit($id)
    {       
    $fiches = Fiche::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();
        return view('profile.fiche.edit', compact('fiches','id'));
    }
        ######################    ######################    ######################    ######################    ######################    ######################

    public function update(Request $request, $id)
    {
         $fiches = new Fiche();
        $data = $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'img'=> 'nullable',

        ]);
        $data['id'] = $id;

        $fiches = $fiches->find($data['id']);
        $fiches->user_id = auth()->user()->id;
        $fiches->description = $data['description'];
        $fiches->title = $data['title'];

     if ($request->hasFile('featured_image')) {
                $img = $request->file('featured_image');
                $filename =  time() . '.' . $img->getClientOriginalExtension();
                $location = public_path('img/' . $filename);
                Image::make($img)->resize(800, 400)->save($location);

                $filename = ('../img/') . $filename;
                $fiches->img = $filename;
            }

        $fiches->save();

        return redirect('/fiches')->with('success', 'Fiche modifié avec succès');
    }
        ######################    ######################    ######################    ######################    ######################    ######################

    public function destroy($id)
    {
        $fiches = Fiche::find($id);
        $fiches->delete();
        return redirect('/home')->with('success', 'Fiche supprimé!!');
    }
}