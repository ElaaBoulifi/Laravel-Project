<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidatureModel;  // Assurez-vous que ce chemin est correct
use App\Models\projetModel;

class CandidatureController extends Controller
{
    public function create(Request $request)
    {
        $projet_id = $request->get('projets');

        return view('condidature.create', compact('projet_id'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string',
            'projet_id' => 'required|exists:projets,id', 
            'lettre_motivation' => 'required|string',    
        ]);

        CandidatureModel::create($data);  // Utilisez la notation CamelCase pour le nom de la classe
        return view('condidature.list');
    }

    public function getall(){
        $candidature = CandidatureModel::all();
        return view('condidature.list');

    }

}

