<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Kendaraan</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('kendaraan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>No Polisi (Plat)</label>
                        <input type="text" name="no_polisi" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Jenis Kendaraan</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kendaraan" value="Matic"
                                required>
                            <label class="form-check-label">Matic</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kendaraan"
                                value="Manual Transmisi" required>
                            <label class="form-check-label">Manual Transmisi</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>No STNK</label>
                        <input type="text" name="no_stnk" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Tahun Pembuatan</label>
                        <input type="number" name="tahun_pembuatan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama Pemilik</label>
                        <input type="text" name="nama_pemilik" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Warna Kendaraan</label>
                        <input type="text" name="warna" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
