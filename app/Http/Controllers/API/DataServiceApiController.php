<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\DataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataServiceApiController extends Controller
{
    public function index()
    {
        $data = DataService::with('daftar_service')->get();
        return response()->json(['status' => true, 'message' => 'Data ditemukan', 'data' => $data], 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'daftar_service_id' => 'required',
            'estimasi_service' => 'required', // Sesuai revisi
            'nama_mekanik' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'errors' => $validator->errors()], 400);
        }
        $dataService = DataService::create($request->all());
        return response()->json(['status' => true, 'message' => 'Data berhasil disimpan', 'data' => $dataService], 201);
    }
    public function show(string $id)
    {
        $data = DataService::with('daftar_service')->find($id);
        if ($data) {
            return response()->json(['status' => true, 'message' => 'Data ditemukan', 'data' => $data], 200);
        }
        return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
    }
    public function update(Request $request, string $id)
    {
        $dataService = DataService::find($id);
        if (!$dataService) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }
        $validator = Validator::make($request->all(), [
            'daftar_service_id' => 'required',
            'estimasi_service' => 'required',
            'nama_mekanik' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'errors' => $validator->errors()], 400);
        }
        $dataService->update($request->all());
        return response()->json(['status' => true, 'message' => 'Data berhasil diupdate', 'data' => $dataService], 200);
    }
    public function destroy(string $id)
    {
        $dataService = DataService::find($id);
        if (!$dataService) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }
        $dataService->delete();
        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
    }
}
