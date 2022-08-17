<?php

namespace App\Http\Controllers;

use App\Enums\UserTypesEnum;
use App\Http\Requests\createUserRequest;
use App\Http\Requests\loginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     * Registers/Creates new users.
     *
     * @param  \App\Http\Requests\createUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(createUserRequest $request)
    {
        User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'user_type' => UserTypesEnum::USER,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Return with success message
        return redirect()->route('login')->with('success', 'Account created successfully!, proceed to login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \App\Http\Requests\loginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function login(loginRequest $request)
    {
        if ($request->username) {
            // Login with username
            $credentials = [
                "username" => $request->username,
                "password" => $request->password,
            ];
            $returnString = "username";
        } else {
            // Login with email
            $credentials = [
                "email" => $request->email,
                "password" => $request->password,
            ];
            $returnString = "email";
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect((auth()->user()->user_type === UserTypesEnum::ADMIN) ? '/': '/' );
        } else {
            return back()->withErrors([
                'The provided credentials do not match our records.',
            ])->onlyInput($returnString);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
