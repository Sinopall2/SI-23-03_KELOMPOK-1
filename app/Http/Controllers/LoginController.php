<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        // Jika user sudah login, arahkan ke dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // Jika belum login, tampilkan halaman login
        return view('login');
    }
}
