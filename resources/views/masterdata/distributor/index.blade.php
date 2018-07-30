@extends('layouts.master')
@section('title', 'Distributor')

@section('content')
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Data Distributor</h3>
                <div class="box-tools">
                    <a href="{!! route('distributor.create') !!}" class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
                </div>
            </div>
            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">Kode Distributor</th>
                        <th style="text-align: center;">Nama Distributor</th>
                        <th style="text-align: center;">Alamat</th>
                        <th style="text-align: center;">PIC</th>
                        <th style="text-align: center;">HP</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">No NPWP</th>
                        <th style="text-align: center;">Keterangan</th>
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
                    ajax: '{!! route('dt.distributor') !!}',
                    columns: [
                        { data: 'KODE_DISTRIBUTOR', name: 'KODE_DISTRIBUTOR' },
                        { data: 'NAMA_DISTRIBUTOR', name: 'NAMA_DISTRIBUTOR'},
                        { data: 'ALAMAT', name: 'ALAMAT'},
                        { data: 'PIC', name: 'PIC'},
                        { data: 'HP', name: 'HP'},
                        { data: 'EMAIL', name: 'EMAIL'},
                        { data: 'NO_NPWP', name: 'NO_NPWP'},
                        { data: 'KETERANGAN', name: 'KETERANGAN'},
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


