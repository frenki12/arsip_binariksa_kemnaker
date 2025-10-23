<!-- Search + Filter -->
<div class="d-flex mb-3">
    <input type="text" class="form-control me-2" placeholder="Cari surat, nomor, atau perusahaan...">
    <button id="filterBtn" class="btn btn-outline-secondary" type="button">
        <i class="bi bi-funnel"></i> Filter
    </button>
</div>



<!-- Filter Box -->
<div id="filterBox" class="mt-2 collapse-box" style="display:none;">
    <div class="card card-body">
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Bulan</label>
                <select class="form-select" id="bulanSelect">
                    <option selected disabled>Pilih Bulan</option>
                    <option value="semua">Semua Bulan</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Tahun</label>
                <select class="form-select">
                    <option selected disabled>Pilih Tahun</option>
                    @for ($year = date('Y'); $year >= 1945; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Divisi</label>
                <select class="form-select">
                    <option selected disabled>Pilih Divisi</option>
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
</div>
