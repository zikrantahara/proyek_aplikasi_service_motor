<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 mb-5">
        <div class="card border-0 shadow-sm rounded">
            <div class="card-header">
                <h3>Edit Data Kendaraan</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">No Polisi (Plat)</label>
                        <input type="text" name="no_polisi" class="form-control"
                            value="{{ old('no_polisi', $kendaraan->no_polisi) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block">Jenis Kendaraan</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kendaraan" id="matic"
                                value="Matic" {{ $kendaraan->jenis_kendaraan == 'Matic' ? 'checked' : '' }}>
                            <label class="form-check-label" for="matic">Matic</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kendaraan" id="manual"
                                value="Manual Transmisi"
                                {{ $kendaraan->jenis_kendaraan == 'Manual Transmisi' ? 'checked' : '' }}>
                            <label class="form-check-label" for="manual">Manual Transmisi</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No STNK</label>
                        <input type="text" name="no_stnk" class="form-control"
                            value="{{ old('no_stnk', $kendaraan->no_stnk) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Pembuatan</label>
                        <input type="number" name="tahun_pembuatan" class="form-control"
                            value="{{ old('tahun_pembuatan', $kendaraan->tahun_pembuatan) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Pemilik</label>
                        <input type="text" name="nama_pemilik" class="form-control"
                            value="{{ old('nama_pemilik', $kendaraan->nama_pemilik) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Warna Kendaraan</label>
                        <input type="text" name="warna" class="form-control"
                            value="{{ old('warna', $kendaraan->warna) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
