@extends('layouts.master')
@section('title')
    {{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }}
@endsection

@section('content')
    <section class="content">
        <div class="box box-default">
            <form role="form" data-toggle="validator" action="{{ $isEdit == true ? route('distributor.update', ['id' => $distributor->KODE_DISTRIBUTOR]) : route('distributor.store')  }}" method="post">
                {{ csrf_field() }} {{ $isEdit == true ? method_field('PUT') : method_field('POST') }}
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }} Distributor</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('NAMA_DISTRIBUTOR') ? 'has-error' : '' }}">
                            <label class="control-label">Nama Distributor</label>
                            <input type="text" name="NAMA_DISTRIBUTOR" class="form-control" placeholder="Nama Distributor" value="{{ $isEdit == TRUE ? $distributor->NAMA_DISTRIBUTOR : '' }}">
                            @if ($errors->has('NAMA_DISTRIBUTOR'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('NAMA_DISTRIBUTOR') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('ALAMAT') ? 'has-error' : '' }}">
                            <label class="control-label">Alamat</label>
                            <input type="text" name="ALAMAT" class="form-control" placeholder="Alamat" value="{{ $isEdit == TRUE ? $distributor->ALAMAT : '' }}">
                            @if ($errors->has('ALAMAT'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ALAMAT') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('PIC') ? 'has-error' : '' }}">
                            <label class="control-label">PIC</label>
                            <input type="text" name="PIC" class="form-control" placeholder="PIC" value="{{ $isEdit == TRUE ? $distributor->PIC : '' }}">
                            @if ($errors->has('PIC'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('PIC') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('HP') ? 'has-error' : '' }}">
                            <label class="control-label">HP</label>
                            <input type="text" name="HP" class="form-control" placeholder="HP" value="{{ $isEdit == TRUE ? $distributor->HP : '' }}">
                            @if ($errors->has('HP'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('HP') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('EMAIL') ? 'has-error' : '' }}">
                            <label class="control-label">Email</label>
                            <input type="text" name="EMAIL" class="form-control" placeholder="Email" value="{{ $isEdit == TRUE ? $distributor->EMAIL : '' }}">
                            @if ($errors->has('EMAIL'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('EMAIL') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('NO_NPWP') ? 'has-error' : '' }}">
                            <label class="control-label">No NPWP</label>
                            <input type="text" name="NO_NPWP" class="form-control" placeholder="No NPWP" value="{{ $isEdit == TRUE ? $distributor->NO_NPWP : '' }}">
                            @if ($errors->has('NO_NPWP'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('NO_NPWP') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('KETERANGAN') ? 'has-error' : '' }}">
                            <label class="control-label">Keterangan</label>
                            <input type="text" name="KETERANGAN" class="form-control" placeholder="Keterangan" value="{{ $isEdit == TRUE ? $distributor->KETERANGAN : '' }}">
                            @if ($errors->has('KETERANGAN'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('KETERANGAN') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label>
                                <input {{ $isEdit == TRUE ? $distributor->IS_PKP == 1 ? 'checked' : '' : '' }} type="checkbox" class="icheckbox_flat-green" name="IS_PKP" value="0">
                                PKP
                            </label>
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


