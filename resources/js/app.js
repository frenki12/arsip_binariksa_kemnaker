window.openEdit = function (id) {
    fetch("/arsip/" + id + "/edit")
        .then((res) => res.json())
        .then((data) => {
            document.getElementById("edit_id").value = data.id;
            document.getElementById("edit_nomor_berkas").value =
                data.nomor_berkas;
            document.getElementById("edit_nomor_item_arsip").value =
                data.nomor_item_arsip;
            document.getElementById("edit_kode_klasifikasi").value =
                data.kode_klasifikasi;
            document.getElementById("edit_nama_klasifikasi").value =
                data.nama_klasifikasi;
            document.getElementById("edit_nomor_surat").value =
                data.nomor_surat;
            document.getElementById("edit_tanggal_surat").value =
                data.tanggal_surat;
            document.getElementById("edit_jenis_surat").value =
                data.jenis_surat;
            document.getElementById("edit_dari").value = data.dari;
            document.getElementById("edit_ke").value = data.ke;
            document.getElementById("edit_perihal").value = data.perihal;
            document.getElementById("edit_jumlah_lembar").value =
                data.jumlah_lembar;
            document.getElementById("edit_tingkat_perkembangan").value =
                data.tingkat_perkembangan;
            document.getElementById("edit_klasifikasi_keamanan").value =
                data.klasifikasi_keamanan;
            document.getElementById("edit_hak_akses").value = data.hak_akses;
            document.getElementById("edit_akses_publik").value =
                data.akses_publik;
            document.getElementById("edit_dasar_pertimbangan").value =
                data.dasar_pertimbangan;
            document.getElementById("edit_link_tautan").value =
                data.link_tautan;
            document.getElementById("edit_status_folder").value =
                data.status_folder;
            document.getElementById("edit_status_kasus").value =
                data.status_kasus;
            document.getElementById("edit_divisi").value = data.divisi;

            const modal = new bootstrap.Modal(
                document.getElementById("modalEdit")
            );
            modal.show();
        });
};

// =====================================
// 📦 IMPORT MODULE
// =====================================
import "./bootstrap"; // ⬅️ sudah include bootstrap.bundle + axios
import Chart from "chart.js/auto"; // Chart.js modern

