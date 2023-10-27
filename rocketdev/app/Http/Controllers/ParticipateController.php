<?php

namespace App\Http\Controllers;
use App\Models\Participate;
use App\Models\Events;

use Illuminate\Http\Request;

class ParticipateController extends Controller
{
    public function create(Request $request)
    {
        $event_id = $request->get('events');

        return view('participate.create', compact('event_id'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string',
            'email' => 'required|string',
            'tel' => 'required|string',
            'event_id' => 'required|exists:events,id',
        ]);

        $participate = new Participate($data);
        $participate->save();

     return redirect()->route('participate.create')->with('success', 'participation soumise avec succès.');
    }

}
