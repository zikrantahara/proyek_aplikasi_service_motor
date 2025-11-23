<!DOCTYPE html>
<html lang="en">

<head>
    <title>Input Data Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Input Data Service (Mekanik)</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('dataservice.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Id Servis Pelanggan</label>
                        <select name="daftar_service_id" id="daftar_service_id" class="form-select" required
                            onchange="isiKeluhan()">
                            <option value="" data-keluhan="">-- Pilih ID Service --</option>
                            @foreach ($daftar_services as $ds)
                                <option value="{{ $ds->id }}" data-keluhan="{{ $ds->keluhan }}">
                                    ID: {{ $ds->id }} - {{ $ds->kendaraan->no_polisi }}
                                    ({{ $ds->pelanggan->nama_lengkap }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Keluhan Kendaraan</label>
                        <textarea id="keluhan" class="form-control bg-light" readonly rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Estimasi Service</label>
                        <input type="text" name="estimasi_service" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama Mekanik</label>
                        <input type="text" name="nama_mekanik" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Sparepart Pengganti</label>
                        <textarea name="sparepart_pengganti" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
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
</body>

</html>
