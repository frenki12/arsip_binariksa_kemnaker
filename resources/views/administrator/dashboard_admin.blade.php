<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Panggil file CSS dan JS melalui Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="d-flex">
        {{-- Sidebar --}}
        @include('layouts.sidebar')
    </div>

    <!-- Content -->
    <div class="content p-4" id="content">
        <!-- Header + Toggle -->
        <div class="header-content d-flex justify-content-between align-items-center shadow-sm">
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-secondary btn-sm me-3" id="toggleSidebar">
                    <i class="bi bi-list"></i>
                </button>
                <h4 class="mb-0 fw-bold">DASHBOARD</h4>
            </div>
            <div class="d-flex align-items-center">
                <button class="btn btn-light btn-sm me-2">
                    <i class="bi bi-bell"></i>
                </button>
                <button class="btn btn-light btn-sm">
                    <i class="bi bi-gear"></i>
                </button>
            </div>
        </div>

        <!-- SUBTITLE -->
        <p class="text-muted mt-3 mb-4">Ringkasan dan statistik arsip surat</p>
        <!-- Stats -->
        <div class="row g-3 mb-4 justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div
                    class="card card-feature text-center border-0 d-flex align-items-center justify-content-center flex-column p-3">
                    <a href="{{ route('dokumen.divisi', 'semua') }}" class="text-decoration-none text-dark">


                        <div class="icon-wrapper-with-text mb-2 cursor-pointer">
                            <img src="/img/letter.svg" alt="Icon Surat" width="40" height="40" class="mb-1">

                            <div class="icon-text">
                                <h6 class="fw-semibold mb-0">Total Surat</h6>
                                <h3 class="mb-0">{{ $totalSurat ?? 0 }}</h3>
                            </div>
                        </div>
                    </a>

                    @if ($persenNaik > 0)
                        <small class="text-success">
                            ↑ {{ $persenNaik }}% dari bulan lalu
                        </small>
                    @elseif ($persenNaik < 0)
                        <small class="text-danger">
                            ↓ {{ abs($persenNaik) }}% dari bulan lalu
                        </small>
                    @else
                        <small class="text-muted">
                            Tidak ada perubahan dari bulan lalu
                        </small>
                    @endif

                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div
                    class="card card-feature text-center border-0 d-flex align-items-center justify-content-center flex-column p-3">
                    <a href="{{ route('folder_admin') }}" class="text-decoration-none text-dark">
                        <div class="icon-wrapper-with-text mb-2">
                            <img src="/img/folder2.svg" alt="Icon Surat" width="40" height="40" class="mb-1">
                            <div class="icon-text">
                                <h6 class="fw-semibold mb-0">Total Folder</h6>
                                <h3 class="mb-0">{{ $totalFolder ?? 0 }}</h3>
                            </div>
                        </div>
                    </a>

                    @if ($persenNaik > 0)
                        <small class="text-success">
                            ↑ {{ $persenNaik }}% dari bulan lalu
                        </small>
                    @elseif ($persenNaik < 0)
                        <small class="text-danger">
                            ↓ {{ abs($persenNaik) }}% dari bulan lalu
                        </small>
                    @else
                        <small class="text-muted">
                            Tidak ada perubahan dari bulan lalu
                        </small>
                    @endif

                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div
                    class="card card-feature text-center border-0 d-flex align-items-center justify-content-center flex-column p-3">
                    <div class="icon-wrapper-with-text mb-2">
                        <img src="/img/letter_done.svg" alt="Surat Done" width="40" height="40" class="mb-1">
                        <div class="icon-text">
                            <h6 class="fw-semibold mb-0">Selesai</h6>
                            <h3 class="mb-0">{{ $Selesai ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div
                    class="card card-feature text-center border-0 d-flex align-items-center justify-content-center flex-column p-3">
                    <div class="icon-wrapper-with-text mb-2">
                        <img src="/img/pending.svg" alt="Surat Done" width="40" height="40" class="mb-1">
                        <div class="icon-text">
                            <h6 class="fw-semibold mb-0">Pending</h6>
                            <h3 class="mb-0">{{ $pending ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Charts -->
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card card-stat p-3 text-center">
                    <h6>Status Kasus</h6>
                    <div class="chart-container">
                        <canvas id="pieChart"></canvas>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-stat p-3 text-center">
                    <h6>Kasus per Divisi</h6>
                    <div class="chart-container">
                        <canvas id="barChart"></canvas>
                    </div>

                </div>
            </div>
        </div>

        {{-- Field Surat Terbaru --}}
        {{-- <div class="card card-stat p-3 mt-4">
        <h6 class="mb-3">Daftar Arsip Surat</h6>
        <div class="table-scroll-wrapper">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-secondary align-middle">
                    <tr>
                        <th rowspan="2">Nomor Berkas</th>
                        <th rowspan="2">Nomor Item Arsip</th>
                        <th rowspan="2">Kode Klasifikasi</th>
                        <th colspan="6">Judul Item Arsip</th>
                        <th rowspan="2">Jumlah (lembar)</th>
                        <th rowspan="2">Tingkat Perkembangan</th>
                        <th rowspan="2">Klasifikasi Keamanan</th>
                        <th rowspan="2">Hak Akses</th>
                        <th rowspan="2">Akses Publik</th>
                        <th rowspan="2">Dasar Pertimbangan</th>
                        <th rowspan="2">Ket. (link tautan)</th>
                    </tr>
                    <tr>
                        <th>Nomor Surat</th>
                        <th>Tanggal</th>
                        <th>Jenis Surat</th>
                        <th>Dari</th>
                        <th>Ke</th>
                        <th>Perihal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>01/2024</td>
                        <td>K3</td>
                        <td>123/K3/2024</td>
                        <td>2024-01-10</td>
                        <td>Surat Masuk</td>
                        <td>PT Maju Jaya</td>
                        <td>Disnaker</td>
                        <td>Permohonan Izin</td>
                        <td>3</td>
                        <td>Selesai</td>
                        <td>Rahasia</td>
                        <td>Internal</td>
                        <td>Tidak</td>
                        <td>UU Ketenagakerjaan</td>
                        <td><a href="#" class="text-primary text-decoration-none">Lihat</a></td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>02/2024</td>
                        <td>HUBKER</td>
                        <td>124/HUBKER/2024</td>
                        <td>2024-01-12</td>
                        <td>Surat Keluar</td>
                        <td>Disnaker</td>
                        <td>PT Sejahtera</td>
                        <td>Balasan Pengaduan</td>
                        <td>2</td>
                        <td>Proses</td>
                        <td>Terbuka</td>
                        <td>Publik</td>
                        <td>Ya</td>
                        <td>Peraturan No. 5/2024</td>
                        <td><a href="#" class="text-primary text-decoration-none">Lihat</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}
    </div>

</body>

</html>

{{-- CSS DAN JS ADA DISINI UNTUK YANG MANUAL --}}
{{-- <style>
        body {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
            margin: 0;
            background: #f8f9fa;
        }

        /* === SIDEBAR === */
        .sidebar {
            width: 250px;
            background: #fff;
            border-right: 1px solid #ddd;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            z-index: 1050;
            padding-top: 10px;
        }

        /* === Sidebar disembunyikan (desktop) === */
        .sidebar.hidden {
            left: -250px;
        }

        /* === LINK NAVIGASI === */
        .sidebar .nav-link {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #333;
            border-radius: 5px;
            transition: background 0.2s ease;
        }

        .sidebar .nav-link:hover {
            background: #e9ecef;
            text-decoration: none;
        }

        /* === KONTEN === */
        .content {
            flex: 1;
            padding: 20px;
            background: #fff;
            transition: margin-left 0.3s ease;
            margin-left: 250px;
            min-width: 0;
        }

        /* Saat sidebar disembunyikan */
        .content.full {
            margin-left: 0;
        }

        /* === HEADER === */
        .header-content {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: #fff;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-content h4 {
            margin-bottom: 0;
        }

        /* Tombol kembali */
        .back-button {
            margin-top: 25px;
        }

        /* === TABEL SCROLL === */
        .table-scroll-wrapper {
            width: 100%;
            overflow-x: auto !important;
            display: block;
            white-space: nowrap;
            padding-bottom: 8px;
        }

        .table-scroll-wrapper table {
            min-width: 1600px;
            width: max-content;
        }

        .table-scroll-wrapper th,
        .table-scroll-wrapper td {
            white-space: nowrap;
            text-align: center;
            vertical-align: middle;
        }

        /* === RESPONSIF (HP & Tablet) === */
        @media (max-width: 992px) {
            body {
                flex-direction: column;
            }

            /* Sidebar jadi drawer */
            .sidebar {
                left: -250px;
                position: fixed;
                height: 100vh;
                top: 0;
                width: 250px;
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            }

            .sidebar.show {
                left: 0;
            }

            /* Content full width */
            .content {
                margin-left: 0 !important;
                padding: 15px;
            }
        }

        .btn-close-sidebar {
            position: absolute;
            top: 10px;
            right: 10px;
            border: none;
            background: none;
            font-size: 1.3rem;
            cursor: pointer;
            display: none;
            /* disembunyikan di desktop */
        }

        .btn-close-sidebar i {
            color: #333;
        }

        @media (max-width: 992px) {
            .btn-close-sidebar {
                display: block;
            }
        }
    </style> --}}

{{-- JS --}}
{{-- <script>
    // Toggle Sidebar
    const toggleBtn = document.getElementById("toggleSidebar");
    const closeBtn = document.getElementById("closeSidebar"); // tombol ✖
    const sidebar = document.querySelector(".sidebar");
    const content = document.querySelector(".content");

    // Tombol toggle utama
    toggleBtn.addEventListener("click", () => {
        if (window.innerWidth > 992) {
            // Desktop
            sidebar.classList.toggle("hidden");
            content.classList.toggle("full");
        } else {
            // Mobile
            sidebar.classList.toggle("show");
        }
    });

    // Tombol ✖ di sidebar (khusus mobile)
    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            sidebar.classList.remove("show");
        });
    }

    // Tutup sidebar saat klik di luar area (khusus mobile)
    document.addEventListener("click", (e) => {
        if (window.innerWidth <= 992) {
            if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                sidebar.classList.remove("show");
            }
        }
    });



    // Chart.js Pie
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: ['Selesai 50%', 'Tindak Lanjut 31%', 'Belum Ditindaklanjuti 19%'],
            datasets: [{
                data: [50, 31, 19],
                backgroundColor: ['#28a745', '#ffc107', '#dc3545']
            }]
        }
    });

    // Chart.js Bar
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: ['K3', 'HUBKER', 'Penyidik', 'Perempuan Anak'],
            datasets: [{
                    label: 'Selesai',
                    data: [90, 95, 78, 96],
                    backgroundColor: '#28a745'
                },
                {
                    label: 'Tindak Lanjut',
                    data: [40, 35, 52, 48],
                    backgroundColor: '#ffc107'
                },
                {
                    label: 'Belum',
                    data: [15, 18, 22, 28],
                    backgroundColor: '#dc3545'
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
