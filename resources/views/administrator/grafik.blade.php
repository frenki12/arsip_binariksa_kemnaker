<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - Demo</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    :root{
      --bg:#f5f7fa;
      --card:#ffffff;
      --muted:#6b7280;
      --accent:#2b6cb0; /* biru lembut utama */
      --accent-2:#7fb1da;
      --success:#28a745;
      --warning:#ffc107;
      --danger:#dc3545;
    }

    html,body{
      height:100%;
      font-family: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      background: var(--bg);
      color: #213547;
    }

    .wrapper{
      min-height:100vh;
      padding: 2rem;
    }

    /* Top summary cards */
    .summary-row {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px,1fr));
      gap: 1rem;
      margin-bottom: 1.4rem;
    }

    .summary {
      background: var(--card);
      border-radius: 12px;
      padding: 1rem;
      box-shadow: 0 6px 18px rgba(17,24,39,0.06);
      display: flex;
      gap: 1rem;
      align-items: center;
    }

    .summary .icon {
      width:56px;
      height:56px;
      border-radius:12px;
      display:flex;
      align-items:center;
      justify-content:center;
      background: linear-gradient(180deg, rgba(43,108,176,0.12), rgba(127,177,218,0.06));
      flex-shrink:0;
    }

    .summary h5{
      margin:0;
      font-size:0.85rem;
      font-weight:600;
      color:#243646;
    }
    .summary .value {
      font-size:1.35rem;
      font-weight:700;
      margin-top:4px;
      color:var(--accent);
    }
    .summary small { color: var(--muted); }

    /* Main layout: charts area */
    .charts-row {
      display:grid;
      grid-template-columns: 1fr 360px;
      gap: 1rem;
      margin-bottom:1.4rem;
    }

    @media (max-width: 992px) {
      .charts-row { grid-template-columns: 1fr; }
    }

    .card-panel {
      background: var(--card);
      border-radius: 12px;
      padding: 1rem;
      box-shadow: 0 6px 18px rgba(17,24,39,0.06);
    }

    /* doughnut small layout */
    .doughnut-item {
      display:flex;
      gap:.8rem;
      align-items:center;
      padding: .5rem 0;
    }
    .doughnut-item .meta {
      flex:1;
    }
    .doughnut-label { font-weight:600; color:#243646; margin-bottom:2px; }
    .doughnut-desc { font-size:.85rem; color:var(--muted); margin:0; }

    /* extra small metric cards (progress style) */
    .mini-cards {
      display:grid;
      grid-template-columns: repeat(auto-fit, minmax(220px,1fr));
      gap:1rem;
    }

    .mini {
      background: var(--card);
      border-radius: 12px;
      padding: 0.9rem;
      box-shadow: 0 6px 18px rgba(17,24,39,0.04);
    }

    .progress-line {
      height:10px;
      background:#eef2f6;
      border-radius: 8px;
      overflow: hidden;
      margin-top:8px;
    }
    .progress-line > i {
      display:block;
      height:100%;
      background: linear-gradient(90deg,var(--accent),var(--accent-2));
    }

    /* small text */
    .muted { color:var(--muted); font-size:.9rem; }

    /* bottom widgets (sparklines/cards) */
    .bottom-grid {
      display:grid;
      grid-template-columns: 1fr 420px;
      gap: 1rem;
    }
    @media (max-width: 992px) {
      .bottom-grid { grid-template-columns: 1fr; }
    }

    /* responsive tweaks: mobile icons as app-like grid 2-per-row */
    @media (max-width: 576px){
      .summary-row { grid-template-columns: repeat(2,1fr); }
    }

    /* Chart canvas sizing helpers */
    .chart-full { width:100%; height:340px; }
    .chart-small { width:120px; height:120px; }
    .doughnut-canvas { width:100px !important; height:100px !important; }
  </style>
</head>
<body>
  <div class="wrapper container-fluid">

    <!-- ------- Top summary (4 metrics) ------- -->
    <div class="summary-row">
      <div class="summary">
        <div class="icon">
          <!-- simple SVG icon -->
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M3 7h14v13H3z" stroke="#2b6cb0" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/><path d="M7 3h10v4" stroke="#2b6cb0" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <div class="flex-grow-1">
          <h5>Total Surat</h5>
          <div class="value">1,284</div>
          <small class="muted">↑ 12% dari bulan lalu</small>
        </div>
      </div>

      <div class="summary">
        <div class="icon">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M3 7h18v11H3z" stroke="#2b6cb0" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <div class="flex-grow-1">
          <h5>Total Folder</h5>
          <div class="value">156</div>
          <small class="muted">↑ 5% dari bulan lalu</small>
        </div>
      </div>

      <div class="summary">
        <div class="icon">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M12 2v8" stroke="#2b6cb0" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 12h14" stroke="#2b6cb0" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <div class="flex-grow-1">
          <h5>Selesai</h5>
          <div class="value text-success">1,012</div>
          <small class="muted">Rate penyelesaian 78%</small>
        </div>
      </div>

      <div class="summary">
        <div class="icon">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#2b6cb0" stroke-width="1.4"/></svg>
        </div>
        <div class="flex-grow-1">
          <h5>Pending</h5>
          <div class="value text-warning">392</div>
          <small class="muted">Perlu tindak lanjut</small>
        </div>
      </div>
    </div>

    <!-- ------- Charts Row: bar (left) + doughnuts (right) ------- -->
    <div class="charts-row">
      <!-- Left: Bar chart -->
      <div class="card-panel">
        <h6 class="mb-3 fw-semibold">Performa per Divisi</h6>
        <canvas id="barChart" class="chart-full"></canvas>
      </div>

      <!-- Right: two doughnuts -->
      <div class="card-panel d-flex flex-column justify-content-center">
        <div class="doughnut-item mb-3">
          <canvas id="doughnut1" class="doughnut-canvas"></canvas>
          <div class="meta">
            <div class="doughnut-label">Selesai</div>
            <p class="doughnut-desc">Persentase surat selesai dari total</p>
            <div class="mt-2"><strong style="color:var(--accent)">77%</strong></div>
          </div>
        </div>

        <div class="doughnut-item">
          <canvas id="doughnut2" class="doughnut-canvas"></canvas>
          <div class="meta">
            <div class="doughnut-label">Tindak Lanjut</div>
            <p class="doughnut-desc">Surat yang dalam proses tindak lanjut</p>
            <div class="mt-2"><strong style="color:var(--warning)">67%</strong></div>
          </div>
        </div>
      </div>
    </div>

    <!-- ------- Mini cards / progress / small charts ------- -->
    <div class="mini-cards mb-4">
      <div class="mini">
        <div class="d-flex justify-content-between">
          <div><strong>Index Kepatuhan</strong></div>
          <div class="muted">51%</div>
        </div>
        <div class="progress-line mt-2"><i style="width:51%"></i></div>
        <p class="muted mt-2 mb-0">Rata-rata kepatuhan perusahaan per bulan</p>
      </div>

      <div class="mini">
        <div class="d-flex justify-content-between">
          <div><strong>Inspeksi</strong></div>
          <div class="muted">83%</div>
        </div>
        <div class="progress-line mt-2"><i style="width:83%; background:linear-gradient(90deg,#7b61a6,#c48bd6)"></i></div>
        <p class="muted mt-2 mb-0">Target inspeksi terpenuhi</p>
      </div>

      <div class="mini">
        <div class="d-flex justify-content-between">
          <div><strong>Kecepatan Respon</strong></div>
          <div class="muted">38%</div>
        </div>
        <div class="progress-line mt-2"><i style="width:38%; background:linear-gradient(90deg,#ff9f43,#ffd29b)"></i></div>
        <p class="muted mt-2 mb-0">Rata-rata waktu respon</p>
      </div>
    </div>

    <!-- ------- Bottom area: mixed charts + list ------- -->
    <div class="bottom-grid">
      <div class="card-panel">
        <h6 class="mb-3 fw-semibold">Tren Bulanan</h6>
        <canvas id="lineChart" style="width:100%;height:240px;"></canvas>
      </div>

      <div class="card-panel">
        <h6 class="mb-3 fw-semibold">Daftar Teratas</h6>

        <ul class="list-unstyled">
          <li class="d-flex align-items-center mb-3">
            <div class="me-3" style="width:44px;height:44px;border-radius:8px;background:linear-gradient(180deg,#eef7ff,#dfeefb);display:flex;align-items:center;justify-content:center">
              <svg width="20" height="20" viewBox="0 0 24 24"><path d="M12 2v8" stroke="#2b6cb0" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div class="flex-grow-1">
              <div class="fw-semibold">Monica Fox</div>
              <small class="muted">Sun City • Manager</small>
            </div>
            <div class="ms-3 muted">Active</div>
          </li>

          <li class="d-flex align-items-center mb-3">
            <div class="me-3" style="width:44px;height:44px;border-radius:8px;background:linear-gradient(180deg,#fff7f0,#fde8d6);display:flex;align-items:center;justify-content:center">
              <svg width="20" height="20"><path d="M3 7h18" stroke="#ff9f43" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div class="flex-grow-1">
              <div class="fw-semibold">Gefry Smitt</div>
              <small class="muted">New York • Staff</small>
            </div>
            <div class="ms-3 muted">Idle</div>
          </li>

          <li class="d-flex align-items-center mb-3">
            <div class="me-3" style="width:44px;height:44px;border-radius:8px;background:linear-gradient(180deg,#f0fff6,#dbf5e7);display:flex;align-items:center;justify-content:center">
              <svg width="20" height="20"><path d="M3 12h18" stroke="#34c38f" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div class="flex-grow-1">
              <div class="fw-semibold">Stefany Milly</div>
              <small class="muted">Sun City • Officer</small>
            </div>
            <div class="ms-3 muted">Active</div>
          </li>
        </ul>
      </div>
    </div>

  </div>

  <!-- Scripts: Chart init -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // ---------- Bar Chart (per divisi) ----------
      const barCtx = document.getElementById('barChart').getContext('2d');
      new Chart(barCtx, {
        type: 'bar',
        data: {
          labels: ["K3", "HUBKER", "Penyidik", "Perempuan Anak"],
          datasets: [
            { label: "Selesai", data: [90,95,78,96], backgroundColor: '#28a745' },
            { label: "Tindak Lanjut", data: [40,35,52,48], backgroundColor: '#ffc107' },
            { label: "Belum", data: [15,18,22,28], backgroundColor: '#dc3545' },
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          interaction: { mode: 'index', intersect: false },
          stacked: false,
          scales: {
            x: { grid: { display: false }, ticks: { color: '#556b7a' } },
            y: { beginAtZero:true, ticks: { color: '#556b7a' }, grid: { color: '#eef2f6' } }
          },
          plugins: {
            legend: { position: 'bottom', labels: { boxWidth:12, color: '#556b7a' } }
          }
        }
      });

      // ---------- Doughnuts ----------
      const createDoughnut = (id, percent, mainColor) => {
        const ctx = document.getElementById(id).getContext('2d');
        new Chart(ctx, {
          type: 'doughnut',
          data: { datasets: [{ data: [percent, 100-percent], backgroundColor: [mainColor, '#eef2f6'], borderWidth:0 }] },
          options: {
            cutout: '78%',
            responsive:true,
            plugins: { legend: { display: false }, tooltip: { enabled:false } }
          },
          plugins: [{
            id: 'centerText',
            afterDraw(chart) {
              const {ctx, chartArea:{width, height}} = chart;
              ctx.save();
              ctx.font = '600 18px Poppins';
              ctx.fillStyle = '#243646';
              ctx.textAlign = 'center';
              ctx.textBaseline = 'middle';
              ctx.fillText(percent + '%', width/2, height/2);
            }
          }]
        });
      };

      createDoughnut('doughnut1', 77, '#2b6cb0');
      createDoughnut('doughnut2', 67, '#ffc107');

      // ---------- Line Chart (monthly trend) ----------
      const lineCtx = document.getElementById('lineChart').getContext('2d');
      new Chart(lineCtx, {
        type:'line',
        data: {
          labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul'],
          datasets: [
            { label:'Surat Masuk', data: [120,140,135,160,180,170,190], borderColor:'#2b6cb0', backgroundColor:'rgba(43,108,176,0.08)', tension:0.35, fill:true, pointRadius:3 },
            { label:'Surat Keluar', data: [80,95,90,110,120,115,130], borderColor:'#7fb1da', backgroundColor:'rgba(127,177,218,0.06)', tension:0.35, fill:true, pointRadius:3 }
          ]
        },
        options: {
          responsive:true,
          maintainAspectRatio:false,
          scales: {
            x:{ grid:{ display:false }, ticks:{ color:'#556b7a' } },
            y:{ grid:{ color:'#eef2f6' }, ticks:{ color:'#556b7a' } }
          },
          plugins: { legend: { display:false } }
        }
      });
    });
  </script>

  <!-- Bootstrap JS (optional, for dropdowns etc) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
