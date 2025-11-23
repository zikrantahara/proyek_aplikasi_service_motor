<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Service Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content-wrapper {
            flex: 1;
        }

        .card {
            transition: transform 0.2s;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .icon-menu {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #0d6efd;
        }

        /* Style Footer */
        .footer-social-icon {
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-social-icon:hover {
            color: #adb5bd !important;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Sistem Informasi Service Motor</a>
        </div>
    </nav>

    <div class="content-wrapper">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Selamat Datang, Admin!</h2>
                <p class="text-muted">Silakan pilih menu di bawah ini untuk mengelola data.</p>
            </div>

            <div class="row g-4 justify-content-center">

                <div class="col-md-4 col-lg-3">
                    <a href="{{ route('pelanggan.index') }}" class="text-decoration-none text-dark">
                        <div class="card h-100 text-center p-4 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="icon-menu">👥</div>
                                <h5 class="card-title">Data Pelanggan</h5>
                                <p class="card-text small text-muted">Kelola data pemilik kendaraan.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-lg-3">
                    <a href="{{ route('kendaraan.index') }}" class="text-decoration-none text-dark">
                        <div class="card h-100 text-center p-4 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="icon-menu">🏍️</div>
                                <h5 class="card-title">Data Kendaraan</h5>
                                <p class="card-text small text-muted">Kelola data motor & spesifikasi.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-lg-3">
                    <a href="{{ route('daftarservice.index') }}" class="text-decoration-none text-dark">
                        <div class="card h-100 text-center p-4 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="icon-menu">📝</div>
                                <h5 class="card-title">Daftar Service</h5>
                                <p class="card-text small text-muted">Input antrian service baru.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-lg-3">
                    <a href="{{ route('dataservice.index') }}" class="text-decoration-none text-dark">
                        <div class="card h-100 text-center p-4 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="icon-menu">🔧</div>
                                <h5 class="card-title">Proses Service</h5>
                                <p class="card-text small text-muted">Input tindakan mekanik & sparepart.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-lg-3">
                    <a href="{{ route('pembayaran.index') }}" class="text-decoration-none text-dark">
                        <div class="card h-100 text-center p-4 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="icon-menu">💰</div>
                                <h5 class="card-title">Pembayaran</h5>
                                <p class="card-text small text-muted">Kasir pembayaran.</p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <footer class="bg-dark text-white pt-4 pb-3 mt-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-7 mb-3 mb-md-0">
                    <h5 class="mb-1">Sistem Informasi Service Motor</h5>
                    <p class="mb-0 small text-white-50">&copy; 2025 Project Akhir UAS - Teknologi Sistem Terintegrasi
                    </p>
                </div>

                <div class="col-md-5 text-md-end">
                    <a href="https://www.instagram.com/zikrantahara/" class="text-white me-3 fs-2 footer-social-icon"
                        title="Instagram" target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://id.linkedin.com/in/zikrantahara" class="text-white me-3 fs-2 footer-social-icon"
                        title="LinkedIn" target="_blank">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="https://wa.me/6288262653778" class="text-white fs-2 footer-social-icon" title="WhatsApp"
                        target="_blank">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>

            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
