<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLoggedToken;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    //
    public function handleLoginAttemp(Request $request) {
        $user = User::where('username', $request->username)->first();
        if($user != false && Hash::check($request->password, $user->password)) {
            session(['username' => $user->username, 'user_id' => $user->id]);
            $tokenValue = bin2hex(openssl_random_pseudo_bytes(16));
            $token = new UserLoggedToken();
            $token->token = $tokenValue;
            $token->user_id = $user->id;
            $token->save();
            if($request->stayLoggedIn) {
                Cookie::queue('login_token', $tokenValue, 10);
            }
            session(['login_token' => $tokenValue]);
            return redirect()->route('index');
        } else {
            return view('error', ['error_content' => 'Incorrect login data!']);
        }
    }
    public function handleLogoutAttemp(Request $request) {
        session()->flush();
        if($request->hasCookie("login_token")) {
            $cookie_login_token = Cookie::get('login_token');
            foreach(UserLoggedToken::where('token', $cookie_login_token)->get() as $entry) {
                $entry->delete();
            }
        }
        Cookie::queue(Cookie::forget('login_token'));
        return redirect()->route('index');
    }
}
