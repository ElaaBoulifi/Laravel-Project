<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;


class EventController extends Controller
{
       
    public function index()
    {
        $event = Events::all();

        return view('events.index', ['events' => $event]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'lieu' => 'required|string',
            'desc' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $events = new Events($data);
        $events->image = $imageName;
        $events->save();

        return redirect()->route('events.list')->with('success', 'event ajouté avec succès.');


        
    }

    public function getall()
    {
        $events = Events::all();
        return view('share.home', ['events' => $events]);
    }

    public function list()
    {
        $events = Events::paginate(5); // Récupérez les données de formation paginées
        return view('events.list', ['events' => $events]); // Passez les données à la vue
    }

  
    
    public function edit(Events $events)
    {
        return view('events.edit', ['events' => $events]);
    }

    public function update(Request $request, Events $events)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'lieu' => 'required|string',
            'desc' => 'required|string',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            
            $events->image = $imageName;
        }
    
        // Mettez à jour les données events
        $events->update($data);
    
        return redirect()->route('events.list')->with('success', 'event mise à jour avec succès.');
    }
    

    public function destroy(Events $events)
    {
        // Supprimez events
        $events->delete();

        return redirect()->route('events.list')->with('success', 'event supprimée avec succès.');


}
}