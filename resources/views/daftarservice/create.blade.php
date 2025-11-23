<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Service Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header"><h3>Form Pendaftaran Service</h3></div>
            <div class="card-body">
                <form action="{{ route('daftarservice.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label>No Plat Kendaraan</label>
                        <select name="kendaraan_id" class="form-select" required>
                            <option value="">-- Pilih Kendaraan --</option>
                            @foreach($kendaraans as $k)
                                <option value="{{ $k->id }}">{{ $k->no_polisi }} - {{ $k->nama_pemilik }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Id Pelanggan</label>
                        <select name="pelanggan_id" id="pelanggan_id" class="form-select" required onchange="isiNamaPelanggan()">
                            <option value="" data-nama="">-- Pilih ID Pelanggan --</option>
                            @foreach($pelanggans as $p)
                                <option value="{{ $p->id }}" data-nama="{{ $p->nama_lengkap }}">
                                    ID: {{ $p->id }} - {{ $p->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Nama Pelanggan</label>
                        <input type="text" id="nama_pelanggan" class="form-control bg-light" readonly placeholder="Otomatis muncul saat ID dipilih...">
                    </div>
                    <div class="mb-3">
                        <label>Keluhan Kendaraan</label>
                        <textarea name="keluhan" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Servis</label>
                        <input type="date" name="tanggal_servis" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan Pendaftaran</button>
                    <a href="{{ route('daftarservice.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        function isiNamaPelanggan() {
            // Ambil elemen dropdown
            var dropdown = document.getElementById("pelanggan_id");            
            // Ambil opsi yang dipilih saat ini
            var selectedOption = dropdown.options[dropdown.selectedIndex];            
            // Ambil data nama dari atribut 'data-nama'
            var nama = selectedOption.getAttribute("data-nama");            
            // Isi ke input text Nama Pelanggan
            document.getElementById("nama_pelanggan").value = nama;
        }
    </script>
</body>
</html>