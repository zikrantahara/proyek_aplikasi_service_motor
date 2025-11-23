<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PelangganApiController extends Controller
{
    public function index()
    {
        $data = Pelanggan::all();
        return response()->json(['status' => true, 'message' => 'Data ditemukan', 'data' => $data], 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'errors' => $validator->errors()], 400);
        }
        $pelanggan = Pelanggan::create($request->all());
        return response()->json(['status' => true, 'message' => 'Data berhasil disimpan', 'data' => $pelanggan], 201);
    }
    public function show(string $id)
    {
        $data = Pelanggan::find($id);
        if ($data) {
            return response()->json(['status' => true, 'message' => 'Data ditemukan', 'data' => $data], 200);
        }
        return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
    }
    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'errors' => $validator->errors()], 400);
        }
        $pelanggan->update($request->all());
        return response()->json(['status' => true, 'message' => 'Data berhasil diupdate', 'data' => $pelanggan], 200);
    }
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }
        $pelanggan->delete();
        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
    }
}