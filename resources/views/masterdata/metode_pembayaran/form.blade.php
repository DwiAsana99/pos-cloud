@extends('layouts.master')
@section('title')
    {{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }}
@endsection

@section('content')
    <section class="content">
        <div class="box box-default">
            <form role="form" data-toggle="validator" action="{{ $isEdit == true ? route('metodepembayaran.update', ['id' => $metode->ID_METODE]) : route('metodepembayaran.store')  }}" method="post">
                {{ csrf_field() }} {{ $isEdit == true ? method_field('PUT') : method_field('POST') }}
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }} Metode Pembayaran</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('METODE') ? 'has-error' : '' }}">
                            <label class="control-label">Metode Pembayaran</label>
                            <input type="text" name="METODE" class="form-control" placeholder="Metode Pembayaran" value="{{ $isEdit == TRUE ? $metode->METODE : '' }}">
                            @if ($errors->has('METODE'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('METODE') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('IS_DEBET') ? 'has-error' : '' }}">
                            <label class="control-label">Debet</label>
                            <select name="IS_DEBET" style="width: 100%" class="form-control select2">
                                {{-- <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option> --}}
                            </select>
                            @if ($errors->has('IS_DEBET'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('IS_DEBET') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('CHARGE') ? 'has-error' : '' }}">
                            <label class="control-label">Charge</label>
                            <input type="text" name="CHARGE" class="form-control" placeholder="Charge" value="{{ $isEdit == TRUE ? $metode->CHARGE : '' }}">
                            @if ($errors->has('CHARGE'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('CHARGE') }}</strong>
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
        $("select[name=IS_DEBET]").select2({
            placeholder: "Pilih debet...",
            // allowClear: false,
            ajax: {
                url: '{{ route("select2.metode") }}',
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

        $("select[name=IS_DEBET]").select2("trigger", "select", {
            data: { id: "{{ $isEdit == TRUE ? $metode->IS_DEBET : null }}", text: "{{ $isEdit == TRUE ? $metode->IS_DEBET : null }}" }
        });
    });
</script>
@endsection


