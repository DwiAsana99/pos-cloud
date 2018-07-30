@extends('layouts.master')
@section('title')
    {{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }}
@endsection

@section('content')
    <section class="content">
        <div class="box box-default">
            <form role="form" data-toggle="validator" action="{{ $isEdit == true ? route('kategori.update', ['id' => $kategori->KODE_KATEGORI]) : route('kategori.store')  }}" method="post">
                {{ csrf_field() }} {{ $isEdit == true ? method_field('PUT') : method_field('POST') }}
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }} Kategori</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div {{ $isEdit == TRUE ? 'hidden' : '' }} class="form-group col-md-12 has-feedback {{ $errors->has('KODE_DEPARTEMEN') ? 'has-error' : '' }}">
                            <label for="KODE_DEPARTEMEN" class="control-label">Departemen</label>
                            <select name="KODE_DEPARTEMEN" style="width:100%;" class="form-control"></select>
                            @if ($errors->has('KODE_DEPARTEMEN'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('KODE_DEPARTEMEN') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('KATEGORI') ? 'has-error' : '' }}">
                            <label class="control-label">Kategori</label>
                            <input type="text" name="KATEGORI" class="form-control" placeholder="Kategori" value="{{ $isEdit == TRUE ? $kategori->KATEGORI : '' }}">
                            @if ($errors->has('KATEGORI'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('KATEGORI') }}</strong>
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
        $("select[name=KODE_DEPARTEMEN]").select2({
            placeholder: "Pilih departemen...",
            // allowClear: false,
            ajax: {
                url: '{{ route("select2.departemen.kategori") }}',
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

        $("select[name=KODE_DEPARTEMEN]").select2("trigger", "select", {
            data: { id: "{{ $isEdit == TRUE ? $kategori->KODE_DEPARTEMEN : null }}", text: "{{ $isEdit == TRUE ? 'selected' : '' }}" }
        });
    });
</script>
@endsection


