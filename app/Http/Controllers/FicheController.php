<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Fiche;
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
        $fiches = Fiche::create($request->all());
        $data = $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            
        ]);

        $fiche->saveFiche($data);
        return redirect('fiches')->with('success', 'Nouvelle fiche crée !');
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

        ]);
        $data['id'] = $id;

        $fiches->updateFiche($data);
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