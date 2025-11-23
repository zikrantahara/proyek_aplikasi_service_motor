<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Riwayat Pembayaran</h3>
                <div class="btn-group">
                    <a href="{{ route('dataservice.index') }}" class="btn btn-outline-secondary"><i
                            class="bi bi-arrow-left"></i> Proses Service</a>
                    <a href="{{ url('/') }}" class="btn btn-primary"><i class="bi bi-house-door-fill"></i> Selesai
                        (Dashboard)</a>
                </div>
            </div>
            <div class="card-body">
                <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">Pembayaran Baru</a>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Total Biaya</th>
                            <th>Jenis Bayar</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayarans as $index => $p)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    {{ $p->data_service->daftar_service->pelanggan->nama_lengkap }} <br>
                                    <small
                                        class="text-muted">{{ $p->data_service->daftar_service->kendaraan->no_polisi }}</small>
                                </td>
                                <td>Rp {{ number_format($p->jumlah_biaya, 0, ',', '.') }}</td>
                                <td>
                                    <span
                                        class="badge {{ $p->jenis_pembayaran == 'Cash / Tunai' ? 'bg-success' : 'bg-info' }}">
                                        {{ $p->jenis_pembayaran }}
                                    </span>
                                </td>
                                <td>{{ $p->keterangan }}</td>
                                <td>
                                    <form action="{{ route('pembayaran.destroy', $p->id) }}" method="POST">
                                        <a href="{{ route('pembayaran.edit', $p->id) }}"
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
