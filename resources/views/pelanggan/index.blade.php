<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Data Pelanggan</h3>
                <div class="btn-group">
                    <a href="{{ url('/') }}" class="btn btn-secondary"><i class="bi bi-house-door-fill"></i>
                        Dashboard</a>
                    <a href="{{ route('kendaraan.index') }}" class="btn btn-outline-primary">Selanjutnya: Data Kendaraan
                        <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="card-body">
                <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3">Tambah Pelanggan</a>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Pekerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggans as $p)
                            <tr>
                                <td>{{ $p->nama_lengkap }}</td>
                                <td>{{ $p->no_hp }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->pekerjaan }}</td>
                                <td>
                                    <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST">
                                        <a href="{{ route('pelanggan.edit', $p->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus?')">Hapus</button>
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
