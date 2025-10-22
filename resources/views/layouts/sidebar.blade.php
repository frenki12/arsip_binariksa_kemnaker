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
            <li class="nav-item"><a href="/administrator/dashboard_admin" class="nav-link"><i class="bi bi-house"></i> <span>Dashboard</span></a></li>
            <li class="nav-item"><a href="/administrator/suratmasuk_admin" class="nav-link"><i class="bi bi-envelope"></i> <span>Surat Masuk</span></a></li>
            <li class="nav-item"><a href="/administrator/suratkeluar_admin" class="nav-link"><i class="bi bi-send"></i> <span>Surat Keluar</span></a></li>
            <li class="nav-item"><a href="/administrator/folder_admin" class="nav-link"><i class="bi bi-folder"></i> <span>Folder Surat</span></a></li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" id="dokumenToggle" href="javascript:void(0)">
                    <i class="bi bi-folder me-2"></i>
                    <span>Dokumen</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul class="list-unstyled ps-4" id="submenuDokumen">
                    <li><a href="/administrator/dokumen_admin" class="nav-link">TU</a></li>
                    <li><a href="/administrator/dokumen_k3" class="nav-link">NORMA K3</a></li>
                    <li><a href="/administrator/dokumen_hubker" class="nav-link">HUBKER</a></li>
                    <li><a href="/administrator/dokumen_wkwi" class="nav-link">WKWI</a></li>
                    <li><a href="/administrator/dokumen_penyidikan" class="nav-link">PENYIDIKAN</a></li>
                    <li><a href="/administrator/dokumen_perempuan_anak" class="nav-link">PEREMPUAN & ANAK</a></li>
                </ul>
            </li>
            <li class="nav-item"><a href="/administrator/kategori_admin" class="nav-link"><i class="bi bi-tags"></i> <span>Kategori</span></a></li>
            <li class="nav-item"><a href="/administrator/laporan_admin" class="nav-link"><i class="bi bi-graph-up"></i> <span>Laporan</span></a></li>
            <li class="nav-item"><a href="/administrator/pengguna_admin" class="nav-link"><i class="bi bi-people"></i> <span>Pengguna</span></a></li>
        </ul>
    </div>

    <!-- Bagian bawah tetap -->
    <div class="sidebar-footer mt-auto pt-3 border-top">
        <div class="d-flex align-items-center">
            <div class="rounded-circle bg-primary text-white p-2 me-2">AD</div>
            <div>
                <span>Administrator</span><br>
                <small class="badge bg-primary">Admin</small>
            </div>
        </div>
        <a href="#" class="btn btn-outline-danger btn-sm w-100 mt-3"><i class="bi bi-box-arrow-right"></i> Keluar</a>
    </div>
</div>
