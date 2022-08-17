<?php

namespace App\Http\Controllers;

use App\Http\Requests\createUserRequest;
use App\Http\Requests\loginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use UserTypesEnum;

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
            'password' => Hash::make($request->password, ['rounds' => 12])
        ]);

        // Return with success message
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

            if (auth()->user()->user_type === UserTypesEnum::USER) {
                // Redirect to user dashboard
                // return redirect()->intended('dashboard');
            } else if (auth()->user()->user_type === UserTypesEnum::ADMIN) {
                // Redirect to admin dashboard
                // return redirect()->intended('dashboard');
            }
        }

        return back()->withErrors([
            'The provided credentials do not match our records.',
        ])->onlyInput([$returnString]);
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
