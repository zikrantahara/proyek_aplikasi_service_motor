<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DaftarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DaftarServiceApiController extends Controller
{
    public function index()
    {
        // Menggunakan with() agar data relasi pelanggan & kendaraan ikut tampil di JSON
        $data = DaftarService::with(['pelanggan', 'kendaraan'])->get();
        return response()->json(['status' => true, 'message' => 'Data ditemukan', 'data' => $data], 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kendaraan_id' => 'required',
            'pelanggan_id' => 'required',
            'keluhan' => 'required',
            'tanggal_servis' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'errors' => $validator->errors()], 400);
        }
        $daftarService = DaftarService::create($request->all());
        return response()->json(['status' => true, 'message' => 'Data berhasil disimpan', 'data' => $daftarService], 201);
    }
    public function show(string $id)
    {
        $data = DaftarService::with(['pelanggan', 'kendaraan'])->find($id);
        if ($data) {
            return response()->json(['status' => true, 'message' => 'Data ditemukan', 'data' => $data], 200);
        }
        return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
    }
    public function update(Request $request, string $id)
    {
        $daftarService = DaftarService::find($id);
        if (!$daftarService) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }
        $validator = Validator::make($request->all(), [
            'kendaraan_id' => 'required',
            'pelanggan_id' => 'required',
            'keluhan' => 'required',
            'tanggal_servis' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'errors' => $validator->errors()], 400);
        }
        $daftarService->update($request->all());
        return response()->json(['status' => true, 'message' => 'Data berhasil diupdate', 'data' => $daftarService], 200);
    }
    public function destroy(string $id)
    {
        $daftarService = DaftarService::find($id);
        if (!$daftarService) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }
        $daftarService->delete();
        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
    }
}
