<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\YourEmailMailable; 
use Illuminate\Http\Request;

class EmailController extends Controller
{

    public function sendEmail(Request $request)
    {
        // Validate the request if needed
    
        $data = [
            // Data to pass to the email template
        ];
    
        Mail::to('oz.oussema@gmail.com')->send(new YourEmailMailable($data));
    
        return response()->json(['message' => 'Email sent successfully']);
    }
    
    //
}
