<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle login request
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        
        // Cek kredensial dan login
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Validasi role setelah login
            if (!in_array($user->role, ['admin','kasir','penggunting', 'penjahit', 'pemayet'])) {
                Auth::logout();
                return back()->withErrors(['role' => 'Akses tidak diperbolehkan untuk role ini.']);
            }
    
            // Redirect berdasarkan role
            if ($user->role == 'penggunting') {
                return redirect()->route('penggunting.data_pesanan');
            } elseif ($user->role == 'penjahit') {
                return redirect()->route('penjahit.data_pesanan');
            } elseif ($user->role == 'pemayet') {
                return redirect()->route('sequiner.orders');
            } elseif($user->role == 'admin'){
                return redirect()->route('admin.pengguna');
            } elseif($user->role == 'kasir'){
                return redirect()->route('kasir.data_customer');
            }
        }

        // Jika login gagal
        return back()->withErrors(['email' => 'Login gagal!']);
    }

    // Show register form
    public function showRegisterForm()
    {
        return view('register');
    }

    // Handle register request
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|min:8|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,kasir,penggunting,penjahit,pemayet',  // Validasi role
        ]);

        // Create new user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'role' => $validated['role'], // Menyimpan role yang dipilih
            'password' => bcrypt($validated['password']), // Enkripsi password
        ]);
        
        Auth::login($user); // Log the user in after registering

        return redirect()->route('login');
    }

    // app/Http/Controllers/AuthController.php
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
