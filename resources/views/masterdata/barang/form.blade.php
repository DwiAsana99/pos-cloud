@extends('layouts.master')
@section('title')
    {{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }}
@endsection

@section('content')
    <section class="content">
        <div class="box box-default">
            <form role="form" data-toggle="validator" action="{{ $isEdit == true ? route('barang.update', ['id' => $divisi->KODE_DIVISI]) : route('barang.store')  }}" method="post">
                {{ csrf_field() }} {{ $isEdit == true ? method_field('PUT') : method_field('POST') }}
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }} Barang</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div {{ $isEdit == TRUE ? 'hidden' : '' }} class="form-group col-md-12 has-feedback {{ $errors->has('KODE_SUB_KATEGORI') ? 'has-error' : '' }}">
                            <label for="KODE_SUB_KATEGORI" class="control-label">Sub Kategori</label>
                            <select name="KODE_SUB_KATEGORI" style="width:100%;" class="form-control"></select>
                            @if ($errors->has('KODE_SUB_KATEGORI'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('KODE_SUB_KATEGORI') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div {{ $isEdit == TRUE ? 'hidden' : '' }} class="form-group col-md-12 has-feedback {{ $errors->has('KODE_DISTRIBUTOR_DIVISI') ? 'has-error' : '' }}">
                            <label for="KODE_DISTRIBUTOR_DIVISI" class="control-label">Distributor Divisi</label>
                            <select name="KODE_DISTRIBUTOR_DIVISI" style="width:100%;" class="form-control"></select>
                            @if ($errors->has('KODE_DISTRIBUTOR_DIVISI'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('KODE_DISTRIBUTOR_DIVISI') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('NAMA_BARANG') ? 'has-error' : '' }}">
                            <label class="control-label">Nama Barang</label>
                            <input type="text" name="NAMA_BARANG" class="form-control" placeholder="Nama Barang" value="{{ $isEdit == TRUE ? $divisi->DIVISI : '' }}">
                            @if ($errors->has('NAMA_BARANG'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('NAMA_BARANG') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3 has-feedback {{ $errors->has('SATUAN') ? 'has-error' : '' }}">
                            <label class="control-label">Satuan</label>
                            <input type="text" name="SATUAN" class="form-control" placeholder="Satuan" value="{{ $isEdit == TRUE ? $divisi->DIVISI : '' }}">
                            @if ($errors->has('SATUAN'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('SATUAN') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3 has-feedback {{ $errors->has('MARGIN') ? 'has-error' : '' }}">
                            <label class="control-label">Margin</label>
                            <input type="text" name="MARGIN" class="form-control" placeholder="Margin" value="{{ $isEdit == TRUE ? $divisi->DIVISI : '' }}">
                            @if ($errors->has('MARGIN'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('MARGIN') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3 has-feedback {{ $errors->has('HARGA_POKOK') ? 'has-error' : '' }}">
                            <label class="control-label">Harga Pokok</label>
                            <input type="text" name="HARGA_POKOK" class="form-control" placeholder="Harga Pokok" value="{{ $isEdit == TRUE ? $divisi->DIVISI : '' }}">
                            @if ($errors->has('HARGA_POKOK'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('HARGA_POKOK') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3 has-feedback {{ $errors->has('HARGA_JUAL') ? 'has-error' : '' }}">
                            <label class="control-label">Harga Jual</label>
                            <input type="text" name="HARGA_JUAL" class="form-control" placeholder="Harga Jual" value="{{ $isEdit == TRUE ? $divisi->DIVISI : '' }}">
                            @if ($errors->has('HARGA_JUAL'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('HARGA_JUAL') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3 has-feedback {{ $errors->has('QTY') ? 'has-error' : '' }}">
                            <label class="control-label">Qty</label>
                            <input type="text" name="QTY" class="form-control" placeholder="qty" value="{{ $isEdit == TRUE ? $divisi->DIVISI : '' }}">
                            @if ($errors->has('QTY'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('QTY') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3 has-feedback {{ $errors->has('STOK') ? 'has-error' : '' }}">
                            <label class="control-label">Stok</label>
                            <input type="text" name="STOK" class="form-control" placeholder="qty" value="{{ $isEdit == TRUE ? $divisi->DIVISI : '' }}">
                            @if ($errors->has('STOK'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('STOK') }}</strong>
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

@section('js')
<script>
    $(document).ready(function() {
        $("select[name=KODE_SUB_KATEGORI]").select2({
            placeholder: "Pilih Subkategori...",
            // allowClear: false,
            ajax: {
                url: '{{ route("select2.subkategori.barang") }}',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        $("select[name=KODE_DISTRIBUTOR_DIVISI]").select2({
            placeholder: "Pilih Distributor Divisi...",
            // allowClear: false,
            ajax: {
                url: '{{ route("select2.distributor_divisi.barang") }}',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        $("select[name=KODE_DIVISI]").select2("trigger", "select", {
            data: { id: "{{ $isEdit == TRUE ? $departemen->KODE_DIVISI : null }}", text: "{{ $isEdit == TRUE ? 'selected' : '' }}" }
        });
    });
</script>
@endsection


