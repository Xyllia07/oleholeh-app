<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class PembeliController extends Controller
{
    public function index()
    {
        // Mencegah Admin nyasar ke halaman katalog pembeli biasa
        if (Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        $all_barang = Barang::all();
        return view('katalog_pembeli', compact('all_barang'));
    }
}
