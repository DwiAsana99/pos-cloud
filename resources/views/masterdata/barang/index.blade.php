@extends('layouts.master')
@section('title', 'Divisi')

@section('content')
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Data Barang</h3>
                <div class="box-tools">
                    <a href="{!! route('barang.create') !!}" class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
                </div>
            </div>
            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Subkategori</th>
                        <th>Distributor Divisi</th>
                        <th>Barcode</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Margin</th>
                        <th>Harga Pokok</th>
                        <th>Harga Beli Terakhir</th>
                        <th>Harga Jual</th>
                        <th>Qty2</th>
                        <th>Harga Jual2</th>
                        <th>Qty3</th>
                        <th>Harga Jual3</th>
                        <th>Margin2</th>
                        <th>Stok</th>
                        <th>Stok Max</th>
                        <th>Stok Min</th>
                        <th>ABC</th>
                        <th>BKP</th>
                        <th>Harga Tetap</th>
                        <th>Konsinyasi</th>
                        <th>Stok Awal</th>
                        <th>Kode PC</th>
                        <th>Margin3</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </section>
@stop

 @section('js')
        <script>
            $(document).ready(function() {
                $('#table').DataTable({
                    processing: true,
	                serverSide: true,
                    "dom": '<"box-body"<"row"<"col-sm-6"l><"col-sm-6"f>>><"box-body table-responsive no-padding"tr><"box-body"<"row"<"col-sm-5"i><"col-sm-7"p>>>',
                    ajax: '{!! route('dt.barang') !!}',
                    columns: [
                        { data: 'no', name: 'no' },
                        { data: 'subkategori.SUB_KATEGORI', name: 'subkategori.SUB_KATEGORI' },
                        { data: 'distributor_divisi.NAMA_DISTRIBUTOR_DIVISI', name: 'distributor_divisi.NAMA_DISTRIBUTOR_DIVISI'},
                        { data: 'BARCODE', name: 'BARCODE'},
                        { data: 'NAMA_BARANG', name: 'NAMA_BARANG' },
                        { data: 'SATUAN', name: 'SATUAN'},
                        { data: 'MARGIN', name: 'MARGIN' },
                        { data: 'HARGA_POKOK', name: 'HARGA_POKOK'},
                        { data: 'HARGA_BELI_TERAKHIR', name: 'HARGA_BELI_TERAKHIR' },
                        { data: 'HARGA_JUAL', name: 'HARGA_JUAL'},
                        { data: 'QTY2', name: 'QTY2' },
                        { data: 'HARGA_JUAL2', name: 'HARGA_JUAL2'},
                        { data: 'QTY3', name: 'QTY3' },
                        { data: 'HARGA_JUAL3', name: 'HARGA_JUAL3'},
                        { data: 'MARGIN2', name: 'MARGIN2' },
                        { data: 'STOK', name: 'STOK'},
                        { data: 'STOK_MAX', name: 'STOK_MAX' },
                        { data: 'STOK_MIN', name: 'STOK_MIN'},
                        { data: 'ABC', name: 'ABC' },
                        { data: 'IS_BKP', name: 'IS_BKP'},
                        { data: 'IS_HARGA_TETAP', name: 'IS_HARGA_TETAP' },
                        { data: 'IS_KONSINYASI', name: 'IS_KONSINYASI'},
                        { data: 'STOK_AWAL', name: 'STOK_AWAL' },
                        { data: 'KODE_PC', name: 'KODE_PC' },
                        { data: 'MARGIN3', name: 'MARGIN3'},
                        { data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'}
                    ]
                });
            })
        </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('pnotify/pnotify.custom.min.css') }}">
@endsection

@section('jsmaster')
    <script src="{{ asset('pnotify/pnotify.custom.min.js') }}"></script>
    <script>
        PNotify.desktop.permission();
        if ({{ session()->has('notif') ? 1 : 0 }} === 1) {
            notifikasi({!! session('notif') !!});
        }
    </script>    
@endsection


