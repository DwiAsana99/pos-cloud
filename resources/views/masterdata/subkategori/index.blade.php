@extends('layouts.master')
@section('title', 'Subkategori')

@section('content')
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Data Subkategori</h3>
                <div class="box-tools">
                    <a href="{!! route('subkategori.create') !!}" class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
                </div>
            </div>
            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="table">
                <thead>
                    <tr>
                        <th style="width: 20%; text-align: center;">Kode Subkategori</th>
                        <th style="text-align: center;">Kategori</th>
                        <th style="text-align: center;">Subkategori</th>
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
                    ajax: '{!! route('dt.subkategori') !!}',
                    columns: [
                        { data: 'KODE_SUB_KATEGORI', name: 'KODE_SUB_KATEGORI' },
                        { data: 'kategori.KATEGORI', name: 'kategori.KATEGORI'},
                        { data: 'SUB_KATEGORI', name: 'SUB_KATEGORI'},
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


