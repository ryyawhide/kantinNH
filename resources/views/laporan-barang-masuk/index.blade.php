@extends('layouts.app')

@section('content')

<div class="section-header">
    <h1>📥 Laporan Barang Masuk</h1>
    <div class="ml-auto">
        <a href="javascript:void(0)" class="btn btn-danger" id="print-barang-masuk"><i class="fa fa-sharp fa-light fa-print"></i> <span class="d-none d-md-inline">Print PDF</span></a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <form id="filter_form" action="/laporan-barang-masuk/get-data" method="GET">
                        <div class="row">
                            <div class="col-md-5 col-sm-12">
                                <label>Pilih Tanggal Mulai :</label>
                                <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai">
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <label>Pilih Tanggal Selesai :</label>
                                <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai">
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <label>&nbsp;</label>
                                <div style="display: flex; gap: 5px; flex-wrap: wrap;">
                                    <button type="submit" class="btn btn-primary btn-sm flex-1">Filter</button>
                                    <button type="button" class="btn btn-danger btn-sm flex-1" id="refresh_btn">Refresh</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table_id" class="display w-100">
                        <thead>
                            <tr>
                                <th style="min-width: 40px;">No</th>
                                <th style="min-width: 130px;">Kode Transaksi</th>
                                <th style="min-width: 110px;">Tgl Masuk</th>
                                <th style="min-width: 150px;">Nama Barang</th>
                                <th style="min-width: 90px;">Jumlah</th>
                                <th style="min-width: 120px;">Supplier</th>
                            </tr>
                        </thead>
                        <tbody id="tabel-laporan-barang-masuk">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    var table = $('#table_id').DataTable({ 
        paging: true,
        responsive: true,
        columnDefs: [
            {
                responsivePriority: 1,
                targets: 0
            }
        ]
    });

    loadData(); // Panggil fungsi loadData saat halaman dimuat

    $('#filter_form').submit(function(event) {
        event.preventDefault();
        loadData(); // Panggil fungsi loadData saat tombol filter ditekan
    });

    $('#refresh_btn').on('click', function() {
        refreshTable();
    });

    // Fungsi load data berdasarkan range tanggal_mulai dan tanggal_selesai
    function loadData() {
        var tanggalMulai = $('#tanggal_mulai').val();
        var tanggalSelesai = $('#tanggal_selesai').val();

        $.ajax({
            url: '/laporan-barang-masuk/get-data',
            type: 'GET',
            dataType: 'json',
            data: {
                tanggal_mulai: tanggalMulai,
                tanggal_selesai: tanggalSelesai
            },
            success: function(response) {
                table.clear().draw();

                if (response.length > 0) {
                    $.each(response, function(index, item) {
                        getSupplierName(item.supplier_id, function(supplier) {
                            var row = [
                                (index + 1),
                                item.kode_transaksi,
                                item.tanggal_masuk,
                                item.nama_barang,
                                `<span class="badge badge-success">${item.jumlah_masuk}</span>`,
                                supplier
                            ];
                            table.row.add(row).draw(false); // Tambahkan data yang baru ke DataTable
                        });
                    });
                } else {
                    var emptyRow = ['','Tidak ada data yang tersedia.', '', '', '', '', ''];
                    table.row.add(emptyRow).draw(false); // Tambahkan baris kosong ke DataTable
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });

        function getSupplierName(supplierId, callback) {
            $.getJSON('{{ url('api/supplier') }}', function(suppliers) {
                var supplier = suppliers.find(function(s) {
                    return s.id === supplierId;
                });
                callback(supplier ? supplier.supplier : '');
            });
        }
    }

    // Fungsi Refresh Tabel
    function refreshTable() {
        $('#filter_form')[0].reset();
        loadData();
    }

    // Print barang masuk
    $('#print-barang-masuk').on('click', function() {
        var tanggalMulai = $('#tanggal_mulai').val();
        var tanggalSelesai = $('#tanggal_selesai').val();

        var url = '/laporan-barang-masuk/print-barang-masuk';

        if (tanggalMulai && tanggalSelesai) {
            url += '?tanggal_mulai=' + tanggalMulai + '&tanggal_selesai=' + tanggalSelesai;
        }

        window.location.href = url;
    });
});

</script>
@endsection