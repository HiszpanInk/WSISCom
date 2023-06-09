<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function handleLoginAttemp(Request $request) {
        $isLogged = false;
        $user = User::where('username', $request->username)->firstOrFail();
        if($user == false) {
            return view('error', ['errorContent' => 'Incorrect login data!']);
        } else {
            return view('error', ['errorContent' => 'Correct login data!']);
        }
        
    }
}
