<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::latest()->paginate(10);
        return view('kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_polisi' => 'required',
            'jenis_kendaraan' => 'required', // Ini nanti dari radio button
            'no_stnk' => 'required',
            'tahun_pembuatan' => 'required',
            'nama_pemilik' => 'required',
            'warna' => 'required',
        ]);

        Kendaraan::create($request->all());

        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan Berhasil Disimpan');
    }

    public function edit(Kendaraan $kendaraan)
    {
        return view('kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, Kendaraan $kendaraan)
    {
        // Validasi sama seperti store...
        $request->validate([
            'no_polisi' => 'required',
            'jenis_kendaraan' => 'required',
            'no_stnk' => 'required',
            'tahun_pembuatan' => 'required',
            'nama_pemilik' => 'required',
            'warna' => 'required',
        ]);

        $kendaraan->update($request->all());

        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan Berhasil Diupdate');
    }

    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();
        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan Berhasil Dihapus');
    }
}
