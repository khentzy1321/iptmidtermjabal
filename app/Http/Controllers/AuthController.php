<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use IIluminate\Support\Facades\Mail;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm(){
        if(auth()->check()){
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'password'       =>      'required|string',
            'email'          =>      'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || $user->email_verified_at == null){
            return redirect('/register')->with('error', ' Sorry your account is not yet verified or does not exist');
        }

        $login = auth()->attempt([
            'email'     =>     $request->email,
            'password'  =>     $request->password
        ]);

        if(!$login){
            return back()->with('error', 'Invalid credentials');
        }

        return redirect('/dashboard');
    }

    public function registerForm(){
        if(auth()->check()){
            return redirect('/dashboard');
        }

        return view('auth.register');
    }
    public function register(Request $request){
        $request->validate([
            'name'          =>      'required|string',
            'gender'        =>      'required|string',
            'email'         =>      'required|email|unique:users',
            'password'      =>      'required|confirmed|string|min:6'
        ]);

        $token = Str::random(24);

        $user = User::create([
            'name'                  => $request->name,
            'email'                 => $request->email,
            'gender'                => $request->gender,
            'password'              => bcrypt($request->password),
            'remember_token'        => $token
        ]);

        \Mail::send('auth.verification-mail', ['user' => $user], function($mail) use($user){
            $mail->to($user->email);
            $mail->subject('Account Verification');
        });

        return redirect('/log')->with('message', 'Your account has been created. Please check your email for verification.');
    }

    public function verification(User $user, $token){
        if($user->remember_token !== $token){
            return redirect('/register')->with('error', 'Invalid token. The attached token in invalid or has already has been consumed.');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/log')->with('message', 'Your account has been verified. You can login now.');

    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('message', 'Logged out successfully');
    }
}
