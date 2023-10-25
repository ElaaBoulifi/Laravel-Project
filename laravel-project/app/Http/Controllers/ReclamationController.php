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
            'piece_jointe' => 'required|file|max:2048',

        ]);
        
        $data['date_soumission'] = now();
        $data['etat'] = 'en cours de traitement';

        if ($request->hasFile('piece_jointe')) {
            $file = $request->file('piece_jointe');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('uploads');
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

    public function destroyy($id)
    {
        $reclamation = Reclamation::findOrFail($id);
        $reclamation->delete();
        return redirect()->route('reclamations.admin_reclamations')->with('success', 'Réclamation supprimée avec succès.');
    }


    public function admin_reclamations()
    {
        // Affichez toutes les réclamations pour les administrateurs
        //$reclamations = Reclamation::all();
        $categorie = $request->input('categorie');
    
        $reclamations = Reclamation::query();
    
        if (!empty($categorie)) {
            $reclamations->where('categorie', $categorie);
        }
    
        $reclamations = $reclamations->get();
    
    
        $reclamationsTraitees = Reclamation::where('etat', 'traité')->get();

        
        return view('reclamations.admin_reclamations', ['reclamations' => $reclamationsTraitees]);
    }    

    public function indexNonTraitees(Request $request)
    {

        $search = $request->input('search');

        $query = Reclamation::where('etat' ,'en cours de traitement')
            ->when($search, function ($query) use ($search) {
                return $query->where(function ($subquery) use ($search) {
                    $subquery->where('sujet', 'like', '%' . $search . '%')
                            ->orWhere('categorie', 'like', '%' . $search . '%')
                            ->orWhere('evaluation', 'like', '%' . $search . '%');
                });
            })
            ->get();

            $order = $request->input('order', 'asc'); // Par défaut, tri ascendant

            $reclamations = $query->sortBy('date_soumission');
        

        return view('reclamations.admin_reclamations', compact('reclamations'));

    }    


    public function trierReclamations(Request $request)
    {
        $column = $request->input('date_soumission');

        // Effectuez la requête pour obtenir les données triées en utilisant $column

        $reclamations = Reclamation::where('etat', 'en cours de traitement')
        ->orderBy('evaluation', 'desc') // Pour un tri descendant
        ->get();
    
        return view('reclamations.admin_reclamations', compact('reclamations'));
    }

    public function show(Reclamation $reclamation)
    {
        $reponse = $reclamation->reponse;

        return view('reclamations.show', compact('reclamation', 'reponse'));
    }


}

