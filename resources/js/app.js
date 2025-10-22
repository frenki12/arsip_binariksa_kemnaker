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
        const clickedDokumenToggle = dokumenToggle && dokumenToggle.contains(e.target);

        if (!clickedInsideSidebar && !clickedToggleBtn && !clickedDokumenToggle) {
            sidebar.classList.remove("show");
        }
    }
});


    // ==============================
    // 📊 CHART.JS PIE & BAR
    // ==============================
    const pieCanvas = document.getElementById("pieChart");
    const barCanvas = document.getElementById("barChart");

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

    if (barCanvas) {
        new Chart(barCanvas, {
            type: "bar",
            data: {
                labels: ["K3", "HUBKER", "Penyidik", "Perempuan Anak"],
                datasets: [
                    {
                        label: "Selesai",
                        data: [90, 95, 78, 96],
                        backgroundColor: "#28a745",
                    },
                    {
                        label: "Tindak Lanjut",
                        data: [40, 35, 52, 48],
                        backgroundColor: "#ffc107",
                    },
                    {
                        label: "Belum",
                        data: [15, 18, 22, 28],
                        backgroundColor: "#dc3545",
                    },
                ],
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true } },
            },
        });
    }

    // ==============================
    // 🔍 SEARCH + FILTER
    // ==============================
    const searchInput = document.querySelector(
        'input[placeholder="Cari surat, nomor, atau perusahaan..."]'
    );
    const bulanSelect = document.getElementById("bulanSelect");
    const statusSelect = document.getElementById("statusSelect");
    const tableRows = document.querySelectorAll("table tbody tr");

    // 📅 Isi otomatis daftar bulan
    if (bulanSelect) {
        const bulanList = [
            { value: "semua", text: "Semua Bulan" },
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

        while (bulanSelect.options.length > 1) bulanSelect.remove(1);

        bulanList.forEach((bulan) => {
            const option = document.createElement("option");
            option.value = bulan.value;
            option.textContent = bulan.text;
            bulanSelect.appendChild(option);
        });
    }

    // 🔍 Filter pencarian tabel
    if (searchInput && tableRows.length > 0) {
        searchInput.addEventListener("keyup", function () {
            const keyword = this.value.toLowerCase();
            tableRows.forEach((row) => {
                row.style.display = row.textContent
                    .toLowerCase()
                    .includes(keyword)
                    ? ""
                    : "none";
            });
        });
    }

    // 🔍 Filter bulan
    if (bulanSelect && tableRows.length > 0) {
        bulanSelect.addEventListener("change", function () {
            const selected = this.value.toLowerCase();
            tableRows.forEach((row) => {
                row.style.display =
                    selected === "semua" ||
                    row.textContent.toLowerCase().includes(selected)
                        ? ""
                        : "none";
            });
        });
    }

    // 🔍 Filter status
    if (statusSelect && tableRows.length > 0) {
        statusSelect.addEventListener("change", function () {
            const selected = this.value.toLowerCase();
            tableRows.forEach((row) => {
                row.style.display = row.textContent
                    .toLowerCase()
                    .includes(selected)
                    ? ""
                    : "none";
            });
        });
    }

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
    const chevron = dokumenToggle.querySelector(".bi-chevron-down");

    dokumenToggle.addEventListener("click", function () {
        submenuDokumen.classList.toggle("show");

        // Rotasi panah
        if (submenuDokumen.classList.contains("show")) {
            chevron.style.transform = "rotate(180deg)";
        } else {
            chevron.style.transform = "rotate(0deg)";
        }
    });


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
