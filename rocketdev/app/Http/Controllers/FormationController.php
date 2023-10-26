<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\formationModel;


class FormationController extends Controller
{
    
    public function index()
    {
        // Votre logique pour la page d'accueil (index) ici
    }

    public function create()
    {
        return view('formations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'duree' => 'required|string',
            'date_debut' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'prix' => 'required|string'
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $formation = new formationModel($data);
        $formation->image = $imageName;
        $formation->save();

        return redirect()->route('formations.list')->with('success', 'Formation ajouté avec succès.');

    }

    public function getall()
    {
        $formations = formationModel::all();
        return view('share.home', ['formations' => $formations]);
    
    }

    public function list()
    {
        $formations = formationModel::paginate(5); // Récupérez les données de formation paginées
        return view('formations.list', ['formations' => $formations]); // Passez les données à la vue
    }

    public function edit(formationModel $formation)
    {
        return view('formations.edit', ['formation' => $formation]);
    }

    public function update(Request $request, formationModel $formation)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'duree' => 'required|string',
            'date_debut' => 'required|date',
            'prix' => 'required|string'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            
            $formation->image = $imageName;
        }
    
        // Mettez à jour les données de la formation
        $formation->update($data);
    
        return redirect()->route('formations.list')->with('success', 'Formation mise à jour avec succès.');
    }
    

    public function destroy(formationModel $formation)
    {
        // Supprimez la formation
        $formation->delete();

        return redirect()->route('formations.list')->with('success', 'Formation supprimée avec succès.');
    }



}
