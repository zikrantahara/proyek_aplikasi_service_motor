<?php

namespace App\Http\Controllers;

use App\Models\DataService;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DataServiceController extends Controller
{
    public function index()
    {
        $dataservices = DataService::with('daftar_service.pelanggan')->latest()->paginate(10);
        return view('dataservice.index', compact('dataservices'));
    }

    public function create()
    {
        // Ambil daftar service untuk dropdown
        $daftar_services = DaftarService::with(['kendaraan', 'pelanggan'])->get();
        return view('dataservice.create', compact('daftar_services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'daftar_service_id' => 'required',
            'estimasi_service' => 'required',
            'nama_mekanik' => 'required',
        ]);

        DataService::create($request->all());

        return redirect()->route('dataservice.index')->with('success', 'Data Service Berhasil Disimpan');
    }

    public function edit(DataService $dataservice)
    {
        $daftar_services = DaftarService::with(['kendaraan', 'pelanggan'])->get();
        return view('dataservice.edit', compact('dataservice', 'daftar_services'));
    }

    public function update(Request $request, DataService $dataservice)
    {
        $dataservice->update($request->all());
        return redirect()->route('dataservice.index')->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy(DataService $dataservice)
    {
        $dataservice->delete();
        return redirect()->route('dataservice.index')->with('success', 'Data Dihapus');
    }
}
