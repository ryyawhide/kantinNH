@extends('layouts.app')

@section('content')

<div class="section-header">
    <h1>📊 Laporan Stok</h1>
    <div class="ml-auto">
        <a href="javascript:void(0)" class="btn btn-danger" id="print-stok"><i class="fa fa-sharp fa-light fa-print"></i> <span class="d-none d-md-inline">Print PDF</span></a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="opsi-laporan-stok">Filter Stok Berdasarkan :</label>
                    <select class="form-control" name="opsi-laporan-stok" id="opsi-laporan-stok">
                        <option value="semua" selected>Semua</option>
                        <option value="minimum">Batas Minimum</option>
                        <option value="stok-habis">Stok Habis</option>
                    </select>
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
                                <th style="min-width: 100px;">Kode</th>
                                <th style="min-width: 150px;">Nama Barang</th>
                                <th style="min-width: 80px;">Stok</th>
                            </tr>
                        </thead>
                        <tbody id="tabel-laporan-stok">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Dropdown -->
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

        loadData('semua');

        $('#opsi-laporan-stok').on('change', function(){
            var selectedOption = $(this).val();
            loadData(selectedOption);
        });

        function loadData(selectedOption) {
            $.ajax({
                url: '/laporan-stok/get-data',
                type: 'GET',
                data: { opsi: selectedOption },
                success: function(response){
                    table.clear().draw();

                    let counter = 1;
                    $.each(response, function(index, item) {
                        var row = [
                            counter++,
                            item.kode_barang,
                            item.nama_barang,
                            `<span class="badge badge-info">${item.stok}</span>`
                        ];
                        table.row.add(row); // Menambahkan baris data ke DataTables
                    });
                    table.draw();
                }
            });

        }

        $('#print-stok').on('click', function(){
            var selectedOption = $('#opsi-laporan-stok').val();
            window.location.href = '/laporan-stok/print-stok?opsi=' + selectedOption;
        });
    });
</script>

@endsection