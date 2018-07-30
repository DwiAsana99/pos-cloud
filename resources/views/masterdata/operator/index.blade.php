@extends('layouts.master')
@section('title', 'Operator')

@section('content')
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Data Operator</h3>
                <div class="box-tools">
                    <a href="{!! route('operator.create') !!}" class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
                </div>
            </div>
            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">Operator</th>
                        <th style="width: 20%; text-align: center;">Status Operator</th>
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
                    ajax: '{!! route('dt.operator') !!}',
                    columns: [
                        { data: 'OPERATOR', name: 'OPERATOR' },
                        { data: 'STATUS_OPERATOR', name: 'STATUS_OPERATOR'},
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


