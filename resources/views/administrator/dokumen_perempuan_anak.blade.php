<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            console.log(typeof bootstrap !== 'undefined' ? '✅ Bootstrap aktif' : '❌ Bootstrap belum aktif');
        });
    </script>
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
                <h4 class="mb-0 fw-bold">DOKUMEN PEREMPUAN & ANAK</h4>
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
                <h5 class="fw-bold mb-1">Dokumen Surat Perempuan & Anak</h5>
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
                        <button type="button" class="btn btn-primary w-20">Simpan Surat Masuk</button>
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
                        <th rowspan="2">Kode Klasifikasi</th>
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