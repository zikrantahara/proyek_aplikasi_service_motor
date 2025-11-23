<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daftar Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Daftar Antrian Service</h3>
                <div class="btn-group">
                    <a href="{{ route('kendaraan.index') }}" class="btn btn-outline-secondary"><i
                            class="bi bi-arrow-left"></i> Data Kendaraan</a>
                    <a href="{{ url('/') }}" class="btn btn-secondary"><i class="bi bi-house-door-fill"></i></a>
                    <a href="{{ route('dataservice.index') }}" class="btn btn-outline-primary">Selanjutnya: Proses
                        Service <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="card-body">
                <a href="{{ route('daftarservice.create') }}" class="btn btn-primary mb-3">Daftar Baru</a>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl Servis</th>
                            <th>No Plat</th>
                            <th>Pemilik / Pelanggan</th>
                            <th>Keluhan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $index => $s)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $s->tanggal_servis }}</td>
                                <td>{{ $s->kendaraan->no_polisi }}</td>
                                <td>{{ $s->pelanggan->nama_lengkap }}</td>
                                <td>{{ $s->keluhan }}</td>
                                <td>
                                    <form action="{{ route('daftarservice.destroy', $s->id) }}" method="POST">
                                        <a href="{{ route('daftarservice.edit', $s->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus antrian?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $services->links() }}
            </div>
        </div>
    </div>
</body>

</html>
