<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MagicLinkController extends Controller
{

    public function loginWithMagicLink()
    {
        // Verify the token against the one saved in the database or cache
        // Retrieve the email associated with the token
        $email = 'Ralfefernandes@hotmail.com';

        // log in the user with the email
        $user = User::where('email', $email)->first();
        if($user){
            Auth::login($user);
            // Redirect the user to the dashboard or desired page after successful login
            return redirect('/dashboard.index')->with('success', 'Logged in with success');
        }
        return redirect('/login')->with('error', 'Invalid magic Link');
    }
}
