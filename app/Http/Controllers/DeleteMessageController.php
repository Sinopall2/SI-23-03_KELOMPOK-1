<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteMessageController extends Controller
{
    public function destroy($id)
    {
        DB::table('contact_messages')->where('id', $id)->delete();
        return redirect()->route('dashboard')->with('success', 'Pesan berhasil dihapus.');
    }
}

