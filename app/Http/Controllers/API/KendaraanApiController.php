<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class KendaraanApiController extends Controller
{
    public function index()
    {
        $data = Kendaraan::all();
        return response()->json(['status' => true, 'message' => 'Data ditemukan', 'data' => $data], 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_polisi' => 'required',
            'jenis_kendaraan' => 'required',
            'no_stnk' => 'required',
            'tahun_pembuatan' => 'required',
            'nama_pemilik' => 'required',
            'warna' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'errors' => $validator->errors()], 400);
        }
        $kendaraan = Kendaraan::create($request->all());
        return response()->json(['status' => true, 'message' => 'Data berhasil disimpan', 'data' => $kendaraan], 201);
    }
    public function show(string $id)
    {
        $data = Kendaraan::find($id);
        if ($data) {
            return response()->json(['status' => true, 'message' => 'Data ditemukan', 'data' => $data], 200);
        }
        return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
    }
    public function update(Request $request, string $id)
    {
        $kendaraan = Kendaraan::find($id);
        if (!$kendaraan) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }
        $validator = Validator::make($request->all(), [
            'no_polisi' => 'required',
            'jenis_kendaraan' => 'required',
            'no_stnk' => 'required',
            'tahun_pembuatan' => 'required',
            'nama_pemilik' => 'required',
            'warna' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'errors' => $validator->errors()], 400);
        }
        $kendaraan->update($request->all());
        return response()->json(['status' => true, 'message' => 'Data berhasil diupdate', 'data' => $kendaraan], 200);
    }
    public function destroy(string $id)
    {
        $kendaraan = Kendaraan::find($id);
        if (!$kendaraan) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }
        $kendaraan->delete();
        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
    }
}
