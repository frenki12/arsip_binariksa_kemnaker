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
                <h4 class="mb-0 fw-bold">DOKUMEN PENYIDIKAN</h4>
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
                <h5 class="fw-bold mb-1">Dokumen Surat Penyidikan</h5>
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
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#tambahSuratMasukModal">
                    <i class="bi bi-plus-circle me-2"></i> Tambah Dokumen
                </button> --}}
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSuratMasukModal">
                    <i class="bi bi-plus-circle me-2"></i> Tambah Dokumen
                </button>
            </div>
        </div>

        

        <!-- Modal Tambah Dokumen -->
        <div class="modal fade" id="tambahSuratMasukModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Tambah Arsip</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="divisi" value="penyidikan">


                        <div class="modal-body">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Nomor Berkas</label>
                                    <input name="nomor_berkas" type="text" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Nomor Item Arsip</label>
                                    <input name="nomor_item_arsip" type="text" class="form-control">
                                </div>
                            </div>

                            <h6>KODE KLASIFIKASI</h6>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Kode</label>
                                    <input name="kode_klasifikasi" type="text" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Klasifikasi</label>
                                    <input name="nama_klasifikasi" type="text" class="form-control">
                                </div>
                            </div>

                            <h6>JUDUL ITEM ARSIP</h6>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label>Nomor Surat</label>
                                    <input name="nomor_surat" type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Tanggal</label>
                                    <input name="tanggal_surat" type="date" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Jenis Surat</label>
                                    <select name="jenis_surat" class="form-select">
                                        <option value="Surat Masuk">Surat Masuk</option>
                                        <option value="Surat Dinas">Surat Dinas</option>
                                        <option value="NP">Nota Pemeriksaan</option>
                                        <option value="SPT">Surat Perintah Tugas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Dari</label>
                                    <input name="dari" type="text" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Ke</label>
                                    <input name="ke" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Perihal</label>
                                <input name="perihal" type="text" class="form-control">
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label>Jumlah Lembar</label>
                                    <input name="jumlah_lembar" type="number" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Tingkat Perkembangan</label>
                                    <select name="tingkat_perkembangan" class="form-select">
                                        <option value="Asli">Asli</option>
                                        <option value="Copy">Copy</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Klasifikasi Keamanan</label>
                                    <select name="klasifikasi_keamanan" class="form-select">
                                        <option value="Biasa">Biasa</option>
                                        <option value="Rahasia">Rahasia</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label>Hak Akses</label>
                                    <select name="hak_akses" class="form-select">
                                        <option value="Internal">Internal</option>
                                        <option value="Publik">Publik</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Akses Publik</label>
                                    <select name="akses_publik" class="form-select">
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Dasar Pertimbangan</label>
                                    <input name="dasar_pertimbangan" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Link Tautan</label>
                                <input name="link_tautan" type="text" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Status Folder</label>
                                <select name="status_folder" class="form-select">
                                    <option value="Belum di Folder">Belum di Folder</option>
                                    <option value="Sudah di Folder">Sudah di Folder</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Status Kasus</label>
                                <select name="status_kasus" class="form-select">
                                    <option value="Pending">Pending</option>
                                    <option value="Tindak Lanjut">Tindak Lanjut</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Divisi</label>
                                <select name="divisi" class="form-select">
                                    <option value="Hubker">Hubker</option>
                                    <option value="K3">K3</option>
                                    <option value="Penyidikan">Penyidikan</option>
                                    <option value="Perempuan & Anak">Perempuan & Anak</option>
                                    <option value="WKWI">WKWI</option>
                                    <option value="TU">TU</option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label>Upload File (Optional)</label>
                                <input name="file_upload" type="file" class="form-control"
                                    accept=".pdf,.jpg,.png">
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary w-100">Simpan Arsip</button>
                        </div>

                    </form>
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
                        <th rowspan="2">Divisi</th>
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
                    @forelse ($arsip->where('divisi', 'Penyidikan') as $item)
                        <tr>
                            <td>{{ $item->nomor_berkas }}</td>
                            <td>{{ $item->nomor_item_arsip }}</td>

                            <td>{{ $item->kode_klasifikasi }}</td>
                            <td class="text-truncate" style="max-width: 150px;"
                                title="{{ $item->nama_klasifikasi }}">
                                {{ $item->nama_klasifikasi }}
                            </td>

                            <td>{{ $item->nomor_surat }}</td>
                            <td>{{ $item->tanggal_surat }}</td>
                            <td>{{ $item->jenis_surat }}</td>

                            <td class="text-truncate" style="max-width: 120px;" title="{{ $item->dari }}">
                                {{ $item->dari }}
                            </td>

                            <td class="text-truncate" style="max-width: 120px;" title="{{ $item->ke }}">
                                {{ $item->ke }}
                            </td>

                            <td>{{ $item->perihal }}</td>
                            <td>{{ $item->jumlah_lembar }}</td>
                            <td>{{ $item->tingkat_perkembangan }}</td>
                            <td>{{ $item->klasifikasi_keamanan }}</td>
                            <td>{{ $item->hak_akses }}</td>
                            <td>{{ $item->akses_publik }}</td>
                            <td>{{ $item->dasar_pertimbangan }}</td>

                            <td>
                                <a href="{{ $item->link_tautan }}" class="text-primary text-decoration-none"
                                    target="_blank">
                                    Lihat
                                </a>
                            </td>

                            <td>{{ $item->status_folder }}</td>

                            <td>
                                @if ($item->status_kasus == 'Pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif ($item->status_kasus == 'Tindak Lanjut')
                                    <span class="badge bg-primary">Tindak Lanjut</span>
                                @else
                                    <span class="badge bg-success">Selesai</span>
                                @endif
                            </td>

                            <td>{{ $item->divisi }}</td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-link text-dark p-0" type="button"
                                        data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots fs-5"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit{{ $item->id }}">
                                                <i class="bi bi-pencil me-2"></i> Edit
                                            </button>

                                        </li>
                                        <li>
                                            <form action="{{ route('arsip.destroy', $item->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item text-danger"
                                                    onclick="return confirm('Yakin hapus?')">
                                                    <i class="bi bi-trash me-2"></i> Hapus
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            
                            <!-- Modal Edit Arsip -->
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Edit Arsip</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form action="{{ route('arsip.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="divisi" value="{{ $item->divisi }}">



                        <div class="modal-body">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Nomor Berkas</label>
                                    <input name="nomor_berkas" type="text" class="form-control"
                                        value="{{ $item->nomor_berkas }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Nomor Item Arsip</label>
                                    <input name="nomor_item_arsip" type="text" class="form-control"
                                        value="{{ $item->nomor_item_arsip }}">
                                </div>
                            </div>

                            <h6>KODE KLASIFIKASI</h6>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Kode</label>
                                    <input name="kode_klasifikasi" type="text" class="form-control"
                                        value="{{ $item->kode_klasifikasi }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Klasifikasi</label>
                                    <input name="nama_klasifikasi" type="text" class="form-control"
                                        value="{{ $item->nama_klasifikasi }}">
                                </div>
                            </div>

                            <h6>JUDUL ITEM ARSIP</h6>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label>Nomor Surat</label>
                                    <input name="nomor_surat" type="text" class="form-control"
                                        value="{{ $item->nomor_surat }}">
                                </div>
                                <div class="col-md-4">
                                    <label>Tanggal</label>
                                    <input name="tanggal_surat" type="date" class="form-control"
                                        value="{{ $item->tanggal_surat }}">
                                </div>
                                <div class="col-md-4">
                                    <label>Jenis Surat</label>
                                    <select name="jenis_surat" class="form-select">
                                        <option value="Surat Masuk"
                                            {{ $item->jenis_surat == 'Surat Masuk' ? 'selected' : '' }}>Surat Masuk
                                        </option>
                                        <option value="Surat Dinas"
                                            {{ $item->jenis_surat == 'Surat Dinas' ? 'selected' : '' }}>Surat Dinas
                                        </option>
                                        <option value="NP" {{ $item->jenis_surat == 'NP' ? 'selected' : '' }}>Nota
                                            Pemeriksaan</option>
                                        <option value="SPT" {{ $item->jenis_surat == 'SPT' ? 'selected' : '' }}>
                                            Surat Perintah Tugas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Dari</label>
                                    <input name="dari" type="text" class="form-control"
                                        value="{{ $item->dari }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Ke</label>
                                    <input name="ke" type="text" class="form-control"
                                        value="{{ $item->ke }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Perihal</label>
                                <input name="perihal" type="text" class="form-control"
                                    value="{{ $item->perihal }}">
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label>Jumlah Lembar</label>
                                    <input name="jumlah_lembar" type="number" class="form-control"
                                        value="{{ $item->jumlah_lembar }}">
                                </div>
                                <div class="col-md-4">
                                    <label>Tingkat Perkembangan</label>
                                    <select name="tingkat_perkembangan" class="form-select">
                                        <option value="Asli"
                                            {{ $item->tingkat_perkembangan == 'Asli' ? 'selected' : '' }}>Asli</option>
                                        <option value="Copy"
                                            {{ $item->tingkat_perkembangan == 'Copy' ? 'selected' : '' }}>Copy</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Klasifikasi Keamanan</label>
                                    <select name="klasifikasi_keamanan" class="form-select">
                                        <option value="Biasa"
                                            {{ $item->klasifikasi_keamanan == 'Biasa' ? 'selected' : '' }}>Biasa
                                        </option>
                                        <option value="Rahasia"
                                            {{ $item->klasifikasi_keamanan == 'Rahasia' ? 'selected' : '' }}>Rahasia
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label>Hak Akses</label>
                                    <select name="hak_akses" class="form-select">
                                        <option value="Internal"
                                            {{ $item->hak_akses == 'Internal' ? 'selected' : '' }}>Internal</option>
                                        <option value="Publik" {{ $item->hak_akses == 'Publik' ? 'selected' : '' }}>
                                            Publik</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Akses Publik</label>
                                    <select name="akses_publik" class="form-select">
                                        <option value="Ya" {{ $item->akses_publik == 'Ya' ? 'selected' : '' }}>Ya
                                        </option>
                                        <option value="Tidak" {{ $item->akses_publik == 'Tidak' ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Dasar Pertimbangan</label>
                                    <input name="dasar_pertimbangan" class="form-control"
                                        value="{{ $item->dasar_pertimbangan }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Link Tautan</label>
                                <input name="link_tautan" type="text" class="form-control"
                                    value="{{ $item->link_tautan }}">
                            </div>

                            <div class="mb-3">
                                <label>Status Folder</label>
                                <select name="status_folder" class="form-select">
                                    <option value="Belum di Folder"
                                        {{ $item->status_folder == 'Belum di Folder' ? 'selected' : '' }}>Belum di
                                        Folder</option>
                                    <option value="Sudah di Folder"
                                        {{ $item->status_folder == 'Sudah di Folder' ? 'selected' : '' }}>Sudah di
                                        Folder</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Status Kasus</label>
                                <select name="status_kasus" class="form-select">
                                    <option value="Pending" {{ $item->status_kasus == 'Pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="Tindak Lanjut"
                                        {{ $item->status_kasus == 'Tindak Lanjut' ? 'selected' : '' }}>Tindak Lanjut
                                    </option>
                                    <option value="Selesai" {{ $item->status_kasus == 'Selesai' ? 'selected' : '' }}>
                                        Selesai</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Divisi</label>
                                <select name="divisi" class="form-select">
                                    <option value="Hubker" {{ $item->divisi == 'Hubker' ? 'selected' : '' }}>Hubker
                                    </option>
                                    <option value="K3" {{ $item->divisi == 'K3' ? 'selected' : '' }}>K3</option>
                                    <option value="Penyidikan" {{ $item->divisi == 'Penyidikan' ? 'selected' : '' }}>
                                        Penyidikan</option>
                                    <option value="Perempuan & Anak"
                                        {{ $item->divisi == 'Perempuan & Anak' ? 'selected' : '' }}>Perempuan & Anak
                                    </option>
                                    <option value="WKWI" {{ $item->divisi == 'WKWI' ? 'selected' : '' }}>WKWI
                                    </option>
                                    <option value="TU" {{ $item->divisi == 'TU' ? 'selected' : '' }}>TU</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Upload File (Jika ingin mengganti)</label>
                                <input name="file_upload" type="file" class="form-control"
                                    accept=".pdf,.jpg,.png">
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button class="btn btn-primary">Simpan Perubahan</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="21" class="text-center text-muted">Belum ada data arsip</td>
                        </tr>
                    @endforelse
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
