<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreelancerModel;
use Flash;
class FreelancerController extends Controller
{
    //
    public function index()
    {
        return view('Freelancer.index');
    }

    public function list()
    {
        $data = FreelancerModel::paginate(5);; // Retrieve data from the database

        return view('Freelancer.list', compact('data'));
       
    }


    public function create()
    {
        return view('Freelancer.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'specialite' => 'required|string',
            'disponibilite' => 'required|string',
        ]);
    
        $newFreelancer = FreelancerModel::create($data);
    
        session()->flash('success', 'Freelancer created successfully!, you will be redirected to the freelancers list in 3 seconds');
    
        return view('freelancer.create');
    }
}
