@extends('layouts.master')
@section('title')
    {{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }}
@endsection

@section('content')
    <section class="content">
        <div class="box box-default">
            <form role="form" data-toggle="validator" action="{{ $isEdit == true ? route('distributordivisi.update', ['id' => $distributorDivisi->KODE_DISTRIBUTOR_DIVISI]) : route('distributordivisi.store')  }}" method="post">
                {{ csrf_field() }} {{ $isEdit == true ? method_field('PUT') : method_field('POST') }}
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $isEdit == TRUE ? 'Ubah' : 'Tambah' }} Distributor Divisi</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div {{ $isEdit == TRUE ? 'hidden' : '' }} class="form-group col-md-12 has-feedback {{ $errors->has('KODE_DISTRIBUTOR') ? 'has-error' : '' }}">
                            <label for="KODE_DISTRIBUTOR" class="control-label">Distributor</label>
                            <select name="KODE_DISTRIBUTOR" style="width:100%;" class="form-control"></select>
                            @if ($errors->has('KODE_DISTRIBUTOR'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('KODE_DISTRIBUTOR') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('NAMA_DISTRIBUTOR_DIVISI') ? 'has-error' : '' }}">
                            <label class="control-label">Nama Distributor Divisi</label>
                            <input type="text" name="NAMA_DISTRIBUTOR_DIVISI" class="form-control" placeholder="Nama Distributor Divisi" value="{{ $isEdit == TRUE ? $distributorDivisi->NAMA_DISTRIBUTOR_DIVISI : '' }}">
                            @if ($errors->has('NAMA_DISTRIBUTOR_DIVISI'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('NAMA_DISTRIBUTOR_DIVISI') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('NAMA_SALES') ? 'has-error' : '' }}">
                            <label class="control-label">Nama Sales</label>
                            <input type="text" name="NAMA_SALES" class="form-control" placeholder="Nama Sales" value="{{ $isEdit == TRUE ? $distributorDivisi->NAMA_SALES : '' }}">
                            @if ($errors->has('NAMA_SALES'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('NAMA_SALES') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 has-feedback {{ $errors->has('NOHP_SALES') ? 'has-error' : '' }}">
                            <label class="control-label">No HP Sales</label>
                            <input type="text" name="NOHP_SALES" class="form-control" placeholder="No HP Sales" value="{{ $isEdit == TRUE ? $distributorDivisi->NOHP_SALES : '' }}">
                            @if ($errors->has('NOHP_SALES'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('NOHP_SALES') }}</strong>
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
        $("select[name=KODE_DISTRIBUTOR]").select2({
            placeholder: "Pilih distributor...",
            // allowClear: false,
            ajax: {
                url: '{{ route("select2.distributor.distributorDivisi") }}',
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

        $("select[name=KODE_DISTRIBUTOR]").select2("trigger", "select", {
            data: { id: "{{ $isEdit == TRUE ? $distributorDivisi->KODE_DISTRIBUTOR : null }}", text: "{{ $isEdit == TRUE ? 'selected' : '' }}" }
        });
    });
</script>
@endsection
