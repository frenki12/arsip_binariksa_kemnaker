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
                <h4 class="mb-0 fw-bold">FOLDER</h4>
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

        <!-- Folder Surat -->
        <h4>Folder Surat</h4>
        <p class="text-muted">Kelola folder berdasarkan perusahaan dan kasus</p>

        {{-- NANTI DIPAKAI UNTUK CARI & FILTER --}}
        {{-- <div class="container mt-3">
            <!-- Search + Filter -->
            <div class="d-flex mb-2">
                <input type="text" class="form-control me-2" placeholder="Cari surat, nomor, atau perusahaan...">
                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse"
                    data-bs-target="#filterBox">
                    <i class="bi bi-funnel"></i> Filter
                </button>
            </div>

            <!-- Filter Box -->
            <div class="collapse" id="filterBox">
                <div class="p-3 bg-light rounded">
                    <div class="row g-3">
                        <!-- Kategori -->
                        <div class="col-md-4">
                            <label class="form-label">Kategori</label>
                            <select class="form-select">
                                <option selected disabled>Pilih kategori</option>
                                <option>Surat Masuk</option>
                                <option>Surat Keluar</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="col-md-4">
                            <label class="form-label">Status</label>
                            <select class="form-select">
                                <option selected disabled>Pilih status</option>
                                <option>Proses</option>
                                <option>Selesai</option>
                            </select>
                        </div>

                        <!-- Divisi -->
                        <div class="col-md-4">
                            <label class="form-label">Divisi</label>
                            <select class="form-select">
                                <option selected disabled>Pilih divisi</option>
                                <option>HRD</option>
                                <option>Finance</option>
                                <option>IT</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="d-flex justify-content-between align-items-center mb-3">
            <input type="text" class="form-control w-50" placeholder="Cari folder...">
            <!-- Export Excel -->
            <a href="#" class="btn btn-outline-success">
                <i class="bi bi-file-earmark-excel me-2"></i> Export Excel
            </a>

            <!-- Export PDF -->
            <a href="#" class="btn btn-outline-danger">
                <i class="bi bi-file-earmark-pdf me-2"></i> Export PDF
            </a>

            <!-- Tombol Buat Folder -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFolder">
                <i class="bi bi-plus-lg"></i> Buat Folder
            </button>

            <!-- Modal Tambah Folder -->
            <div class="modal fade" id="modalFolder" tabindex="-1" aria-labelledby="modalFolderLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content border-0 shadow-lg rounded-3">

                        <!-- Header -->
                        <div class="modal-header border-0">
                            <div>
                                <h5 class="modal-title fw-bold" id="modalFolderLabel">Tambah Folder Baru</h5>
                                <p class="text-muted mb-0">Buat dan kategorikan folder untuk menyimpan surat</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <!-- Body -->
                        <div class="modal-body">
                            <form>
                                <div class="row g-3">

                                    <!-- Nama perusahaan -->
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Nama Perusahaan</label>
                                        <input type="text" class="form-control" placeholder="PT. Example">
                                    </div>

                                    <!-- nama kasus -->
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Nama Kasus</label>
                                        <textarea class="form-control" rows="2" placeholder="Contoh : Kasus K3"></textarea>
                                    </div>
                                    <!-- nomor surat -->
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Nomor Surat</label>
                                        <input type="text" class="form-control" placeholder="5/00.01/...">
                                    </div>

                                </div>
                            </form>
                        </div>

                        <!-- Footer -->
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-primary w-20">Buat Folder</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- NANTI UNTUK TAMBAH SURAT WKWKWK --}}
            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#tambahSuratMasukModal">
                Tambah Surat Masuk
            </button> --}}

            <!-- Modal Tambah Folder -->
            {{-- <div class="modal fade" id="tambahSuratMasukModal" tabindex="-1" aria-labelledby="tambahSuratMasukLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Header -->
                        <div class="modal-header">
                            <div>
                                <h5 class="modal-title fw-bold" id="tambahSuratMasukLabel">Tambah Surat Masuk</h5>
                                <small class="text-muted">Upload dan kategorikan surat masuk baru</small>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <!-- Body -->
                        <div class="modal-body">
                            <form>
                                <!-- Nomor Surat & Divisi -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Nomor Surat</label>
                                        <input type="text" class="form-control" placeholder="001/K3/2024/IN">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Divisi</label>
                                        <select class="form-select">
                                            <option selected disabled>Pilih divisi</option>
                                            <option value="HRD">HRD</option>
                                            <option value="Finance">Finance</option>
                                            <option value="IT">IT</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Judul Surat -->
                                <div class="mb-3">
                                    <label class="form-label">Judul Surat</label>
                                    <input type="text" class="form-control" placeholder="Laporan K3...">
                                </div>

                                <!-- Pengirim -->
                                <div class="mb-3">
                                    <label class="form-label">Pengirim</label>
                                    <input type="text" class="form-control" placeholder="PT Example">
                                </div>

                                <!-- Folder -->
                                <div class="mb-3">
                                    <label class="form-label">Folder (Opsional)</label>
                                    <select class="form-select">
                                        <option selected disabled>Pilih folder</option>
                                        <option value="folder1">Folder 1</option>
                                        <option value="folder2">Folder 2</option>
                                    </select>
                                </div>

                                <!-- Upload File -->
                                <div class="mb-3">
                                    <label class="form-label">Upload File</label>
                                    <div class="border-2 border-dashed rounded p-4 text-center"
                                        style="cursor: pointer; border-style: dashed;">
                                        <!-- Input File disembunyikan -->
                                        <input type="file" class="d-none" id="uploadFile"
                                            accept=".pdf,.jpg,.png">

                                        <!-- Label jadi trigger klik input -->
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
            </div> --}}
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <a href="/administrator/detailfolder_admin" class="text-decoration-none text-dark">
                    <div class="folder-card h-100 p-3 border rounded shadow-sm hover-shadow">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <i class="bi bi-folder fs-4 text-primary"></i>
                            <span class="badge bg-primary">Berisi Dokumen</span>
                        </div>
                        <h6>PT Maju Jaya</h6>
                        <p class="mb-1 text-muted">K3 Lingkungan Kerja</p>
                        <small class="d-block">Nomor: 001/K3/2024</small>
                        <small class="d-block">Surat: 12 dokumen</small>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-primary"></i>
                        <span class="badge bg-primary">Berisi Dokumen</span>
                    </div>
                    <h6>CV Sejahtera</h6>
                    <p class="mb-1 text-muted">Perselisihan PHK</p>
                    <small class="d-block">Nomor: 002/HUBKER/2024</small>
                    <small class="d-block">Surat: 8 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-secondary"></i>
                        <span class="badge bg-secondary">Kosong</span>
                    </div>
                    <h6>PT Global Tech</h6>
                    <p class="mb-1 text-muted">Pelanggaran UU Ketenagakerjaan</p>
                    <small class="d-block">Nomor: 003/PENYIDIK/2024</small>
                    <small class="d-block">Surat: 0 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-primary"></i>
                        <span class="badge bg-primary">Berisi Dokumen</span>
                    </div>
                    <h6>PT Berkah Abadi</h6>
                    <p class="mb-1 text-muted">Upah Minimum Regional</p>
                    <small class="d-block">Nomor: 004/WKWI/2024</small>
                    <small class="d-block">Surat: 15 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-primary"></i>
                        <span class="badge bg-primary">Berisi Dokumen</span>
                    </div>
                    <h6>PT Maju Jaya</h6>
                    <p class="mb-1 text-muted">K3 Lingkungan Kerja</p>
                    <small class="d-block">Nomor: 001/K3/2024</small>
                    <small class="d-block">Surat: 12 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-primary"></i>
                        <span class="badge bg-primary">Berisi Dokumen</span>
                    </div>
                    <h6>CV Sejahtera</h6>
                    <p class="mb-1 text-muted">Perselisihan PHK</p>
                    <small class="d-block">Nomor: 002/HUBKER/2024</small>
                    <small class="d-block">Surat: 8 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-secondary"></i>
                        <span class="badge bg-secondary">Kosong</span>
                    </div>
                    <h6>PT Global Tech</h6>
                    <p class="mb-1 text-muted">Pelanggaran UU Ketenagakerjaan</p>
                    <small class="d-block">Nomor: 003/PENYIDIK/2024</small>
                    <small class="d-block">Surat: 0 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-primary"></i>
                        <span class="badge bg-primary">Berisi Dokumen</span>
                    </div>
                    <h6>PT Berkah Abadi</h6>
                    <p class="mb-1 text-muted">Upah Minimum Regional</p>
                    <small class="d-block">Nomor: 004/WKWI/2024</small>
                    <small class="d-block">Surat: 15 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-primary"></i>
                        <span class="badge bg-primary">Berisi Dokumen</span>
                    </div>
                    <h6>PT Maju Jaya</h6>
                    <p class="mb-1 text-muted">K3 Lingkungan Kerja</p>
                    <small class="d-block">Nomor: 001/K3/2024</small>
                    <small class="d-block">Surat: 12 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-primary"></i>
                        <span class="badge bg-primary">Berisi Dokumen</span>
                    </div>
                    <h6>CV Sejahtera</h6>
                    <p class="mb-1 text-muted">Perselisihan PHK</p>
                    <small class="d-block">Nomor: 002/HUBKER/2024</small>
                    <small class="d-block">Surat: 8 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-secondary"></i>
                        <span class="badge bg-secondary">Kosong</span>
                    </div>
                    <h6>PT Global Tech</h6>
                    <p class="mb-1 text-muted">Pelanggaran UU Ketenagakerjaan</p>
                    <small class="d-block">Nomor: 003/PENYIDIK/2024</small>
                    <small class="d-block">Surat: 0 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-primary"></i>
                        <span class="badge bg-primary">Berisi Dokumen</span>
                    </div>
                    <h6>PT Berkah Abadi</h6>
                    <p class="mb-1 text-muted">Upah Minimum Regional</p>
                    <small class="d-block">Nomor: 004/WKWI/2024</small>
                    <small class="d-block">Surat: 15 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-primary"></i>
                        <span class="badge bg-primary">Berisi Dokumen</span>
                    </div>
                    <h6>PT Maju Jaya</h6>
                    <p class="mb-1 text-muted">K3 Lingkungan Kerja</p>
                    <small class="d-block">Nomor: 001/K3/2024</small>
                    <small class="d-block">Surat: 12 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-primary"></i>
                        <span class="badge bg-primary">Berisi Dokumen</span>
                    </div>
                    <h6>CV Sejahtera</h6>
                    <p class="mb-1 text-muted">Perselisihan PHK</p>
                    <small class="d-block">Nomor: 002/HUBKER/2024</small>
                    <small class="d-block">Surat: 8 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-secondary"></i>
                        <span class="badge bg-secondary">Kosong</span>
                    </div>
                    <h6>PT Global Tech</h6>
                    <p class="mb-1 text-muted">Pelanggaran UU Ketenagakerjaan</p>
                    <small class="d-block">Nomor: 003/PENYIDIK/2024</small>
                    <small class="d-block">Surat: 0 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-primary"></i>
                        <span class="badge bg-primary">Berisi Dokumen</span>
                    </div>
                    <h6>PT Berkah Abadi</h6>
                    <p class="mb-1 text-muted">Upah Minimum Regional</p>
                    <small class="d-block">Nomor: 004/WKWI/2024</small>
                    <small class="d-block">Surat: 15 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-primary"></i>
                        <span class="badge bg-primary">Berisi Dokumen</span>
                    </div>
                    <h6>PT Maju Jaya</h6>
                    <p class="mb-1 text-muted">K3 Lingkungan Kerja</p>
                    <small class="d-block">Nomor: 001/K3/2024</small>
                    <small class="d-block">Surat: 12 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-primary"></i>
                        <span class="badge bg-primary">Berisi Dokumen</span>
                    </div>
                    <h6>CV Sejahtera</h6>
                    <p class="mb-1 text-muted">Perselisihan PHK</p>
                    <small class="d-block">Nomor: 002/HUBKER/2024</small>
                    <small class="d-block">Surat: 8 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-secondary"></i>
                        <span class="badge bg-secondary">Kosong</span>
                    </div>
                    <h6>PT Global Tech</h6>
                    <p class="mb-1 text-muted">Pelanggaran UU Ketenagakerjaan</p>
                    <small class="d-block">Nomor: 003/PENYIDIK/2024</small>
                    <small class="d-block">Surat: 0 dokumen</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="folder-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-folder fs-4 text-primary"></i>
                        <span class="badge bg-primary">Berisi Dokumen</span>
                    </div>
                    <h6>PT Berkah Abadi</h6>
                    <p class="mb-1 text-muted">Upah Minimum Regional</p>
                    <small class="d-block">Nomor: 004/WKWI/2024</small>
                    <small class="d-block">Surat: 15 dokumen</small>
                </div>
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
