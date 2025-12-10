@extends('layouts.app')

@section('content')
<style>
    .section-header {
        background: linear-gradient(90deg, #f5f7ff 0%, #f0f4ff 100%);
        border-radius: 12px;
        padding: 16px 20px;
        margin-bottom: 25px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.03);
    }

    .section-header h1 {
        color: #1f1f33;
        font-weight: 700;
        margin: 0;
        font-size: clamp(1.5rem, 4vw, 2.5rem);
    }

    .card-statistic-1 {
        display: flex;
        align-items: center;
        background: #ffffff;
        border-radius: 14px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        min-height: 120px;
        margin-bottom: 15px;
    }

    .card-statistic-1:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(120, 130, 255, 0.15);
    }

    .card-statistic-1 .card-icon {
        width: 70px;
        height: 70px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        margin: 16px;
        color: #fff;
        flex-shrink: 0;
    }

    .card-statistic-1 .card-wrap {
        padding: 10px 20px;
        flex: 1;
        min-width: 0;
    }

    .card-statistic-1 .card-header h4 {
        color: #7a7a7a;
        font-weight: 500;
        font-size: clamp(0.85rem, 2vw, 1rem);
        margin: 0;
    }

    .card-statistic-1 .card-body {
        color: #1f1f1f;
        font-weight: 700;
        font-size: clamp(1.4rem, 3vw, 1.8rem);
    }

    .bg-primary {
        background: linear-gradient(135deg, #6e73ff, #8c9aff) !important;
    }

    .bg-warning {
        background: linear-gradient(135deg, #ffca58, #ffb347) !important;
    }

    .bg-info {
        background: linear-gradient(135deg, #36cce8, #43b9d4) !important;
    }

    .bg-success {
        background: linear-gradient(135deg, #54e08e, #33d4a0) !important;
    }

    .card {
        border: none;
        border-radius: 16px;
        background: #ffffff;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        margin-bottom: 20px;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(110, 130, 255, 0.12);
    }

    .card .card-header {
        border-bottom: 1px solid #f0f0f0;
        background: transparent;
        color: #1f1f33;
        font-weight: 700;
        font-size: clamp(1rem, 2.5vw, 1.25rem);
        padding: 20px;
    }

    .card .card-header h4 {
        margin: 0;
    }

    .card .card-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #333;
        font-weight: 600;
        font-size: 0.95rem;
    }

    .form-control {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #6e73ff;
        box-shadow: 0 0 0 3px rgba(110, 115, 255, 0.1);
    }

    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s;
        font-size: clamp(0.9rem, 2vw, 1rem);
    }

    .btn-primary {
        background: linear-gradient(135deg, #6e73ff, #8c9aff);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(110, 115, 255, 0.4);
    }

    .btn-danger {
        background: linear-gradient(135deg, #ff5f6d, #ff7a85);
        color: white;
        padding: 6px 12px;
        font-size: 0.85rem;
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #ff4754, #ff6370);
    }

    .badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .badge-warning {
        background: linear-gradient(90deg, #ffcd4f, #f7b74a);
        color: #3a3a3a;
    }

    .table {
        border-radius: 10px;
        overflow: auto;
        color: #333;
        font-size: clamp(0.85rem, 1.5vw, 1rem);
    }

    .table thead {
        background: #f1f3ff;
        color: #444;
        font-weight: 600;
    }

    .table tbody tr:hover {
        background: rgba(150, 160, 255, 0.08);
    }

    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    @media (max-width: 768px) {
        .section-header {
            padding: 12px 16px;
            margin-bottom: 15px;
        }

        .section-header h1 {
            font-size: 1.3rem;
        }

        .card-statistic-1 {
            min-height: 100px;
        }

        .card-statistic-1 .card-icon {
            width: 60px;
            height: 60px;
            font-size: 22px;
            margin: 12px;
        }

        .card-statistic-1 .card-header h4 {
            font-size: 0.75rem;
        }

        .card-statistic-1 .card-body {
            font-size: 1.2rem;
        }

        .row {
            margin-right: -10px;
            margin-left: -10px;
        }

        [class*="col-"] {
            padding-right: 10px;
            padding-left: 10px;
        }

        .card {
            margin-bottom: 15px;
        }

        .card .card-header {
            padding: 15px;
            font-size: 1.05rem;
        }

        .card .card-body {
            padding: 15px;
        }

        .btn {
            padding: 8px 16px;
            font-size: 0.9rem;
            width: 100%;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-danger {
            padding: 5px 10px;
            font-size: 0.75rem;
            width: auto;
        }

        .table {
            font-size: 0.8rem;
        }

        .table th,
        .table td {
            padding: 8px 10px;
        }
    }

    @media (max-width: 576px) {
        .section-header h1 {
            font-size: 1.1rem;
        }

        .card-statistic-1 .card-icon {
            width: 50px;
            height: 50px;
            font-size: 18px;
            margin: 10px;
        }

        .card-statistic-1 .card-body {
            font-size: 1rem;
        }

        .card-statistic-1 .card-wrap {
            padding: 5px 15px;
        }

        .card .card-header {
            padding: 12px;
        }

        .card .card-body {
            padding: 12px;
        }

        .table {
            font-size: 0.75rem;
        }

        .table th,
        .table td {
            padding: 6px 8px;
        }

        .form-control {
            padding: 8px 12px;
            font-size: 0.95rem;
        }

        .btn {
            padding: 8px 12px;
        }

        .badge {
            padding: 4px 8px;
            font-size: 0.75rem;
        }
    }
</style>

<div class="section-header">
    <h1>📊 Forecasting Pembelian Stok (Per 3 Bulan)</h1>
</div>

<!-- Analytics Cards -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary"><i class="fas fa-chart-line"></i></div>
            <div class="card-wrap">
                <div class="card-header"><h4>Total Forecast</h4></div>
                <div class="card-body" id="total-forecast">0</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning"><i class="fas fa-exclamation-triangle"></i></div>
            <div class="card-wrap">
                <div class="card-header"><h4>Perlu Pembelian</h4></div>
                <div class="card-body" id="forecast-beli">0</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info"><i class="fas fa-cubes"></i></div>
            <div class="card-wrap">
                <div class="card-header"><h4>Rata-rata Stok</h4></div>
                <div class="card-body" id="avg-stok">0</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success"><i class="fas fa-shopping-cart"></i></div>
            <div class="card-wrap">
                <div class="card-header"><h4>Total Rekomendasi</h4></div>
                <div class="card-body" id="total-rekomendasi">0</div>
            </div>
        </div>
    </div>
</div>

<!-- Generate Forecast Form -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>🔄 Generate Forecast Baru</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                            <label>Pilih Barang</label>
                            <select id="barang_id" class="form-control" required>
                                <option value="">-- Pilih Barang --</option>
                                @foreach($barangs as $barang)
                                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="form-group">
                            <label>Periode (Bulan)</label>
                            <select id="periode" class="form-control" required>
                                <option value="">-- Pilih Periode --</option>
                                <option value="3">3 Bulan</option>
                                <option value="6">6 Bulan</option>
                                <option value="9">9 Bulan</option>
                                <option value="12">12 Bulan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button id="btn-generate" class="btn btn-primary w-100"><i class="fas fa-calculator"></i> <span class="d-none d-md-inline">Generate</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Forecast Table -->
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>📋 Daftar Forecast</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="forecast_table" class="display w-100">
                        <thead>
                            <tr>
                                <th style="min-width: 40px;">No</th>
                                <th style="min-width: 150px;">Nama Barang</th>
                                <th style="min-width: 180px;">Periode</th>
                                <th style="min-width: 120px;">Rata-rata Penjualan</th>
                                <th style="min-width: 100px;">Prediksi Stok</th>
                                <th style="min-width: 120px;">Rekomendasi Beli</th>
                                <th style="min-width: 120px;">Dibuat Oleh</th>
                                <th style="min-width: 80px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    loadForecasts();
    loadAnalytics();

    // Generate Forecast
    $('#btn-generate').click(function() {
        let barang_id = $('#barang_id').val();
        let periode = $('#periode').val();

        if (!barang_id || !periode) {
            Swal.fire('Error', 'Silakan pilih barang dan periode!', 'error');
            return;
        }

        $.ajax({
            url: '/forecast/generate',
            type: 'POST',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'barang_id': barang_id,
                'periode': periode
            },
            success: function(response) {
                Swal.fire('Success', response.message, 'success');
                loadForecasts();
                loadAnalytics();
                $('#barang_id').val('');
                $('#periode').val('');
            },
            error: function(error) {
                Swal.fire('Error', 'Gagal generate forecast!', 'error');
            }
        });
    });

    // Load Forecasts
    function loadForecasts() {
        $.ajax({
            url: '/forecast/get-data',
            type: 'GET',
            dataType: 'JSON',
            success: function(response) {
                let counter = 1;
                $('#forecast_table').DataTable().clear();
                $.each(response.data, function(key, value) {
                    let row = `
                        <tr>
                            <td>${counter++}</td>
                            <td><strong>${value.nama_barang}</strong></td>
                            <td>${value.periode}</td>
                            <td>${value.rata_rata_penjualan}</td>
                            <td><span class="badge badge-info">${value.prediksi_stok}</span></td>
                            <td><span class="badge badge-warning">${value.rekomendasi_pembelian}</span></td>
                            <td>${value.user}</td>
                            <td>
                                <button class="btn btn-danger btn-delete" data-id="${value.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `;
                    $('#forecast_table').DataTable().row.add($(row)).draw(false);
                });
            }
        });
    }

    // Load Analytics
    function loadAnalytics() {
        $.ajax({
            url: '/forecast/analytics',
            type: 'GET',
            dataType: 'JSON',
            success: function(response) {
                $('#total-forecast').text(response.data.total_forecast);
                $('#forecast-beli').text(response.data.forecast_perlu_beli);
                $('#avg-stok').text(response.data.rata_rata_prediksi_stok);
                $('#total-rekomendasi').text(response.data.total_rekomendasi_pembelian);
            }
        });
    }

    // Delete Forecast
    $(document).on('click', '.btn-delete', function() {
        let id = $(this).data('id');
        let token = $('meta[name="csrf-token"]').attr('content');

        Swal.fire({
            title: 'Hapus Forecast?',
            text: 'Data forecast akan dihapus secara permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/forecast/${id}`,
                    type: 'DELETE',
                    data: {'_token': token},
                    success: function(response) {
                        Swal.fire('Success', response.message, 'success');
                        loadForecasts();
                        loadAnalytics();
                    },
                    error: function(error) {
                        Swal.fire('Error', 'Gagal hapus forecast!', 'error');
                    }
                });
            }
        });
    });

    // Initialize DataTable
    $('#forecast_table').DataTable({
        paging: true,
        responsive: true,
        columnDefs: [
            {
                responsivePriority: 1,
                targets: 0
            },
            {
                responsivePriority: 2,
                targets: -1
            }
        ]
    });
});
</script>
@endsection
