<?php

namespace App\Http\Controllers;

use App\Notifications\ReclamationTraitee;
use Illuminate\Http\Request;
use App\Models\Reponse;
use Illuminate\Support\Facades\Notification;

class ReponseController extends Controller
{
    public function create(Request $request)
    {
        $reclamation_id = $request->get('reclamations');

        return view('reponses.create', compact('reclamation_id'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'contenu' => 'required|string',
            'reclamation_id' => 'required|exists:reclamations,id', 
            'piece_jointe' => 'file|max:2048'

        ]);
        
        $data['date_reponse'] = now();
       if ($request->hasFile('piece_jointe')) {
            $file = $request->file('piece_jointe');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('uploads');
            $file->move($destinationPath, $fileName);
            // Enregistrez le nom du fichier dans la base de données
            $data['piece_jointe'] = $fileName;
        }
       $reponse = Reponse::create($data);
       $reclamation = $reponse->reclamation;
       $reclamation->etat = 'traité';
       $reclamation->save();
    //    Notification::route('mail', $data['email'])
    //    ->notify(new ReponseMail());
    $userEmail = $reclamation->user->email; // Replace 'user' with your actual relationship method

    Notification::route('mail', $userEmail)->notify(new ReclamationTraitee());

        return redirect()->route('reclamations.admin_reclamations')->with('success', 'Réclamation soumise avec succès.');
    }
    public function show(Reponse $reponse)
    {
        return view('reponses.show', compact('reponse'));
    }
    public function showFront(Reponse $reponse)
    {
        return view('reponses.showFront', compact('reponse'));
    }


}
