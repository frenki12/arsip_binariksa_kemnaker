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
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <div>
                <h4>Folder Surat</h4>
                <p class="text-muted">Kelola folder berdasarkan perusahaan dan kasus</p>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                {{-- <input type="text" class="form-control w-50" placeholder="Cari folder..."> --}}
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
            </div>
        </div>

        <!-- Modal Tambah Folder -->
        <div class="modal fade" id="modalFolder" tabindex="-1" aria-labelledby="modalFolderLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg rounded-3">

                    <!-- Header -->
                    <div class="modal-header border-0">
                        <div>
                            <h5 class="modal-title fw-bold" id="modalFolderLabel">Tambah Folder Baru</h5>
                            <p class="text-muted mb-0">Buat dan kategorikan folder untuk menyimpan surat</p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <form action="{{ route('folder.store') }}" method="POST">
                            @csrf

                            {{-- <input type="hidden" name="divisi" value="{{ $divisi }}"> --}}


                            <div class="row g-3">

                                <!-- Nama perusahaan -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Nama Perusahaan</label>
                                    <input type="text" name="nama_perusahaan" class="form-control"
                                        placeholder="PT. Example" required>
                                </div>

                                <!-- Nama kasus -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Nama Kasus</label>
                                    <textarea name="nama_kasus" class="form-control" rows="2" placeholder="Contoh : Kasus K3"></textarea>
                                </div>

                                <!-- Nomor surat -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Nomor Surat</label>
                                    <input type="text" name="nomor_surat" class="form-control"
                                        placeholder="5/00.01/...">
                                </div>

                                {{-- DIVISI --}}
                                <select name="divisi" class="form-select" required>
                                    <option value="">-- Pilih Divisi --</option>
                                    <option value="hubker">Hubker</option>
                                    <option value="k3">K3</option>
                                    <option value="penyidikan">Penyidikan</option>
                                    <option value="perempuan & anak">Perempuan & Anak</option>
                                    <option value="wkwi">WKWI</option>
                                    <option value="tu">TU</option>
                                </select>


                            </div>

                            <div class="mt-3 text-end">
                                <button type="submit" class="btn btn-primary">
                                    Simpan Folder
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search + Filter -->
        @include('components.filterbox')

        <h5 class="mt-4 mb-2">Daftar Folder</h5>

        <div class="row g-3">

            @forelse($folders as $folder)
                <div class="col-md-4">

                    <a href="/administrator/detailfolder_admin/{{ $folder->id }}"
                        class="text-decoration-none text-dark">

                        <div class="folder-card h-100 p-3 border rounded shadow-sm hover-shadow">

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <i class="bi bi-folder fs-4 text-primary"></i>

                                @if ($folder->arsip->count() > 0)
                                    <span class="badge bg-primary">Berisi Dokumen</span>
                                @else
                                    <span class="badge bg-secondary">Kosong</span>

                                    {{-- Tombol hapus hanya muncul kalau folder kosong --}}
                                    <form action="{{ route('folder.destroy', $folder->id) }}" method="POST"
                                        class="ms-2">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link text-danger p-0"
                                            onclick="return confirm('Yakin hapus folder ini?')">
                                            <i class="bi bi-trash fs-5"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>


                            <h6>{{ $folder->nama_perusahaan }}</h6>

                            <p class="mb-1 text-muted">
                                {{ $folder->nama_kasus ?? 'Tidak ada kasus' }}
                            </p>
                            <small class="d-block">
                                Divisi: {{ $folder->divisi ?? '-' }}
                            </small>

                            <small class="d-block">
                                Nomor: {{ $folder->nomor_surat ?? '-' }}
                            </small>

                            <small class="d-block">
                                Surat: {{ $folder->arsip->count() }} dokumen
                            </small>

                        </div>
                    </a>
                </div>
            @empty
                <p class="text-muted">Belum ada folder dibuat.</p>
            @endforelse

        </div>
    </div>

</body>

</html>
