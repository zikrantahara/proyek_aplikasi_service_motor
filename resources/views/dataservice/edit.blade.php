<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Edit Data Proses Service</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('dataservice.update', $dataservice->id) }}" method="POST">
                    @csrf
                    @method('PUT')                    
                    <div class="mb-3">
                        <label class="form-label">Id Servis Pelanggan</label>
                        <select name="daftar_service_id" id="daftar_service_id" class="form-select" required onchange="isiKeluhan()">
                            <option value="" data-keluhan="">-- Pilih ID Service --</option>
                            @foreach($daftar_services as $ds)
                                <option value="{{ $ds->id }}" 
                                        data-keluhan="{{ $ds->keluhan }}"
                                        {{ $dataservice->daftar_service_id == $ds->id ? 'selected' : '' }}>
                                    ID: {{ $ds->id }} - {{ $ds->kendaraan->no_polisi }} ({{ $ds->pelanggan->nama_lengkap }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keluhan Kendaraan</label>
                        <textarea id="keluhan" class="form-control bg-light" readonly rows="3">{{ $dataservice->daftar_service->keluhan }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estimasi Service</label>
                        <input type="text" name="estimasi_service" class="form-control" 
                               value="{{ old('estimasi_servie', $dataservice->estimasi_service) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Mekanik</label>
                        <input type="text" name="nama_mekanik" class="form-control" 
                               value="{{ old('nama_mekanik', $dataservice->nama_mekanik) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sparepart Pengganti</label>
                        <textarea name="sparepart_pengganti" class="form-control" rows="2">{{ old('sparepart_pengganti', $dataservice->sparepart_pengganti) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                    <a href="{{ route('dataservice.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        function isiKeluhan() {
            var dropdown = document.getElementById("daftar_service_id");
            var selectedOption = dropdown.options[dropdown.selectedIndex];
            var keluhan = selectedOption.getAttribute("data-keluhan");
            document.getElementById("keluhan").value = keluhan;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>