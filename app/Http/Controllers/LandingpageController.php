<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Pelanggan;

class LandingpageController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('landingpage', compact('products'));
    }

    public function beli()
    {
        $products = Product::all();
        $pelanggans = Pelanggan::all();
        $categories = Kategori::all();
    
        return view('landingpage.beli', compact('products', 'pelanggans', 'categories'));
    }

    public function store(Request $request)
    {
        // Validasi request jika diperlukan
        $validatedData = $request->validate([
            'tgl_beli' => 'required|date',
            'id_barang' => 'required',
            'kategori_id' => 'required',
            'id_pelanggan' => 'required',
        ]);

        // Simpan data ke dalam database
        $transaksi = new Transaksi([
            'tgl_beli' => $validatedData['tgl_beli'],
            'id_barang' => $validatedData['id_barang'],
            'kategori_id' => $validatedData['kategori_id'],
            'id_pelanggan' => $validatedData['id_pelanggan'],
            'keterangan' => $request->input('keterangan'), // Kolom tambahan, sesuaikan dengan kebutuhan
        ]);

        // Simpan transaksi ke dalam database
        $transaksi->save();

        // Redirect ke halaman landing page atau halaman lain yang sesuai
        return redirect()->route('landingpage.index')->with('success', 'Transaksi berhasil disimpan.');
    }
}
