<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Handle an authentication attempt.
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->profile == null) {
                return redirect()->route('profile.create');
            } else {
                return redirect('/');
            }
        }
        return back()->withErrors(['email' => 'Der Datensatz wurde nicht gefunden',])->onlyInput('email');
    }

    public
    function store(RegisterRequest $request)
    {
        $request->validate([
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
        $validated = $request->validated();
        if($validated) {
            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $credentials = $request->only('email', 'password');
            Auth::attempt($credentials);
            $request->session()->regenerate();
            return redirect()->route('profile.create')
                ->withSuccess('Du bist Erfolgreich registriert und eingeloggt!');
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public
    function login()
    {
        return view('user.login');
    }

    /**
     * @return \Illuminate\Http\Reponse
     */
    public
    function register()
    {
        return view('user.register');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public
    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login')
            ->withSuccess('You have logged out successfully!');;
    }
    function delete()
    {
        $user = Auth::user();
        $user->delete();
        return redirect('/');
    }
}
