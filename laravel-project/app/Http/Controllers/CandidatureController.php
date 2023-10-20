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
            'cv' => 'required|mimes:pdf|max:4048',
            'tel' => 'required|string',
            'email' => 'required|string',
            'projet_id' => 'required|exists:projets,id', 
            'lettre_motivation' => 'required|string',    
        ]);
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvName = time() . '.' . $cv->getClientOriginalExtension();
            $cv->storeAs('uploads/cv/', $cvName, 'public');  // This will store the CV in `storage/app/public/uploads/cv/`
            $data['cv'] = $cvName;  // This will store the filename in the database
        }
        CandidatureModel::create($data);  // Utilisez la notation CamelCase pour le nom de la classe
       return view('condidature.list');
    }
    public function list(Request $request)
    {
        $query = CandidatureModel::query();

        $data = CandidatureModel::paginate(5);; // Retrieve data from the database
        $candidatures = $query->get();
        return view('condidature.back', ['candidatures' => $candidatures]);

   //     return view('condidature.back', compact('data'));
       
    }

    public function destroy($id)
    {
        $candidature = CandidatureModel::findOrFail($id);
        $projet_id = $candidature->projet_id; // récupérer le projet_id avant la suppression
        $candidature->delete();
    
        // Redirigez vers les candidatures du projet spécifique plutôt que vers toutes les candidatures
        return redirect()->route('showCandidatures', ['id' => $projet_id])->with('success', 'candidature supprimée avec succès.');
    }
    
public function showCandidatures($id)
{
    $candidatures = CandidatureModel::where('projet_id', $id)->get();
    return view('condidature.back', compact('candidatures'));
}


}

