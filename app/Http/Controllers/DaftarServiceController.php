<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class DaftarServiceController extends Controller
{
    public function index()
    {
        // Mengambil data beserta relasinya (with) agar query lebih cepat
        $services = DaftarService::with(['kendaraan', 'pelanggan'])->latest()->paginate(10);
        return view('daftarservice.index', compact('services'));
    }

    public function create()
    {
        // Kita kirim data kendaraan & pelanggan untuk Dropdown
        $kendaraans = Kendaraan::all();
        $pelanggans = Pelanggan::all();
        return view('daftarservice.create', compact('kendaraans', 'pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required',
            'pelanggan_id' => 'required',
            'keluhan' => 'required',
            'tanggal_servis' => 'required',
        ]);
        DaftarService::create($request->all());
        return redirect()->route('daftarservice.index')->with('success', 'Pendaftaran Service Berhasil!');
    }

    public function edit(DaftarService $daftarservice)
    {
        $kendaraans = Kendaraan::all();
        $pelanggans = Pelanggan::all();
        return view('daftarservice.edit', compact('daftarservice', 'kendaraans', 'pelanggans'));
    }

    public function update(Request $request, DaftarService $daftarservice)
    {
        $request->validate([
            'kendaraan_id' => 'required',
            'pelanggan_id' => 'required',
            'keluhan' => 'required',
            'tanggal_servis' => 'required',
        ]);
        $daftarservice->update($request->all());
        return redirect()->route('daftarservice.index')->with('success', 'Data Service Berhasil Diupdate');
    }

    public function destroy(DaftarService $daftarservice)
    {
        $daftarservice->delete();
        return redirect()->route('daftarservice.index')->with('success', 'Data Dihapus');
    }
}
