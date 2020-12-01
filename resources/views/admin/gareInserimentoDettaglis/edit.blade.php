@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.gareInserimentoDettagli.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.gare-inserimento-dettaglis.update", [$gareInserimentoDettagli->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="gara_inserimento_id">{{ trans('cruds.gareInserimentoDettagli.fields.gara_inserimento') }}</label>
                <select class="form-control select2 {{ $errors->has('gara_inserimento') ? 'is-invalid' : '' }}" name="gara_inserimento_id" id="gara_inserimento_id" required>
                    @foreach($gara_inserimentos as $id => $gara_inserimento)
                        <option value="{{ $id }}" {{ (old('gara_inserimento_id') ? old('gara_inserimento_id') : $gareInserimentoDettagli->gara_inserimento->id ?? '') == $id ? 'selected' : '' }}>{{ $gara_inserimento }}</option>
                    @endforeach
                </select>
                @if($errors->has('gara_inserimento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gara_inserimento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimentoDettagli.fields.gara_inserimento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="valore_n_1">{{ trans('cruds.gareInserimentoDettagli.fields.valore_n_1') }}</label>
                <input class="form-control {{ $errors->has('valore_n_1') ? 'is-invalid' : '' }}" type="number" name="valore_n_1" id="valore_n_1" value="{{ old('valore_n_1', $gareInserimentoDettagli->valore_n_1) }}" step="1">
                @if($errors->has('valore_n_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('valore_n_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimentoDettagli.fields.valore_n_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="valore_n_2">{{ trans('cruds.gareInserimentoDettagli.fields.valore_n_2') }}</label>
                <input class="form-control {{ $errors->has('valore_n_2') ? 'is-invalid' : '' }}" type="number" name="valore_n_2" id="valore_n_2" value="{{ old('valore_n_2', $gareInserimentoDettagli->valore_n_2) }}" step="1">
                @if($errors->has('valore_n_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('valore_n_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimentoDettagli.fields.valore_n_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descrizione_valore">{{ trans('cruds.gareInserimentoDettagli.fields.descrizione_valore') }}</label>
                <input class="form-control {{ $errors->has('descrizione_valore') ? 'is-invalid' : '' }}" type="text" name="descrizione_valore" id="descrizione_valore" value="{{ old('descrizione_valore', $gareInserimentoDettagli->descrizione_valore) }}">
                @if($errors->has('descrizione_valore'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descrizione_valore') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimentoDettagli.fields.descrizione_valore_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection