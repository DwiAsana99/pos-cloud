@extends('layouts.master')
@section('title')
    {{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }}
@endsection

@section('content')
    <section class="content">
        <div class="box box-default">
            <form role="form" data-toggle="validator" action="{{ $isEdit == true ? route('subkategori.update', ['id' => $subkategori->KODE_SUB_KATEGORI]) : route('subkategori.store')  }}" method="post">
                {{ csrf_field() }} {{ $isEdit == true ? method_field('PUT') : method_field('POST') }}
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }} Subkategori</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div {{ $isEdit == TRUE ? 'hidden' : '' }} class="form-group col-md-12 has-feedback {{ $errors->has('KODE_KATEGORI') ? 'has-error' : '' }}">
                            <label for="KODE_KATEGORI" class="control-label">Kategori</label>
                            <select name="KODE_KATEGORI" style="width:100%;" class="form-control"></select>
                            @if ($errors->has('KODE_KATEGORI'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('KODE_KATEGORI') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('SUB_KATEGORI') ? 'has-error' : '' }}">
                            <label class="control-label">Subkategori</label>
                            <input type="text" name="SUB_KATEGORI" class="form-control" placeholder="Subkategori" value="{{ $isEdit == TRUE ? $subkategori->SUB_KATEGORI : '' }}">
                            @if ($errors->has('SUB_KATEGORI'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('SUB_KATEGORI') }}</strong>
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
        $("select[name=KODE_KATEGORI]").select2({
            placeholder: "Pilih kategori...",
            // allowClear: false,
            ajax: {
                url: '{{ route("select2.kategori.subkategori") }}',
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

        $("select[name=KODE_KATEGORI]").select2("trigger", "select", {
            data: { id: "{{ $isEdit == TRUE ? $subkategori->KODE_KATEGORI : null }}", text: "{{ $isEdit == TRUE ? 'selected' : '' }}" }
        });
    });
</script>
@endsection


