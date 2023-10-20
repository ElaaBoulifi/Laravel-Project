<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\formationModel;




class FormationController extends Controller
{
    // Vos méthodes de contrôleur vont ici
    public function create()
{
    return view('formations.create');
}

    public function store(Request $request)
    {
        // Validez les données du formulaire
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            // Ajoutez d'autres règles de validation ici
        ]);

        // Créez une nouvelle formation en utilisant le modèle formationModel
        $formation = new formationModel($data); // Utilisez le modèle
         
        // Enregistrez la formation
        $formation->save();

        // Redirigez vers la page d'affichage de la formation ou ailleurs
        return redirect()->route('formations.create');
    }
    public function getall(){
      $formations = formationModel::all();
     return view('share.home', ['formations' => $formations]);

    }




}
