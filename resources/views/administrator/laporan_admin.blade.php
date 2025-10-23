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
                <h4 class="mb-0 fw-bold">LAPORAN</h4>
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

        <!-- Filter -->
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <!-- Judul -->
            <div>
                <h5 class="fw-bold mb-1">Laporan</h5>
                <small class="text-muted">Statistik dan Analisis Data Surat</small>
            </div>

            <!-- Aksi -->
            <div class="d-flex gap-2">
                <!-- Export Excel -->
                <a href="#" class="btn btn-outline-success">
                    <i class="bi bi-file-earmark-excel me-2"></i> Download Excel
                </a>

                <!-- Export PDF -->
                <a href="#" class="btn btn-outline-danger">
                    <i class="bi bi-file-earmark-pdf me-2"></i> Download PDF
                </a>
            </div>
        </div>


        {{-- <div class="text-end mt-3">
            <button class="btn btn-outline-secondary me-2">Download PDF</button>
            <button class="btn btn-outline-success">Download Excel</button>
        </div> --}}

        <!-- Search + Filter -->
        @include('components.filterbox_laporan')

        {{-- <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label">Bulan</label>
                        <select class="form-select">
                            <option>Semua Bulan</option>
                            <option>Januari</option>
                            <option>Februari</option>
                            <option>Maret</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tahun</label>
                        <select class="form-select">
                            <option>2024</option>
                            <option>2025</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Divisi</label>
                        <select class="form-select">
                            <option>Semua Divisi</option>
                            <option>K3</option>
                            <option>HUBKER</option>
                            <option>Penyidik</option>
                            <option>WKWL</option>
                            <option>Perempuan Anak</option>
                        </select>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Chart Section -->
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

        <div class="row text-center">
            <div class="col-md-3">
                <div class="card bg-danger text-white shadow-sm p-3">
                    <h5>Belum Ditindaklanjuti</h5>
                    <h3>{{ $belum ?? 12 }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-dark shadow-sm p-3">
                    <h5>Dalam Tindak Lanjut</h5>
                    <h3>{{ $proses ?? 7 }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white shadow-sm p-3">
                    <h5>Selesai</h5>
                    <h3>{{ $selesai ?? 21 }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-secondary text-white shadow-sm p-3">
                    <h5>Surat Non Resmi</h5>
                    <h3>{{ $nonresmi ?? 4 }}</h3>
                </div>
            </div>
            <div class="card shadow-sm p-4 mx-auto text-center" style="max-width: 600px;">
                <div style="height: 500px;">
                    <canvas id="statusSuratChart" data-belum="{{ $belum ?? 12 }}" data-proses="{{ $proses ?? 7 }}"
                        data-selesai="{{ $selesai ?? 21 }}" data-nonresmi="{{ $nonresmi ?? 4 }}">
                    </canvas>
                </div>
            </div>

        </div>

        <div class="container mt-4">
            <h4 class="fw-bold mb-4 text-center">Laporan Jumlah Surat Masuk per Bulan</h4>

            <div class="card shadow-sm p-4 mx-auto" style="max-width: 800px;">
                <div style="height: 350px;"> <!-- Tinggi chart diatur di sini -->
                    <canvas id="grafikSuratPerBulan"></canvas>
                </div>
            </div>
        </div>



        <!-- Rekap Bulanan -->
        <div class="card shadow-sm border-0 p-4">
            <h5 class="fw-bold mb-4">
                <i class="bi bi-calendar3 me-2"></i> Rekap Bulanan 2024
            </h5>

            <!-- Januari -->
            <div class="d-flex justify-content-between align-items-center border rounded-3 p-3 mb-3 bg-light-subtle">
                <div>
                    <strong class="d-block">Januari</strong>
                    <small class="text-muted">Total: 124 surat</small>
                </div>
                <div class="text-end">
                    <span class="text-success fw-semibold me-3">Selesai: 89</span>
                    <span class="text-warning fw-semibold">Pending: 35</span>
                </div>
            </div>

            <!-- Februari -->
            <div class="d-flex justify-content-between align-items-center border rounded-3 p-3 mb-3 bg-light-subtle">
                <div>
                    <strong class="d-block">Februari</strong>
                    <small class="text-muted">Total: 156 surat</small>
                </div>
                <div class="text-end">
                    <span class="text-success fw-semibold me-3">Selesai: 112</span>
                    <span class="text-warning fw-semibold">Pending: 44</span>
                </div>
            </div>

            <!-- Maret -->
            <div class="d-flex justify-content-between align-items-center border rounded-3 p-3 bg-light-subtle">
                <div>
                    <strong class="d-block">Maret</strong>
                    <small class="text-muted">Total: 178 surat</small>
                </div>
                <div class="text-end">
                    <span class="text-success fw-semibold me-3">Selesai: 145</span>
                    <span class="text-warning fw-semibold">Pending: 33</span>
                </div>
            </div>
        </div>

    </div>


</body>

</html>
