<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout()
    {
        Session::flush(); // Hapus semua data session
        return redirect('/login')->with('success', 'Anda telah logout.');
    }
}
