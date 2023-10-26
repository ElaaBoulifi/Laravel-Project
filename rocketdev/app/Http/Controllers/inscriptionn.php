<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\formationModel;
use App\Models\User;
use App\Notifications\InscriptionNotification;
use Illuminate\Support\Facades\Auth;

class inscriptionn extends Controller
{



    public function create(Request $request)
    {   if (Auth::check()) {
        $user = Auth::user();
        $id_formation = $request->get('formation');
        return view('inscription.create', compact('id_formation', 'user'));
    }

       return redirect()->route('login');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string',
            'email' => 'required|string',
            'id_formation' => 'required|exists:formation,id',


        ]);

        $insription = new Inscription($data);
        $insription->save();

        $email = $data['email'];
        $nom = $data['nom'];
        $id_formation=$data['id_formation'];
        $formation = formationModel::find($id_formation);
        if($formation->prix == 0){
            $notification = new InscriptionNotification( $insription->id);

            $notification->toMail(null);


            $notification->email = $email;
            $notification->nom = $nom;

           \Illuminate\Support\Facades\Notification::route('mail', $email)->notify($notification);


           return view('inscription.list');
        }
        else{
            return view('stripe',['inscription' => $insription,'idinscri'=> $insription->id]);
        }


    }
    public function confirm($id)
{
    $inscription = Inscription::find($id);

    if ($inscription) {
        $inscription->etat = 'confirmé';
        $inscription->save();

        return view('inscription.confirmation');

    } else {
        return view('inscription.list');
    }
}

public function getall()
{
    $inscri = Inscription::paginate(5);

    return view('inscription.listinscri', ['inscription' => $inscri]);
}
public function destroy(Inscription $inscri)
{
    // Supprimez la formation
    $inscri->delete();

    return redirect()->route('inscription.listinscri')->with('success', 'Formation supprimée avec succès.');
}

}
