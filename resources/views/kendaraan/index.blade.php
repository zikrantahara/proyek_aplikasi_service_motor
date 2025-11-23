<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Data Kendaraan</h3>
                <div class="btn-group">
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary"><i
                            class="bi bi-arrow-left"></i> Data Pelanggan</a>
                    <a href="{{ url('/') }}" class="btn btn-secondary"><i class="bi bi-house-door-fill"></i></a>
                    <a href="{{ route('daftarservice.index') }}" class="btn btn-outline-primary">Selanjutnya: Daftar
                        Service <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="card-body">
                <a href="{{ route('kendaraan.create') }}" class="btn btn-primary mb-3">Tambah Kendaraan</a>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No Polisi</th>
                            <th>Jenis</th>
                            <th>No STNK</th>
                            <th>Tahun</th>
                            <th>Pemilik</th>
                            <th>Warna</th>
                            <th style="width: 15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kendaraans as $k)
                            <tr>
                                <td>{{ $k->no_polisi }}</td>
                                <td>{{ $k->jenis_kendaraan }}</td>
                                <td>{{ $k->no_stnk }}</td>
                                <td>{{ $k->tahun_pembuatan }}</td>
                                <td>{{ $k->nama_pemilik }}</td>
                                <td>{{ $k->warna }}</td>
                                <td class="text-center">
                                    <form action="{{ route('kendaraan.destroy', $k->id) }}" method="POST">
                                        <a href="{{ route('kendaraan.edit', $k->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Data Kendaraan belum tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $kendaraans->links() }}
            </div>
        </div>
    </div>
</body>

</html>
