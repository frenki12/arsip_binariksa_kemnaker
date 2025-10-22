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
                <h4 class="mb-0 fw-bold">PENGGUNA</h4>
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
                <h4 class="fw-bold mb-1">Manajemen Pengguna</h4>
                <p class="text-muted mb-0">Kelola pengguna dan hak akses</p>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahPengguna">
                + Tambah Pengguna
            </button>
        </div>

        <!-- Tabel Pengguna -->
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Pengguna</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Hak Akses</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar me-3">AD</div>
                                    <div>
                                        <strong>Administrator</strong><br>
                                        <small class="text-muted">admin@kemnaker.go.id</small>
                                    </div>
                                </div>
                            </td>
                            <td>admin</td>
                            <td><span class="badge bg-primary">Admin</span></td>
                            <td>
                                <span class="border border-dark rounded px-2 py-1 me-1 small text-dark">Tambah</span>
                                <span class="border border-dark rounded px-2 py-1 me-1 small text-dark">Lihat</span>
                                <span class="border border-dark rounded px-2 py-1 me-1 small text-dark">Edit</span>
                                <span class="border border-dark rounded px-2 py-1 me-1 small text-dark">Hapus</span>
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <i class="bi bi-three-dots" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false"></i>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#editModal">Edit</a></li>
                                        <li><a class="dropdown-item text-danger" href="#">Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar bg-secondary me-3">BU</div>
                                    <div>
                                        <strong>Budi Santoso</strong><br>
                                        <small class="text-muted">budi@kemnaker.go.id</small>
                                    </div>
                                </div>
                            </td>
                            <td>budi</td>
                            <td><span class="badge bg-secondary">Staf</span></td>
                            <td>
                                <span class="border border-dark rounded px-2 py-1 me-1 small text-dark">Tambah</span>
                                <span class="border border-dark rounded px-2 py-1 me-1 small text-dark">Lihat</span>
                                <span class="border border-dark rounded px-2 py-1 small text-dark">Edit</span>
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <i class="bi bi-three-dots" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false"></i>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                        <li><a class="dropdown-item text-danger" href="#">Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar bg-info me-3">SI</div>
                                    <div>
                                        <strong>Siti Aminah</strong><br>
                                        <small class="text-muted">siti@kemnaker.go.id</small>
                                    </div>
                                </div>
                            </td>
                            <td>siti</td>
                            <td><span class="badge bg-light text-dark border">Viewer</span></td>
                            <td><span class="border border-dark rounded px-2 py-1 me-1 small text-dark">Lihat</span>
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <i class="bi bi-three-dots" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false"></i>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                        <li><a class="dropdown-item text-danger" href="#">Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- MODAL EDIT --}}
        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form atau konten modal di sini -->
                        <form id="formTambahPengguna">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="John Doe" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" placeholder="johndoe" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="john@example.com"
                                        required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="••••••" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select class="form-select" required>
                                    <option value="">Pilih role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Hak Akses</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="tambah" id="tambahData">
                                    <label class="form-check-label" for="tambahData">Tambah Data</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="edit" id="editData">
                                    <label class="form-check-label" for="editData">Edit Data</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="lihat" id="lihatData"
                                        checked>
                                    <label class="form-check-label" for="lihatData">Lihat Data</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="hapus" id="hapusData">
                                    <label class="form-check-label" for="hapusData">Hapus Data</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="modalTambahPengguna" tabindex="-1" aria-labelledby="modalTambahPenggunaLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="modalTambahPenggunaLabel">Tambah Pengguna Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formTambahPengguna">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="John Doe" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" placeholder="johndoe" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="john@example.com"
                                        required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="••••••" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select class="form-select" required>
                                    <option value="">Pilih role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Hak Akses</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="tambah" id="tambahData">
                                    <label class="form-check-label" for="tambahData">Tambah Data</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="edit" id="editData">
                                    <label class="form-check-label" for="editData">Edit Data</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="lihat" id="lihatData"
                                        checked>
                                    <label class="form-check-label" for="lihatData">Lihat Data</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="hapus" id="hapusData">
                                    <label class="form-check-label" for="hapusData">Hapus Data</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Buat Pengguna</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
