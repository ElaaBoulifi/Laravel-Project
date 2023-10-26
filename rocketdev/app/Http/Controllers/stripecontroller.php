<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\formationModel;
use App\Models\User;
use App\Notifications\InscriptionNotification;
use Stripe\Stripe;
use Stripe\Charge;


class stripecontroller extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        $inscriptionData = json_decode($request->input('inscription'));
        $idinscri=$request->input('idinscri');
        $insription = new Inscription((array) $inscriptionData);
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Création de la charge

            $charge = Charge::create([
                "amount" => 10000, // Montant en centimes (ex. 100,00 INR)
                "currency" => "inr", // Code de devise
                "source" => $request->stripeToken,
                "description" => "This payment is for testing purposes",
            ]);

            // Paiement réussi

            $notification = new InscriptionNotification($idinscri);

            //$notification->inscription_id = $insription ->id;

            $notification->toMail(null);


            $notification->email = $insription->email;
            $notification->nom = $insription->nom;

           \Illuminate\Support\Facades\Notification::route('mail', $insription->email)->notify($notification);


            return view('inscription.list');
    }

}
