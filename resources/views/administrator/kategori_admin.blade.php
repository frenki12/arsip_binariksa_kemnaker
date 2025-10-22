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

    <!-- CONTENT -->
    <div class="content p-4" id="content">
    <!-- Header + Toggle -->
    <div class="header-content d-flex justify-content-between align-items-center shadow-sm">
        <div class="d-flex align-items-center">
            <button class="btn btn-outline-secondary btn-sm me-3" id="toggleSidebar">
                <i class="bi bi-list"></i>
            </button>
            <h4 class="mb-0 fw-bold">KATEGORI</h4>
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-0">Kategori Surat</h4>
                <small class="text-muted">Kelola kategori untuk mengorganisir surat</small>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahKategori">
                + Tambah Kategori
            </button>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Surat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><i class="bi bi-tag me-2 text-primary"></i> K3</td>
                            <td>Keselamatan dan Kesehatan Kerja</td>
                            <td><span class="badge bg-light text-dark">145 surat</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-light border-0" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>
                                                Edit</a></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                    class="bi bi-trash me-2"></i> Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-tag me-2 text-primary"></i> HUBKER</td>
                            <td>Hubungan Industrial dan Ketenagakerjaan</td>
                            <td><span class="badge bg-light text-dark">98 surat</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-light border-0" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>
                                                Edit</a></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                    class="bi bi-trash me-2"></i> Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-tag me-2 text-primary"></i> Penyidik</td>
                            <td>Penyidikan Pelanggaran UU Ketenagakerjaan</td>
                            <td><span class="badge bg-light text-dark">67 surat</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-light border-0" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>
                                                Edit</a></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                    class="bi bi-trash me-2"></i> Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-tag me-2 text-primary"></i> WKWI</td>
                            <td>Waktu Kerja dan Waktu Istirahat</td>
                            <td><span class="badge bg-light text-dark">82 surat</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-light border-0" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>
                                                Edit</a></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                    class="bi bi-trash me-2"></i> Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-tag me-2 text-primary"></i> Perempuan & Anak</td>
                            <td>Perlindungan Pekerja Perempuan dan Anak</td>
                            <td><span class="badge bg-light text-dark">54 surat</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-light border-0" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>
                                                Edit</a></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                    class="bi bi-trash me-2"></i> Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Kategori -->
    <div class="modal fade" id="modalTambahKategori" tabindex="-1" aria-labelledby="modalTambahKategoriLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="modalTambahKategoriLabel">Tambah Kategori Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0">
                    <p class="text-muted">Buat kategori baru untuk klasifikasi surat</p>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" placeholder="Contoh: K3">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" rows="3" placeholder="Deskripsi kategori..."></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Buat Kategori</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
