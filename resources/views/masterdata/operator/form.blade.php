@extends('layouts.master')
@section('title')
    {{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }}
@endsection

@section('content')
    <section class="content">
        <div class="box box-default">
            <form role="form" data-toggle="validator" action="{{ $isEdit == true ? route('operator.update', ['id' => $operator->ID_OPERATOR]) : route('operator.store')  }}" method="post">
                {{ csrf_field() }} {{ $isEdit == true ? method_field('PUT') : method_field('POST') }}
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }} Operator</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('OPERATOR') ? 'has-error' : '' }}">
                            <label class="control-label">Divisi</label>
                            <input type="text" name="OPERATOR" class="form-control" placeholder="Operator" value="{{ $isEdit == TRUE ? $operator->OPERATOR : '' }}">
                            @if ($errors->has('OPERATOR'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('OPERATOR') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('STATUS_OPERATOR') ? 'has-error' : '' }}">
                            <label class="control-label">Status Operator</label>
                            <select name="STATUS_OPERATOR" style="width: 100%" class="form-control select2">
                                {{-- <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option> --}}
                            </select>
                            @if ($errors->has('STATUS_OPERATOR'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('STATUS_OPERATOR') }}</strong>
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
        $("select[name=STATUS_OPERATOR]").select2({
            placeholder: "Pilih status...",
            allowClear: false,
            ajax: {
                url: '{{ route("select2.operator.status") }}',
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

        $("select[name=STATUS_OPERATOR]").select2("trigger", "select", {
            data: { id: "{{ $isEdit == TRUE ? $operator->STATUS_OPERATOR : null }}", text: "{{ $isEdit == TRUE ? 'selected' : '' }}" }
        });
    });
</script>
@endsection

