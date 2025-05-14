<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Umkm;  // Make sure to import the correct model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    public function showPendaftaranForm()
    {
        return view('form_pendaftaran'); // Display the registration form
    }

    public function pendaftaran(Request $request)
    {
        // Validate input data
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi_toko' => 'required|string',
            'kategori_toko' => 'required|string',
            'alamat_toko' => 'required|string',
            'email' => 'required|email|unique:umkm,email',
            'no_telepon' => 'required|string|max:20',
            'password' => 'required|string|confirmed|min:6',
        ]);

        // Insert data into the database
        DB::table('umkm')->insert([
            'nama_toko' => $request->nama_toko,
            'deskripsi_toko' => $request->deskripsi_toko,
            'kategori_toko' => $request->kategori_toko,
            'alamat_toko' => $request->alamat_toko,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'password' => Hash::make($request->password),  // Encrypt password
        ]);

        // Redirect to dashboard after successful registration
        return redirect()->route('dashboard')->with('success', 'Pendaftaran berhasil.');
    }
}
