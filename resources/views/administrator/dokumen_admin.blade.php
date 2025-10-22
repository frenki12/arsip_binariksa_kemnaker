<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
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
                <h4 class="mb-0 fw-bold">DOKUMEN TU</h4>
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

        <!-- Title + Actions -->
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <!-- Judul -->
            <div>
                <h5 class="fw-bold mb-1">Dokumen Surat TU</h5>
                <small class="text-muted">Kelola semua dokumen dan surat</small>
            </div>

            <!-- Aksi -->
            <div class="d-flex gap-2">
                <!-- Export Excel -->
                <a href="#" class="btn btn-outline-success">
                    <i class="bi bi-file-earmark-excel me-2"></i> Export Excel
                </a>

                <!-- Export PDF -->
                <a href="#" class="btn btn-outline-danger">
                    <i class="bi bi-file-earmark-pdf me-2"></i> Export PDF
                </a>

                <!-- Tambah Dokumen -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#tambahSuratMasukModal">
                    <i class="bi bi-plus-circle me-2"></i> Tambah Dokumen
                </button>
            </div>
        </div>

        <!-- Modal Tambah Dokumen -->
        <div class="modal fade" id="tambahSuratMasukModal" tabindex="-1" aria-labelledby="tambahSuratMasukLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <div>
                            <h5 class="modal-title fw-bold" id="tambahSuratMasukLabel">Tambah Dokumen</h5>
                            <small class="text-muted">Upload dan kategorikan dokumen baru</small>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <form>
                            <!-- Nomor Berkas & item arsip -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nomor Berkas</label>
                                    <input type="text" class="form-control" placeholder="1">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nomor Item Arsip</label>
                                    <input type="text" class="form-control" placeholder="1">
                                </div>
                                {{-- <div class="col-md-6">
                                    <label class="form-label">Divisi</label>
                                    <select class="form-select">
                                        <option selected disabled>Pilih divisi</option>
                                        <option value="HRD">HRD</option>
                                        <option value="Finance">Finance</option>
                                        <option value="IT">IT</option>
                                    </select>
                                </div> --}}
                            </div>

                            {{-- KODE KLASIFIKASI --}}
                            <br>
                            <h6>KODE KLASIFIKASI</h6>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Kode</label>
                                    <input type="text" class="form-control" placeholder="AS.00.01">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nama Klasifikasi</label>
                                    <input type="text" class="form-control"
                                        placeholder="Norma Pelatihan, Penempatan Tenaga Kerja, Hubungan Kerja dan Kebebasan Berserikat">
                                </div>
                            </div>

                            {{-- NOMOR SURAT, TANGGAL, JENIS SURAT --}}
                            <br>
                            <h2>JUDUL ITEM ARSIP</h2>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Nomor Surat</label>
                                    <input type="text" class="form-control" placeholder="5/111/AS.00.01/I/2025">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="tanggal">Tanggal</label>
                                    <input type="date" id="tanggal" class="form-control"
                                        placeholder="Pilih Tanggal">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="jenisSurat">Jenis Surat</label>
                                    <select id="jenisSurat" class="form-select">
                                        <option value="" disabled selected>Pilih Jenis Surat</option>
                                        <option value="suratmasuk">Surat Masuk</option>
                                        <option value="suratdinas">Surat Dinas</option>
                                        <option value="np">Nota Pemeriksaan</option>
                                        <option value="spt">Surat Perintah Tugas</option>
                                    </select>
                                </div>

                            </div>

                            {{-- DARI ATAU KE --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Dari</label>
                                    <input type="text" class="form-control"
                                        placeholder="Direktur Bina Pemeriksaan Norma Ketenagakerjaan">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Ke</label>
                                    <input type="text" class="form-control" placeholder="PT ABCD">
                                </div>
                            </div>

                            {{-- PERIHAL --}}
                            <div class="mb-3">
                                <label class="form-label">Perihal</label>
                                <input type="text" class="form-control"
                                    placeholder="FGD (Focus Group Discussion)">
                            </div>

                            {{-- JUMLAH LEMBAR --}}
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Jumlah (Lembar)</label>
                                    <input type="text" class="form-control" placeholder="1">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="tingkatPerkembangan">Tingkat Perkembangan</label>
                                    <select id="tingkatPerkembangan" class="form-select">
                                        <option value="" disabled selected>Pilih Tingkat Perkembangan</option>
                                        <option value="asli">Asli</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="klasifikasiKeamanan">Klasifikasi Keamanan</label>
                                    <select id="klasifikasiKeamanan" class="form-select">
                                        <option value="" disabled selected>Pilih Klasifikasi Keamanan</option>
                                        <option value="biasa">Biasa</option>
                                        <option value="rahasia">Rahasia</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label" for="hakAkses">Hak Akses</label>
                                    <select id="hakAkses" class="form-select">
                                        <option value="" disabled selected>Pilih Hak Akses</option>
                                        <option value="terbuka">Terbuka</option>
                                        <option value="tertutup">Tertutup</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="aksesPublik">Akses Publik</label>
                                    <select id="aksesPublik" class="form-select">
                                        <option value="" disabled selected>Pilih Akses Publik</option>
                                        <option value="terbuka">Terbuka</option>
                                        <option value="tertutup">Tertutup</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Dasar Pertimbangan</label>
                                    <input type="text" class="form-control" placeholder="...">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ket. (Link Tautan)</label>
                                <input type="text" class="form-control" placeholder="Masukkan Link GDrive">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="statusFolder">Status Folder</label>
                                <select id="statusFolder" class="form-select">
                                    <option value="" disabled selected>Pilih Status Folder</option>
                                    <option value="belum">Belum di Folder</option>
                                    <option value="sudah-pt1">Sudah di Folder – PT ABC</option>
                                    <option value="sudah-pt2">Sudah di Folder – PT XYZ</option>
                                    <option value="sudah-pt3">Sudah di Folder – PT DEF</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="statusKasus">Status Kasus</label>
                                <select id="statusKasus" class="form-select">
                                    <option value="" disabled selected>Pilih Status Kasus</option>
                                    <option value="pending">Pending</option>
                                    <option value="tindak-lanjut">Tindak Lanjut</option>
                                    <option value="selesai">Selesai</option>
                                </select>
                            </div>

                            <!-- Upload File -->
                            <div class="mb-3">
                                <label class="form-label">Upload File (optional)</label>
                                <div class="border-2 border-dashed rounded p-4 text-center"
                                    style="cursor: pointer; border-style: dashed;">
                                    <!-- Input File -->
                                    <input type="file" class="d-none" id="uploadFile" accept=".pdf,.jpg,.png">

                                    <!-- Trigger Upload -->
                                    <label for="uploadFile" class="d-block w-100 h-100" style="cursor: pointer;">
                                        <i class="bi bi-upload" style="font-size: 2rem;"></i>
                                        <p class="mb-0">Klik untuk upload atau drag & drop</p>
                                        <small class="text-muted">PDF, JPG, PNG (max 10MB)</small>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary w-100">Simpan Surat Masuk</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search + Filter -->
        @include('components.filterbox')


        <!-- Table -->
        <div class="table-scroll-wrapper">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-secondary align-middle">
                    <tr>
                        <th rowspan="2">Nomor Berkas</th>
                        <th rowspan="2">Nomor Item Arsip</th>
                        <th colspan="2">Kode Klasifikasi</th>
                        <th colspan="6">Judul Item Arsip</th>
                        <th rowspan="2">Jumlah (lembar)</th>
                        <th rowspan="2">Tingkat Perkembangan</th>
                        <th rowspan="2">Klasifikasi Keamanan</th>
                        <th rowspan="2">Hak Akses</th>
                        <th rowspan="2">Akses Publik</th>
                        <th rowspan="2">Dasar Pertimbangan</th>
                        <th rowspan="2">Ket. (link tautan)</th>
                        <th rowspan="2">Status Folder</th>
                        <th rowspan="2">Status Kasus</th>
                        <th rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
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
                        <td>1/AS.00/2025</td>
                        <td class="text-truncate" style="max-width: 100px;" data-bs-toggle="tooltip"
                            title="Norma Pelatihan, Penempatan Tenaga Kerja, Hubungan Kerja dan Kebebasan Berserikat ">
                            Norma Pelatihan, Penempatan Tenaga Kerja, Hubungan Kerja dan Kebebasan Berserikat
                        </td>
                        <td>123/K3/2024</td>
                        <td>2024-01-10</td>
                        <td>Surat Masuk</td>
                        <td class="text-truncate" style="max-width: 100px;" data-bs-toggle="tooltip"
                            title="PT Maju Jaya dsadas dsadasd dsdasdasd dsadasd ">
                            PT Maju Jaya dsadas dsadasd dsdasdasd dsadasd </td>
                        <td class="text-truncate" style="max-width: 100px;" data-bs-toggle="tooltip"
                            title="Disnaker ">
                            Disnaker</td>
                        <td class="text-truncate" style="max-width: 100px;" data-bs-toggle="tooltip"
                            title="Permohonan Izin Lengkap dengan apa adanya ">
                            Permohonan Izin Lengkap dengan apa adanya</td>
                        <td>3</td>
                        <td>Selesai</td>
                        <td>Rahasia</td>
                        <td>Internal</td>
                        <td>Tidak</td>
                        <td>UU Ketenagakerjaan</td>
                        <td><a href="#" class="text-primary text-decoration-none">Lihat</a></td>
                        <td><span class="text-muted">Belum di Folder</span></td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-link text-dark p-0" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots fs-5"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#"><i
                                                class="bi bi-pencil me-2"></i>Edit</a></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i
                                                class="bi bi-trash me-2"></i>Hapus</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>01/2025</td>
                        <td>1/AS.00/2024</td>
                        <td class="text-truncate" style="max-width: 100px;" data-bs-toggle="tooltip"
                            title="Norma Pelatihan, Penempatan Tenaga Kerja, Hubungan Kerja dan Kebebasan Berserikat ">
                            Norma Pelatihan, Penempatan Tenaga Kerja, Hubungan Kerja dan Kebebasan Berserikat
                        </td>
                        <td>123/K3/2024</td>
                        <td>2024-01-10</td>
                        <td>Surat Masuk</td>
                        <td class="text-truncate" style="max-width: 100px;" data-bs-toggle="tooltip"
                            title=" PT unilever persada tbk ">
                            PT unilever persada tbk </td>
                        <td class="text-truncate" style="max-width: 100px;" data-bs-toggle="tooltip"
                            title="Disnaker ">
                            Disnaker</td>
                        <td class="text-truncate" style="max-width: 100px;" data-bs-toggle="tooltip"
                            title="Permohonan Izin Lengkap dengan apa adanya ">
                            Permohonan Izin Lengkap dengan apa adanya</td>
                        <td>3</td>
                        <td>Selesai</td>
                        <td>Rahasia</td>
                        <td>Internal</td>
                        <td>Tidak</td>
                        <td>UU Ketenagakerjaan</td>
                        <td><a href="#" class="text-primary text-decoration-none">Lihat</a></td>
                        <td><span class="text-success">✓ Dalam Folder</span><br><small>CV Sejahtera - HUBKER</small>
                        </td>
                        <td><span class="badge bg-secondary">Tindak Lanjut</span></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-link text-dark p-0" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots fs-5"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#"><i
                                                class="bi bi-pencil me-2"></i>Edit</a></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i
                                                class="bi bi-trash me-2"></i>Hapus</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>01/2025</td>
                        <td>1/AS.00/2024</td>
                        <td class="text-truncate" style="max-width: 100px;" data-bs-toggle="tooltip"
                            title="Norma Pelatihan, Penempatan Tenaga Kerja, Hubungan Kerja dan Kebebasan Berserikat ">
                            Norma Pelatihan, Penempatan Tenaga Kerja, Hubungan Kerja dan Kebebasan Berserikat
                        </td>
                        <td>123/K3/2024</td>
                        <td>2024-01-10</td>
                        <td>Surat Masuk</td>
                        <td class="text-truncate" style="max-width: 100px;" data-bs-toggle="tooltip"
                            title=" PT unilever persada tbk ">
                            PT unilever persada tbk </td>
                        <td class="text-truncate" style="max-width: 100px;" data-bs-toggle="tooltip"
                            title="Disnaker ">
                            Disnaker</td>
                        <td class="text-truncate" style="max-width: 100px;" data-bs-toggle="tooltip"
                            title="Permohonan Izin Lengkap dengan apa adanya ">
                            Permohonan Izin Lengkap dengan apa adanya</td>
                        <td>3</td>
                        <td>Selesai</td>
                        <td>Rahasia</td>
                        <td>Internal</td>
                        <td>Tidak</td>
                        <td>UU Ketenagakerjaan</td>
                        <td><a href="#" class="text-primary text-decoration-none">Lihat</a></td>
                        <td><span class="text-success">✓ Dalam Folder</span><br><small>PT Maju Jaya - K3</small></td>
                        <td><span class="badge bg-primary">Selesai</span></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-link text-dark p-0" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots fs-5"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#"><i
                                                class="bi bi-pencil me-2"></i>Edit</a></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i
                                                class="bi bi-trash me-2"></i>Hapus</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
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

<!-- Bootstrap JS -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
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
</script> --}}
