<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\projetModel;

class projetController extends Controller
{
    public function create()
    {
        return view('projet.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'duree' => 'required|integer',
            'date_debut' => 'required|date',
            'prix' => 'required|numeric',
        ]);
    
      
    

        $projets = new projetModel($data); // Utilisez le modèle
         
        $projets->save();

        return redirect()->route('projet');
    }
    public function getall(Request $request){
        $filter = $request->input('filter');
        $query = projetModel::query();
        
        if($filter == '24h') {
            $query->where('created_at', '>=', Carbon::now()->subDay());
        } elseif ($filter == 'week') {
            $query->where('created_at', '>=', Carbon::now()->subWeek());
        } elseif ($filter == 'month') {
            $query->where('created_at', '>=', Carbon::now()->subMonth());
        }
        
        $projets = $query->get();
        return view('projet.list', ['projet' => $projets]);

    }
    public function list()
    {
        $data = projetModel::paginate(5);; // Retrieve data from the database

        return view('projet.back', compact('data'));
       
    }
    public function index()
{
    $projets = projetModel::all();
    return view('projet.list', compact('projets'));
}
}
