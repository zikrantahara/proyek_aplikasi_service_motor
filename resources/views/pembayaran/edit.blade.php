<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Edit Pembayaran Service</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Pilih Data Service</label>
                        <select name="data_service_id" class="form-select" required>
                            <option value="">-- Pilih Service --</option>
                            @foreach ($data_services as $ds)
                                <option value="{{ $ds->id }}"
                                    {{ $pembayaran->data_service_id == $ds->id ? 'selected' : '' }}>
                                    ID: {{ $ds->id }} - {{ $ds->daftar_service->pelanggan->nama_lengkap }}
                                    ({{ $ds->daftar_service->kendaraan->no_polisi }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jumlah Biaya Servis (Rp)</label>
                        <input type="number" name="jumlah_biaya" class="form-control"
                            value="{{ old('jumlah_biaya', $pembayaran->jumlah_biaya) }}" required placeholder="Input manual...">
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Jenis Pembayaran</label>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_pembayaran" id="cash"
                                value="Cash / Tunai"
                                {{ $pembayaran->jenis_pembayaran == 'Cash / Tunai' ? 'checked' : '' }}>
                            <label class="form-check-label" for="cash">Cash / Tunai</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_pembayaran" id="non_tunai"
                                value="Non Tunai" {{ $pembayaran->jenis_pembayaran == 'Non Tunai' ? 'checked' : '' }}>
                            <label class="form-check-label" for="non_tunai">Non Tunai</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="2">{{ old('keterangan', $pembayaran->keterangan) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Pembayaran</button>
                    <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>