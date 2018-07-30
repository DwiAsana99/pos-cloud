@extends('layouts.master')
@section('title')
    {{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }}
@endsection

@section('content')
    <section class="content">
        <div class="box box-default">
            <form role="form" data-toggle="validator" action="{{ $isEdit == true ? route('pelanggan.update', ['id' => $pelanggan->KODE_PELANGGAN]) : route('pelanggan.store')  }}" method="post">
                {{ csrf_field() }} {{ $isEdit == true ? method_field('PUT') : method_field('POST') }}
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }} Pelanggan</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('NAMA_PELANGGAN') ? 'has-error' : '' }}">
                            <label class="control-label">Nama Pelanggan</label>
                            <input type="text" name="NAMA_PELANGGAN" class="form-control" placeholder="Nama Pelanggan" value="{{ $isEdit == TRUE ? $pelanggan->NAMA_PELANGGAN : '' }}">
                            @if ($errors->has('NAMA_PELANGGAN'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('NAMA_PELANGGAN') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('ALAMAT') ? 'has-error' : '' }}">
                            <label class="control-label">Alamat</label>
                            <input type="text" name="ALAMAT" class="form-control" placeholder="Alamat" value="{{ $isEdit == TRUE ? $pelanggan->ALAMAT : '' }}">
                            @if ($errors->has('ALAMAT'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ALAMAT') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('NO_HP') ? 'has-error' : '' }}">
                            <label class="control-label">No HP</label>
                            <input type="text" name="NO_HP" class="form-control" placeholder="No HP" value="{{ $isEdit == TRUE ? $pelanggan->NO_HP : '' }}">
                            @if ($errors->has('NO_HP'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('NO_HP') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('EMAIL') ? 'has-error' : '' }}">
                            <label class="control-label">Email</label>
                            <input type="text" name="EMAIL" class="form-control" placeholder="Email" value="{{ $isEdit == TRUE ? $pelanggan->EMAIL : '' }}">
                            @if ($errors->has('EMAIL'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('EMAIL') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('NPWP') ? 'has-error' : '' }}">
                            <label class="control-label">NPWP</label>
                            <input type="text" name="NPWP" class="form-control" placeholder="NPWP" value="{{ $isEdit == TRUE ? $pelanggan->NPWP : '' }}">
                            @if ($errors->has('NPWP'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('NPWP') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </form>
        </div>
    </section>
@stop



