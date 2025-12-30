<!-- Sidebar -->
<div class="sidebar p-3" id="sidebar">
    <!-- Tombol Close (hanya tampil di HP) -->
    <button class="btn-close-sidebar d-lg-none" id="closeSidebar">
        <i class="bi bi-x-lg"></i>
    </button>

    <h5 class="mb-4"><i class="bi bi-building"></i> <span>BINARIKSA</span></h5>

    <!-- Bagian menu scrollable -->
    <div class="sidebar-menu flex-grow-1 overflow-auto">
        <ul class="nav flex-column">
            <li class="nav-item"><a href="/administrator/dashboard_admin" class="nav-link"><i class="bi bi-house"></i>
                    <span>Dashboard</span></a></li>
            <li class="nav-item"><a href="/administrator/suratmasuk_admin" class="nav-link"><i
                        class="bi bi-envelope"></i> <span>Surat Masuk</span></a></li>
            <li class="nav-item"><a href="/administrator/suratkeluar_admin" class="nav-link"><i class="bi bi-send"></i>
                    <span>Surat Keluar</span></a></li>
            <li class="nav-item"><a href="/administrator/folder_admin" class="nav-link"><i class="bi bi-folder"></i>
                    <span>Folder Surat</span></a></li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" id="dokumenToggle" href="javascript:void(0)">
                    <i class="bi bi-folder me-2"></i>
                    <span>Dokumen</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul class="list-unstyled ps-4" id="submenuDokumen">
                    <li><a href="{{ route('dokumen.divisi', 'semua') }}"class="nav-link">SEMUA</a></li>
                    <li><a href="{{ route('dokumen.divisi', 'k3') }}"class="nav-link">K3</a></li>
                    <li><a href="{{ route('dokumen.divisi', 'hubker') }}"class="nav-link">Hubker</a></li>
                    <li><a href="{{ route('dokumen.divisi', 'wkwi') }}"class="nav-link">WKWI</a></li>
                    <li><a href="{{ route('dokumen.divisi', 'tu') }}"class="nav-link">TU</a></li>
                    <li><a href="{{ route('dokumen.divisi', 'penyidikan') }}"class="nav-link">Penyidikan</a></li>
                    <li><a href="{{ route('dokumen.divisi', 'perempuan_anak') }}"class="nav-link">Perempuan & Anak</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href="/administrator/kategori_admin" class="nav-link"><i class="bi bi-tags"></i>
                    <span>Kategori</span></a></li>
            <li class="nav-item"><a href="/administrator/laporan_admin" class="nav-link"><i class="bi bi-graph-up"></i>
                    <span>Laporan</span></a></li>
            <li class="nav-item"><a href="/administrator/pengguna_admin" class="nav-link"><i class="bi bi-people"></i>
                    <span>Pengguna</span></a></li>
        </ul>
    </div>

    <!-- Bagian bawah tetap -->
    <div class="sidebar-footer mt-auto pt-3 border-top">
        <div class="d-flex align-items-center">
            @php
                $nama = Auth::user()->name;
                $inisial = collect(explode(' ', $nama))
                    ->map(fn($kata) => strtoupper(substr($kata, 0, 1)))
                    ->take(2)
                    ->implode('');
            @endphp

            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-primary text-white p-2 me-2 fw-bold">
                    {{ $inisial }}
                </div>
                <div>
                    <span>{{ $nama }}</span><br>
                    <small class="badge bg-primary">
                        {{ ucfirst(Auth::user()->role ?? 'Admin') }}
                    </small>
                </div>
            </div>

        </div>
    </div>
    <a href="#" class="btn btn-outline-danger btn-sm w-100 mt-3"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-box-arrow-right"></i> Keluar
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

</div>
</div>
