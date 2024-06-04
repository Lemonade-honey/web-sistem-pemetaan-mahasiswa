<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        try{
            if (Auth::attempt(["email" => $request->input('email'), "password" => $request->input("password")], $request->has("remember-me"))) {
                $request->session()->regenerate();
                
                Log::info("login auth by " . auth()->user()->email);
                return redirect()->intended('/');
            }

            return back()->withErrors([
                'email' => 'email atau password salah',
            ])->onlyInput('email');

        } catch (Throwable $th)
        {
            Log::error('login user error', [
                'class' => get_class(),
                'massage' => $th->getMessage()
            ]);

            return back()->withErrors(['gagal login coba lagi nanti !', $th->getCode()]);
        }
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6']
        ], [
            'name.min' => 'minimal panjang nama 3 karakter',
            'email.unique' => 'email sudah pernah digunakan',
            'password.min' => 'minimal panjang password 6 karakter'
        ]);


        try{

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]);

            $userProfile = \App\Models\UserProfile::create(['user_id' => $user->id, 'statistik_scores' => [0, 0, 0, 0]]);

            Log::info('user register baru', [
                'data' => $user
            ]);

            return redirect()->route('login');
        } catch(Throwable $th)
        {
            Log::error('register user error', [
                'class' => get_class(),
                'massage' => $th->getMessage()
            ]);

            return back()->withErrors(['gagal register coba lagi nanti !', $th->getCode()]);
        }
    }

    public function logout()
    {
        Log::info("logout by " . auth()->user()->email);

        Auth::logout();

        return redirect()->intended();
    }
}
