<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\DataService;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('data_service.daftar_service.pelanggan')->latest()->paginate(10);
        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create()
    {
        // Ambil data service yang belum dibayar (opsional logic) atau semua data service
        $data_services = DataService::with(['daftar_service.pelanggan', 'daftar_service.kendaraan'])->get();
        return view('pembayaran.create', compact('data_services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_service_id' => 'required',
            'jumlah_biaya' => 'required|numeric',
            'jenis_pembayaran' => 'required', // Radio button
        ]);

        Pembayaran::create($request->all());

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran Berhasil Disimpan');
    }

    public function edit(Pembayaran $pembayaran)
    {
        $data_services = DataService::with(['daftar_service.pelanggan'])->get();
        return view('pembayaran.edit', compact('pembayaran', 'data_services'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'data_service_id' => 'required',
            'jumlah_biaya' => 'required|numeric',
            'jenis_pembayaran' => 'required',
        ]);

        $pembayaran->update($request->all());

        return redirect()->route('pembayaran.index')->with('success', 'Data Pembayaran Diupdate');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Data Dihapus');
    }
}
