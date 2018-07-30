@extends('layouts.master')
@section('title')
    {{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }}
@endsection

@section('content')
    <section class="content">
        <div class="box box-default">
            <form role="form" data-toggle="validator" action="{{ $isEdit == true ? route('divisi.update', ['id' => $divisi->KODE_DIVISI]) : route('divisi.store')  }}" method="post">
                {{ csrf_field() }} {{ $isEdit == true ? method_field('PUT') : method_field('POST') }}
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }} Divisi</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('DIVISI') ? 'has-error' : '' }}">
                            <label class="control-label">Divisi</label>
                            <input type="text" name="DIVISI" class="form-control" placeholder="Divisi" value="{{ $isEdit == TRUE ? $divisi->DIVISI : '' }}">
                            @if ($errors->has('DIVISI'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('DIVISI') }}</strong>
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



