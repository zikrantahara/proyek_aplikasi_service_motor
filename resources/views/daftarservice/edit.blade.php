<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Daftar Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Edit Pendaftaran Service</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('daftarservice.update', $daftarservice->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">No Plat Kendaraan</label>
                        <select name="kendaraan_id" class="form-select" required>
                            <option value="">-- Pilih Kendaraan --</option>
                            @foreach ($kendaraans as $k)
                                <option value="{{ $k->id }}"
                                    {{ $daftarservice->kendaraan_id == $k->id ? 'selected' : '' }}>
                                    {{ $k->no_polisi }} - {{ $k->nama_pemilik }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Id Pelanggan</label>
                        <select name="pelanggan_id" id="pelanggan_id" class="form-select" required
                            onchange="isiNamaPelanggan()">
                            <option value="" data-nama="">-- Pilih ID Pelanggan --</option>
                            @foreach ($pelanggans as $p)
                                <option value="{{ $p->id }}" data-nama="{{ $p->nama_lengkap }}"
                                    {{ $daftarservice->pelanggan_id == $p->id ? 'selected' : '' }}>
                                    ID: {{ $p->id }} - {{ $p->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text" id="nama_pelanggan" class="form-control bg-light" readonly
                            value="{{ $daftarservice->pelanggan->nama_lengkap }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keluhan Kendaraan</label>
                        <textarea name="keluhan" class="form-control" rows="3" required>{{ $daftarservice->keluhan }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Servis</label>
                        <input type="date" name="tanggal_servis" class="form-control"
                            value="{{ $daftarservice->tanggal_servis }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                    <a href="{{ route('daftarservice.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        function isiNamaPelanggan() {
            var dropdown = document.getElementById("pelanggan_id");
            var selectedOption = dropdown.options[dropdown.selectedIndex];
            var nama = selectedOption.getAttribute("data-nama");
            document.getElementById("nama_pelanggan").value = nama;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
