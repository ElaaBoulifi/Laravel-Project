<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Notifications\SubscribedSuccessfully;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email'
        ]);

        if ($validator->fails()) {
            // Si l'email existe déjà
            if ($validator->errors()->has('email')) {
                return back()->with('warning', 'Attention! Cet e-mail est déjà abonné.');
            }
            
            return back()->withErrors($validator);
        }

        $newSubscriber = Subscriber::create($request->only('email'));
        
        // Envoyer la notification
        $newSubscriber->notify(new SubscribedSuccessfully());

        return view('projet.sub');
    }
}
