<!DOCTYPE html>
<html lang="en">

<head>
    <title>Input Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Kasir Pembayaran Service</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('pembayaran.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Pilih Data Service</label>
                        <select name="data_service_id" class="form-select" required>
                            <option value="">-- Pilih Service --</option>
                            @foreach ($data_services as $ds)
                                <option value="{{ $ds->id }}">
                                    ID: {{ $ds->id }} - {{ $ds->daftar_service->pelanggan->nama_lengkap }}
                                    ({{ $ds->daftar_service->kendaraan->no_polisi }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Jumlah Biaya Servis (Rp)</label>
                        <input type="number" name="jumlah_biaya" class="form-control" required
                            placeholder="Input total biaya...">
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Jenis Pembayaran</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_pembayaran" value="Cash / Tunai"
                                required>
                            <label class="form-check-label">Cash / Tunai</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_pembayaran" value="Non Tunai"
                                required>
                            <label class="form-check-label">Non Tunai</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="2"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Bayar</button>
                    <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
