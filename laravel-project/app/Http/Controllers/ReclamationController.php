<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;

class ReclamationController extends Controller
{

    public function index(){
        $reclamations = Reclamation::all();

        return view('reclamations.index', ['reclamations' => $reclamations]);
    }

    public function create()
    {
        return view('reclamations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sujet' => 'required|string',
            'description' => 'required|string',
            'categorie' => 'required|string',
            'evaluation' => 'required|integer',
            'piece_jointe' => 'nullable|file|max:2048', // Limitez la taille du fichier

        ]);
        $data['date_soumission'] = now(); // Enregistre la date actuelle

        // Ajouter l'état initial
        $data['etat'] = 'en cours de traitement'; // État initial
        if ($request->hasFile('piece_jointe')) {
            $file = $request->file('piece_jointe');
            // Générez un nom unique pour le fichier (par exemple, en utilisant le timestamp)
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Définissez le chemin complet de destination
            $destinationPath = public_path('uploads');
        
            // Déplacez le fichier téléchargé vers le dossier de destination
            $file->move($destinationPath, $fileName);
            
            // Enregistrez le nom du fichier dans la base de données
            $data['piece_jointe'] = $fileName;
        }
        
    
        $reclamation = new Reclamation($data);
        $reclamation->save();

        return redirect()->route('reclamations.create')->with('success', 'Réclamation soumise avec succès.');
    }
    public function destroy($id)
    {
        $reclamation = Reclamation::findOrFail($id);
        $reclamation->delete();
        return redirect()->route('reclamations.index')->with('success', 'Réclamation supprimée avec succès.');
    }

    public function admin_reclamations()
    {
        // Affichez toutes les réclamations pour les administrateurs
        $reclamations = Reclamation::all();
        return view('reclamations.admin_reclamations', ['reclamations' => $reclamations]);
    }
    

}

