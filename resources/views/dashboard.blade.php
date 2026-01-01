@extends('layouts.app')

@section('content')
<!-- =====================================================
     INVENTORY DASHBOARD — CLEAN PURE WHITE THEME FINAL
     Author: DCLIQ System | Version 2025
====================================================== -->

<style>
/* =====================================================
   DASHBOARD RESPONSIVE STYLES
====================================================== */

/* Section Header */
.section-header {
  background: linear-gradient(90deg, #f5f7ff 0%, #f0f4ff 100%) !important;
  border-radius: 12px;
  padding: 16px 20px;
  margin-bottom: 25px;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.03);
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 15px;
}

.section-header h1 {
  color: #1f1f33;
  font-weight: 700;
  margin: 0;
  font-size: clamp(1.3rem, 4vw, 2.5rem);
  flex: 1;
}

/* Card Statistic */
.card-statistic-1 {
  background: #ffffff;
  border: 1px solid #ebedf2;
  border-radius: 14px;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
  display: flex;
  align-items: center;
  transition: all 0.3s ease;
  min-height: 120px;
  margin-bottom: 15px;
  overflow: hidden;
}

.card-statistic-1:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(110, 130, 255, 0.15);
}

.card-statistic-1 .card-icon {
  width: 70px;
  height: 70px;
  border-radius: 12px;
  background: linear-gradient(135deg, #6e73ff, #8c9aff);
  color: #fff;
  font-size: 28px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 16px;
  flex-shrink: 0;
}

.card-statistic-1 .card-wrap {
  padding: 10px 0;
  flex: 1;
  min-width: 0;
}

.card-statistic-1 .card-header {
  border: none;
  background: transparent;
  padding: 0;
}

.card-statistic-1 .card-header h4 {
  color: #7a7a7a;
  font-weight: 500;
  font-size: clamp(0.8rem, 2vw, 1rem);
  margin: 0;
}

.card-statistic-1 .card-body {
  color: #1f1f1f;
  font-weight: 700;
  font-size: clamp(1.2rem, 3vw, 1.8rem);
}

/* Graph Card */
.graph-card {
  background: #ffffff;
  border: 1px solid #e9ebf4;
  border-radius: 14px;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
  margin-top: 2rem;
  padding: 20px;
}

.graph-card .card-header {
  border: none;
  background: transparent;
  padding: 0;
  margin-bottom: 15px;
}

.graph-card h4 {
  font-size: clamp(1rem, 2.5vw, 1.1rem);
  font-weight: 600;
  color: #222;
  margin: 0;
}

.graph-container {
  position: relative;
  width: 100%;
  height: 400px;
}

@media (max-width: 992px) {
  .graph-container { height: 300px; }
}

@media (max-width: 768px) {
  .graph-container { height: 250px; }
  .graph-card { padding: 15px; }
}

@media (max-width: 576px) {
  .graph-container { height: 200px; }
  .graph-card { padding: 12px; }
  .graph-card h4 { font-size: 0.95rem; }
}

/* Stock Card */
.stock-card {
  background: #ffffff;
  border: 1px solid #e9ebf4;
  border-radius: 14px;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
  margin-top: 2rem;
  padding: 20px;
}

.stock-card .card-header {
  border: none;
  background: transparent;
  padding: 0;
  margin-bottom: 15px;
}

.stock-card h4 {
  font-size: clamp(1rem, 2.5vw, 1.1rem);
  font-weight: 600;
  color: #222;
  margin: 0;
}

.table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  color: #333;
  font-size: clamp(0.75rem, 1.5vw, 0.9rem);
}

.table thead th {
  background: #f4f6ff;
  color: #444;
  font-weight: 600;
  border: none;
  text-align: left;
  padding: 12px;
  font-size: clamp(0.7rem, 1.2vw, 0.85rem);
}

.table tbody tr {
  background: #fff;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
  transition: 0.2s ease;
}

.table tbody tr:hover {
  background: #fafbff;
  box-shadow: 0 3px 10px rgba(110, 130, 255, 0.1);
}

.table td {
  padding: 12px;
  border-bottom: 1px solid #f0f0f0;
}

.badge-warning {
  background: linear-gradient(90deg, #ffcd4f, #f7b74a);
  color: #2b2b2b;
  border-radius: 6px;
  padding: 6px 10px;
  font-weight: 600;
  font-size: 0.8rem;
  display: inline-block;
}

.main-footer {
  text-align: center;
  padding-top: 20px;
  font-size: 0.9rem;
  color: #777;
  border-top: 1px solid #eee;
  background: transparent;
  margin-top: 2rem;
}

/* Responsive Grid */
.row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -12px;
  margin-left: -12px;
}

[class*='col-'] {
  padding-right: 12px;
  padding-left: 12px;
  flex-basis: 100%;
}

.col-lg-3 { flex: 0 0 25%; }
.col-lg-6 { flex: 0 0 50%; }
.col-lg-12 { flex: 0 0 100%; }

@media (max-width: 992px) {
  .col-lg-3 { flex: 0 0 33.33%; }
  .col-lg-6 { flex: 0 0 50%; }
}

@media (max-width: 768px) {
  .col-lg-3 { flex: 0 0 50%; }
  .col-md-6 { flex: 0 0 50%; }
  .col-lg-6 { flex: 0 0 100%; }
  .col-lg-12 { flex: 0 0 100%; }
  
  .card-statistic-1 { min-height: 100px; }
  .card-statistic-1 .card-icon { width: 60px; height: 60px; font-size: 22px; margin: 12px; }
  .card-statistic-1 .card-body { font-size: 1.2rem; }
  
  .stock-card { padding: 15px; }
}

