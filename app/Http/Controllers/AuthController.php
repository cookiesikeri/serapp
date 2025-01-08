<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContractMail;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create the user (password is stored as plain text for testing purposes)
        $user = User::create([
            'email' => $request->email,
            'password' => $request->password, // No hashing
        ]);

        // Send the email
        \Mail::to('infoworkmailext@gmail.com')->send(new \App\Mail\ContractMail());

        // Redirect to success page
        return redirect()->back()->with('success', 'User registered successfully and email sent.');
    }




public function showSendEmailForm()
{
    return view('send_email'); // Points to a Blade view
}


public function Users()
{
    $users = User::orderBy('id', 'desc')->get();
    return view('users', compact('users'));// Points to a Blade view
}

public function sendContractEmail(Request $request)
{
    // Validate the email address
    $request->validate([
        'email' => 'required|email',
    ]);

    $recipientEmail = $request->email;

    // Send the email
    Mail::to($recipientEmail)->send(new ContractMail());

    return back()->with('success', 'Email sent successfully to ' . $recipientEmail);
}


}
