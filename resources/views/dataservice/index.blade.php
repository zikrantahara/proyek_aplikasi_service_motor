<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Data Proses Service</h3>
                <div class="btn-group">
                    <a href="{{ route('daftarservice.index') }}" class="btn btn-outline-secondary"><i
                            class="bi bi-arrow-left"></i> Daftar Service</a>
                    <a href="{{ url('/') }}" class="btn btn-secondary"><i class="bi bi-house-door-fill"></i></a>
                    <a href="{{ route('pembayaran.index') }}" class="btn btn-outline-primary">Selanjutnya: Pembayaran <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="card-body">
                <a href="{{ route('dataservice.create') }}" class="btn btn-primary mb-3">Proses Service Baru</a>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Service</th>
                            <th>Mekanik</th>
                            <th>Estimasi</th>
                            <th>Sparepart</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataservices as $ds)
                            <tr>
                                <td>ID: {{ $ds->daftar_service_id }} <br> <small
                                        class="text-muted">{{ $ds->daftar_service->pelanggan->nama_lengkap }}</small>
                                </td>
                                <td>{{ $ds->nama_mekanik }}</td>
                                <td>{{ $ds->estimasi_service }}</td>
                                <td>{{ $ds->sparepart_pengganti }}</td>
                                <td>
                                    <form action="{{ route('dataservice.destroy', $ds->id) }}" method="POST">
                                        <a href="{{ route('dataservice.edit', $ds->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
