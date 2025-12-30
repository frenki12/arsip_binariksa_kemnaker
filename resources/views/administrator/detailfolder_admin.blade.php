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
                <h4 class="mb-0 fw-bold">PT ABCD</h4>
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

        <!-- Tombol Kembali -->
        <div class="back-button mb-3">
            <button class="btn btn-outline-primary btn-sm" onclick="history.back()">
                <i class="bi bi-arrow-left"></i> Kembali
            </button>
        </div>

        <input type="hidden" name="folder_id" value="{{ $folder->id }}">

        {{-- Field Surat Terbaru --}}
        <div class="card card-stat p-3 mt-4">
            <h6 class="mb-3">Daftar File PT ABCD</h6>
            <p>nama kasusnya</p>
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
    @forelse($folder->arsip as $item)
        <tr>
            <td>{{ $item->nomor_berkas }}</td>
            <td>{{ $item->nomor_item_arsip }}</td>
            <td>{{ $item->kode_klasifikasi }}</td>
            <td>{{ $item->nomor_surat }}</td>
            <td>{{ $item->tanggal_surat }}</td>
            <td>{{ $item->jenis_surat }}</td>
            <td>{{ $item->dari }}</td>
            <td>{{ $item->ke }}</td>
            <td>{{ $item->perihal }}</td>
            <td>{{ $item->jumlah_lembar }}</td>
            <td>{{ $item->tingkat_perkembangan }}</td>
            <td>{{ $item->klasifikasi_keamanan }}</td>
            <td>{{ $item->hak_akses }}</td>
            <td>{{ $item->akses_publik }}</td>
            <td>{{ $item->dasar_pertimbangan }}</td>
            <td>
                @if($item->link_tautan)
                    <a href="{{ $item->link_tautan }}" class="text-primary text-decoration-none">Lihat</a>
                @else
                    -
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="16" class="text-muted">Belum ada arsip di folder ini.</td>
        </tr>
    @endforelse
</tbody>

                </table>
            </div>
        </div>
    </div>

</body>

</html>

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