// =====================================
// 📊 MAIN SCRIPT
// =====================================
document.addEventListener("DOMContentLoaded", () => {
    // ==============================
    // 🔹 SIDEBAR TOGGLE
    // ==============================
    const toggleBtn = document.getElementById("toggleSidebar");
    const closeBtn = document.getElementById("closeSidebar");
    const sidebar = document.querySelector(".sidebar");
    const content = document.querySelector(".content");

    if (toggleBtn && sidebar && content) {
        toggleBtn.addEventListener("click", () => {
            if (window.innerWidth > 992) {
                sidebar.classList.toggle("hidden");
                content.classList.toggle("full");
            } else {
                sidebar.classList.toggle("show");
            }
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            sidebar.classList.remove("show");
        });
    }

    // Tutup sidebar otomatis di HP (kecuali klik submenu)
    document.addEventListener("click", (e) => {
        if (window.innerWidth <= 992) {
            const sidebar = document.getElementById("sidebar");
            const toggleBtn = document.getElementById("toggleSidebar");
            const dokumenToggle = document.getElementById("dokumenToggle");

            const clickedInsideSidebar = sidebar.contains(e.target);
            const clickedToggleBtn = toggleBtn && toggleBtn.contains(e.target);
            const clickedDokumenToggle =
                dokumenToggle && dokumenToggle.contains(e.target);

            if (
                !clickedInsideSidebar &&
                !clickedToggleBtn &&
                !clickedDokumenToggle
            ) {
                sidebar.classList.remove("show");
            }
        }
    });

    /* =========================
   BAR CHART - DIVISI
========================= */
    new Chart(document.getElementById("barChart"), {
        type: "bar",
        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "Mei",
                "Jun",
                "Jul",
                "Agu",
                "Sep",
                "Okt",
                "Nov",
                "Des",
            ],
            datasets: [
                {
                    label: "Jumlah Kasus",
                    data: [12, 19, 8, 15, 22, 17, 15, 22, 17, 15, 22, 17],
                    borderRadius: 10,
                    backgroundColor: (context) => {
                        const ctx = context.chart.ctx;
                        const gradient = ctx.createLinearGradient(0, 0, 0, 300);
                        gradient.addColorStop(0, "#00ffd5");
                        gradient.addColorStop(1, "#00c6ff");
                        return gradient;
                    },
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
            },
            scales: {
                x: {
                    ticks: { color: "#94a3b8" },
                    grid: { display: false },
                },
                y: {
                    ticks: { color: "#94a3b8" },
                    grid: {
                        color: "rgba(255,255,255,.05)",
                    },
                },
            },
        },
    });

    // ==============================
    // 📊 CHART.JS PIE & BAR
    // ==============================
    const pieCanvas = document.getElementById("pieChart");
    // const barCanvas = document.getElementById("barChart");

    if (pieCanvas) {
        new Chart(pieCanvas, {
            type: "pie",
            data: {
                labels: [
                    "Selesai 50%",
                    "Tindak Lanjut 31%",
                    "Belum Ditindaklanjuti 19%",
                ],
                datasets: [
                    {
                        data: [50, 31, 19],
                        backgroundColor: ["#28a745", "#ffc107", "#dc3545"],
                    },
                ],
            },
        });
    }

    // if (barCanvas) {
    //     new Chart(barCanvas, {
    //         type: "bar",
    //         data: {
    //             labels: ["K3", "HUBKER", "Penyidik", "Perempuan Anak"],
    //             datasets: [
    //                 {
    //                     label: "Selesai",
    //                     data: [90, 95, 78, 96],
    //                     backgroundColor: "#28a745",
    //                 },
    //                 {
    //                     label: "Tindak Lanjut",
    //                     data: [40, 35, 52, 48],
    //                     backgroundColor: "#ffc107",
    //                 },
    //                 {
    //                     label: "Belum",
    //                     data: [15, 18, 22, 28],
    //                     backgroundColor: "#dc3545",
    //                 },
    //             ],
    //         },
    //         options: {
    //             responsive: true,
    //             scales: { y: { beginAtZero: true } },
    //         },
    //     });
    // }

    // ==============================
    // 🔍 SEARCH + FILTER
    // ==============================
    const searchInput = document.querySelector(
        'input[placeholder="Cari surat, nomor, atau perusahaan..."]'
    );
    const bulanSelect = document.getElementById("bulanSelect");
    const tahunSelect = document.getElementById("tahunSelect");
    const statusSelect = document.getElementById("statusSelect");
    const tableRows = document.querySelectorAll("#myTable tbody tr");

    // isi bulan
    const bulanList = [
        { value: "1", text: "Januari" },
        { value: "2", text: "Februari" },
        { value: "3", text: "Maret" },
        { value: "4", text: "April" },
        { value: "5", text: "Mei" },
        { value: "6", text: "Juni" },
        { value: "7", text: "Juli" },
        { value: "8", text: "Agustus" },
        { value: "9", text: "September" },
        { value: "10", text: "Oktober" },
        { value: "11", text: "November" },
        { value: "12", text: "Desember" },
    ];
    bulanList.forEach((b) => {
        const opt = document.createElement("option");
        opt.value = b.value;
        opt.textContent = b.text;
        bulanSelect.appendChild(opt);
    });

    // isi tahun
    const currentYear = new Date().getFullYear();
    for (let y = currentYear; y >= 1945; y--) {
        const opt = document.createElement("option");
        opt.value = y;
        opt.textContent = y;
        tahunSelect.appendChild(opt);
    }

    function parseTanggal(raw) {
        let dt;
        if (raw.includes("-")) {
            const parts = raw.split("-");
            if (parts[0].length === 4)
                dt = new Date(
                    Number(parts[0]),
                    Number(parts[1]) - 1,
                    Number(parts[2])
                ); // yyyy-mm-dd
            else
                dt = new Date(
                    Number(parts[2]),
                    Number(parts[1]) - 1,
                    Number(parts[0])
                ); // dd-mm-yyyy
        } else if (raw.includes("/")) {
            const [d, m, y] = raw.split("/");
            dt = new Date(Number(y), Number(m) - 1, Number(d));
        } else dt = new Date(raw);
        return dt;
    }

    function filterTable() {
        const keyword = searchInput.value.toLowerCase();
        const bulan = bulanSelect.value;
        const tahun = tahunSelect.value;
        const status = statusSelect.value.toLowerCase();

        const tableRows = document.querySelectorAll("#myTable tbody tr");

        tableRows.forEach((row) => {
            let show = true;
            const tanggalCell = row.querySelector(".tanggal_surat");
            const statusCell = row.querySelector(".status_kasus");

            // Keyword
            if (keyword && !row.textContent.toLowerCase().includes(keyword))
                show = false;

            // Bulan & Tahun
            if (tanggalCell) {
                const dt = parseTanggal(tanggalCell.textContent.trim());
                if (bulan !== "semua" && dt.getMonth() + 1 !== Number(bulan))
                    show = false;
                if (tahun !== "semua" && dt.getFullYear() !== Number(tahun))
                    show = false;
            }

            // Status
            if (status !== "semua" && statusCell) {
                const s = statusCell.textContent.trim().toLowerCase();
                if (!s.includes(status)) show = false;
            }

            row.style.display = show ? "" : "none";
        });
    }

    searchInput.addEventListener("keyup", filterTable);
    bulanSelect.addEventListener("change", filterTable);
    tahunSelect.addEventListener("change", filterTable);
    statusSelect.addEventListener("change", filterTable);

    // ==============================
    // ⚙️ FILTER BOX
    // ==============================
    const filterBtn = document.querySelector("#filterBtn");
    const filterBox = document.querySelector("#filterBox");
    if (filterBtn && filterBox) {
        filterBtn.addEventListener("click", (e) => {
            e.preventDefault();
            filterBox.style.display =
                filterBox.style.display === "none" ? "block" : "none";
        });
    }

    // ==============================
    // 📂 SUBMENU DOKUMEN (Fix Auto-Hide)
    // ==============================

    // Sidebar Dokumen
    const dokumenToggle = document.getElementById("dokumenToggle");
    const submenuDokumen = document.getElementById("submenuDokumen");

    if (dokumenToggle && submenuDokumen) {
        const chevron = dokumenToggle.querySelector(".bi-chevron-down");

        dokumenToggle.addEventListener("click", function () {
            submenuDokumen.classList.toggle("show");

            // Rotasi panah
            if (submenuDokumen.classList.contains("show")) {
                if (chevron) chevron.style.transform = "rotate(180deg)";
            } else {
                if (chevron) chevron.style.transform = "rotate(0deg)";
            }
        });
    }
    // const dokumenToggle = document.getElementById("dokumenToggle");
    // const submenuDokumen = document.getElementById("submenuDokumen");
    // const chevron = dokumenToggle.querySelector(".bi-chevron-down");

    // dokumenToggle.addEventListener("click", function () {
    //     submenuDokumen.classList.toggle("show");

    //     // Rotasi panah
    //     if (submenuDokumen.classList.contains("show")) {
    //         chevron.style.transform = "rotate(180deg)";
    //     } else {
    //         chevron.style.transform = "rotate(0deg)";
    //     }
    // });

    // ==============================
    // 📊 STATUS SURAT CHART
    // ==============================
    const ctx = document.getElementById("statusSuratChart");
    if (ctx) {
        new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Selesai", "Pending", "Proses", "Nonresmi"],
                datasets: [
                    {
                        data: [21, 12, 7, 4],
                        backgroundColor: [
                            "#0d6efd",
                            "#ffc107",
                            "#17a2b8",
                            "#6c757d",
                        ],
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: { legend: { position: "bottom" } },
            },
        });
    }
});
