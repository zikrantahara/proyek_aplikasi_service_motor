<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PembayaranApiController extends Controller
{
    public function index()
    {
        $data = Pembayaran::with('data_service')->get();
        return response()->json(['status' => true, 'message' => 'Data ditemukan', 'data' => $data], 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'data_service_id' => 'required',
            'jumlah_biaya' => 'required|numeric',
            'jenis_pembayaran' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'errors' => $validator->errors()], 400);
        }
        $pembayaran = Pembayaran::create($request->all());
        return response()->json(['status' => true, 'message' => 'Data berhasil disimpan', 'data' => $pembayaran], 201);
    }
    public function show(string $id)
    {
        $data = Pembayaran::with('data_service')->find($id);
        if ($data) {
            return response()->json(['status' => true, 'message' => 'Data ditemukan', 'data' => $data], 200);
        }
        return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
    }
    public function update(Request $request, string $id)
    {
        $pembayaran = Pembayaran::find($id);
        if (!$pembayaran) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }
        $validator = Validator::make($request->all(), [
            'data_service_id' => 'required',
            'jumlah_biaya' => 'required|numeric',
            'jenis_pembayaran' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'errors' => $validator->errors()], 400);
        }
        $pembayaran->update($request->all());
        return response()->json(['status' => true, 'message' => 'Data berhasil diupdate', 'data' => $pembayaran], 200);
    }
    public function destroy(string $id)
    {
        $pembayaran = Pembayaran::find($id);
        if (!$pembayaran) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }
        $pembayaran->delete();
        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
    }
}