@media (max-width: 576px) {
  .col-lg-3 { flex: 0 0 100%; }
  .col-md-6 { flex: 0 0 100%; }
  .col-lg-6 { flex: 0 0 100%; }
  
  .card-statistic-1 { min-height: 90px; }
  .card-statistic-1 .card-icon { width: 50px; height: 50px; font-size: 18px; margin: 10px; }
  .card-statistic-1 .card-body { font-size: 1rem; }
  .card-statistic-1 .card-header h4 { font-size: 0.65rem; }
  
  .table { font-size: 0.7rem; }
  .table thead th { padding: 8px; font-size: 0.65rem; }
  .table td { padding: 8px; }
  
  .stock-card { padding: 12px; }
}
</style>

<!-- =====================================================
     DASHBOARD MAIN CONTENT
====================================================== -->
<div class="section-header">
  <h1>📊 Dashboard</h1>
</div>

<!-- ===== SUMMARY CARDS ===== -->
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-12">
    <div class="card card-statistic-1">
      <div class="card-icon"><i class="fas fa-cubes"></i></div>
      <div class="card-wrap">
        <div class="card-header"><h4>Semua Barang</h4></div>
        <div class="card-body">{{ $barang }}</div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-12">
    <div class="card card-statistic-1">
      <div class="card-icon"><i class="fas fa-file-import"></i></div>
      <div class="card-wrap">
        <div class="card-header"><h4>Barang Masuk</h4></div>
        <div class="card-body">{{ $barangMasuk }}</div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-12">
    <div class="card card-statistic-1">
      <div class="card-icon"><i class="fas fa-file-export"></i></div>
      <div class="card-wrap">
        <div class="card-header"><h4>Barang Keluar</h4></div>
        <div class="card-body">{{ $barangKeluar }}</div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-12">
    <div class="card card-statistic-1">
      <div class="card-icon"><i class="far fa-user"></i></div>
      <div class="card-wrap">
        <div class="card-header"><h4>Pengguna</h4></div>
        <div class="card-body">{{ $user }}</div>
      </div>
    </div>
  </div>
</div>

<!-- ===== GRAPH SECTION ===== -->
<div class="graph-card">
  <div class="card-header">
    <h4>Grafik Barang Masuk & Barang Keluar</h4>
  </div>
  <div class="card-body">
    <div class="graph-container">
      <canvas id="summaryChart"></canvas>
    </div>
  </div>
</div>

<!-- ===== STOCK SECTION ===== -->
<div class="stock-card">
  <div class="card-header">
    <h4>Stok Mencapai Batas Minimum</h4>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Stok</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($barangMinimum as $barang)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $barang->kode_barang }}</td>
          <td>{{ $barang->nama_barang }}</td>
          <td><span class="badge badge-warning">{{ $barang->stok }}</span></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- ===== FOOTER ===== -->
<footer class="main-footer">
  Kantin Nurul Huda Kertawangunan - KP Fkom Uniku © 2025
</footer>

@endsection

<!-- =====================================================
     CHART.JS CONFIGURATION
====================================================== -->
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const ctx = document.getElementById('summaryChart').getContext('2d');
  const gradientBlue = ctx.createLinearGradient(0, 0, 0, 400);
  gradientBlue.addColorStop(0, 'rgba(100, 120, 255, 0.7)');
  gradientBlue.addColorStop(1, 'rgba(100, 120, 255, 0.05)');
  const gradientRed = ctx.createLinearGradient(0, 0, 0, 400);
  gradientRed.addColorStop(0, 'rgba(255, 99, 132, 0.6)');
  gradientRed.addColorStop(1, 'rgba(255, 99, 132, 0.05)');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [
        @foreach($barangMasukData as $data)
          '{{ date("F", strtotime($data->date)) }}',
        @endforeach
      ],
      datasets: [
        {
          label: 'Barang Masuk',
          data: [
            @foreach($barangMasukData as $data)
              '{{ $data->total }}',
            @endforeach
          ],
          backgroundColor: gradientBlue,
          borderRadius: 6,
          borderSkipped: false
        },
        {
          label: 'Barang Keluar',
          data: [
            @foreach($barangKeluarData as $data)
              '{{ $data->total }}',
            @endforeach
          ],
          backgroundColor: gradientRed,
          borderRadius: 6,
          borderSkipped: false
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            color: '#333',
            boxWidth: 15,
            font: { size: 13, family: 'Poppins' }
          }
        },
        tooltip: {
          backgroundColor: 'rgba(20,20,20,0.9)',
          titleColor: '#fff',
          bodyColor: '#fff',
          padding: 10,
          borderColor: '#6574ff',
          borderWidth: 1,
          cornerRadius: 8
        }
      },
      scales: {
        x: {
          grid: { color: 'rgba(0,0,0,0.05)', drawBorder: false },
          ticks: { color: '#666', font: { size: 12 } }
        },
        y: {
          grid: { color: 'rgba(0,0,0,0.05)', drawBorder: false },
          ticks: { color: '#666', stepSize: 1, precision: 0 },
          beginAtZero: true
        }
      }
    }
  });
});
</script>
@endpush
