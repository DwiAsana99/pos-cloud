@extends('layouts.master')
@section('title')
    {{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }}
@endsection

@section('content')
    <section class="content">
        <div class="box box-default">
            <form role="form" data-toggle="validator" action="{{ $isEdit == true ? route('departemen.update', ['id' => $departemen->KODE_DEPARTEMEN]) : route('departemen.store')  }}" method="post">
                {{ csrf_field() }} {{ $isEdit == true ? method_field('PUT') : method_field('POST') }}
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }} Departemen</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div {{ $isEdit == TRUE ? 'hidden' : '' }} class="form-group col-md-12 has-feedback {{ $errors->has('KODE_DIVISI') ? 'has-error' : '' }}">
                            <label for="KODE_DIVISI" class="control-label">Divisi</label>
                            <select name="KODE_DIVISI" style="width:100%;" class="form-control"></select>
                            @if ($errors->has('KODE_DIVISI'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('KODE_DIVISI') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('DEPARTEMEN') ? 'has-error' : '' }}">
                            <label class="control-label">Departemen</label>
                            <input type="text" name="DEPARTEMEN" class="form-control" placeholder="Departemen" value="{{ $isEdit == TRUE ? $departemen->DEPARTEMEN : '' }}">
                            @if ($errors->has('DEPARTEMEN'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('DEPARTEMEN') }}</strong>
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
        $("select[name=KODE_DIVISI]").select2({
            placeholder: "Pilih Divisi...",
            // allowClear: false,
            ajax: {
                url: '{{ route("select2.divisi.departemen") }}',
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


