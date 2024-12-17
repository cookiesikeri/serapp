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
            // 'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create the user
        $user = User::create([
            // 'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Redirect to success page
        return redirect()->back();
    }



public function showSendEmailForm()
{
    return view('send_email'); // Points to a Blade view
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
