@extends('layouts.master')
@section('title', 'Pelanggan')

@section('content')
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Data Metode Pembayaran</h3>
                <div class="box-tools">
                    <a href="{!! route('pelanggan.create') !!}" class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
                </div>
            </div>
            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">Kode Pelanggan</th>
                        <th style="text-align: center;">Nama pelanggan</th>
                        <th style="text-align: center;">Alamat</th>
                        <th style="text-align: center;">No HP</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">NPWP</th>
                        <th style="width: 10%"></th>
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
                    "dom": '<"box-body"<"row"<"col-sm-6"l><"col-sm-6"f>>><"box-body table-responsive"tr><"box-body"<"row"<"col-sm-5"i><"col-sm-7"p>>>',
                    ajax: '{!! route('dt.pelanggan') !!}',
                    columns: [
                        { data: 'KODE_PELANGGAN', name: 'KODE_PELANGGAN' },
                        { data: 'NAMA_PELANGGAN', name: 'NAMA_PELANGGAN'},
                        { data: 'ALAMAT', name: 'ALAMAT'},
                        { data: 'NO_HP', name: 'NO_HP' },
                        { data: 'EMAIL', name: 'EMAIL'},
                        { data: 'NPWP', name: 'NPWP'},
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


