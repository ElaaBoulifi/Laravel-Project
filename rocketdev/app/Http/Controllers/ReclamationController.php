<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;
use DB;
use Illuminate\Support\Facades\Auth;
class ReclamationController extends Controller
{

    public function index()
    {
        $user = Auth::user(); 
    
        if ($user) {
            $reclamations = Reclamation::where('user_id', $user->id)->get();
        } else {
            // Handle the case where no user is authenticated
            $reclamations = collect(); // An empty collection
        }
    
        return view('reclamations.index', compact('reclamations'));
    }
    

    public function create()
    {
        return view('reclamations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sujet' => 'required|string' ,
            'description' => 'required|string',
            'categorie' => 'required|string',
            'evaluation' => 'required|integer',
            'piece_jointe' => 'file|max:2048',

        ]);
        
        $data['date_soumission'] = now();
        $data['etat'] = 'en cours de traitement';
        if (auth()->check()) {
            $data['user_id'] = auth()->user()->id;
            $data['user_name'] = auth()->user()->name;
        } else {
            // Handle the case where there's no authenticated user (e.g., show an error message).
            // You might also want to set default values for 'user_id' and 'user_name'.
        }
        
        if ($request->hasFile('piece_jointe')) {
            $file = $request->file('piece_jointe');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('uploads');
            $file->move($destinationPath, $fileName);
            // Enregistrez le nom du fichier dans la base de données
            $data['piece_jointe'] = $fileName;
        }
        
    
        $reclamation = new Reclamation($data);
        $reclamation->user_id = Auth::user()->id; // Associate the authenticated user
        $reclamation->save();

        return redirect()->route('reclamations.index')->with('success', 'Réclamation soumise avec succès.');
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
    
        $reclamations = Reclamation::query();
    
        if (!empty($categorie)) {
            $reclamations->where('categorie', $categorie);
        }
    
        $reclamations = $reclamations->get();
    
        $reclamationsTraitees = Reclamation::where('etat', 'traité')->paginate(4);

        
        return view('reclamations.admin_reclamations', ['reclamations' => $reclamationsTraitees]);
    }    

    public function indexNonTraitees(Request $request)
    {
        $category = $request->input('categorie');
        $evaluation = $request->input('evaluation');
        $search = $request->input('search');

        $query = Reclamation::where('etat', 'en cours de traitement');

        if (!empty($category)) {
            $query->where('categorie', $category);
        }

        if (!empty($evaluation)) {
            $query->where('evaluation', $evaluation);
        }

        if (!empty($search)) {
            $query->where(function ($subquery) use ($search) {
                $subquery->where('sujet', 'like', '%' . $search . '%')
                    ->orWhere('categorie', 'like', '%' . $search . '%')
                    ->orWhere('evaluation', 'like', '%' . $search . '%');
            });
        }

        $reclamations = $query->paginate(4);

        return view('reclamations.admin_reclamations', compact('reclamations'));
    }

    public function list()
    {
        $data = Reclamation::paginate(5);; // Retrieve data from the database

        return view('reclamations.admin_reclamations', compact('data'));
       
    }

    public function trierReclamations(Request $request)
    {
        $column = $request->input('date_soumission');


        $reclamations = Reclamation::where('etat', 'traité')
        ->orderBy('evaluation', 'desc') // Pour un tri descendant
        ->get();
    
        return view('reclamations.admin_reclamations', compact('reclamations'));
    }

    public function show(Reclamation $reclamation)
    {
        $reponse = $reclamation->reponse;

        return view('reclamations.show', compact('reclamation', 'reponse'));
    }


    public function charts()
    {
        $monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        $data = Reclamation::select(DB::raw("MONTH(date_soumission) as month, COUNT(*) as count"))
            ->groupBy('month')
            ->get();
    
            $labels = $data->pluck('month')->map(function ($month) use ($monthNames) {
                return $monthNames[$month - 1]; 
            });
                $data = $data->pluck('count');
                if (Auth()->check()) {
                    // User is logged in.
                    $user = Auth()->user(); // Get the authenticated user.
                } else {
                    // User is not logged in.
                }
                
        return view('reclamations.charts', compact('labels', 'data'));
    }
    
}

