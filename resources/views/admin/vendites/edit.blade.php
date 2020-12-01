@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.vendite.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.vendites.update", [$vendite->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="data_inserimento">{{ trans('cruds.vendite.fields.data_inserimento') }}</label>
                <input class="form-control date {{ $errors->has('data_inserimento') ? 'is-invalid' : '' }}" type="text" name="data_inserimento" id="data_inserimento" value="{{ old('data_inserimento', $vendite->data_inserimento) }}" required>
                @if($errors->has('data_inserimento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_inserimento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendite.fields.data_inserimento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ora_inserimento">{{ trans('cruds.vendite.fields.ora_inserimento') }}</label>
                <input class="form-control timepicker {{ $errors->has('ora_inserimento') ? 'is-invalid' : '' }}" type="text" name="ora_inserimento" id="ora_inserimento" value="{{ old('ora_inserimento', $vendite->ora_inserimento) }}" required>
                @if($errors->has('ora_inserimento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ora_inserimento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendite.fields.ora_inserimento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="operatore">{{ trans('cruds.vendite.fields.operatore') }}</label>
                <input class="form-control {{ $errors->has('operatore') ? 'is-invalid' : '' }}" type="text" name="operatore" id="operatore" value="{{ old('operatore', $vendite->operatore) }}">
                @if($errors->has('operatore'))
                    <div class="invalid-feedback">
                        {{ $errors->first('operatore') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendite.fields.operatore_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="servizio_id">{{ trans('cruds.vendite.fields.servizio') }}</label>
                <select class="form-control select2 {{ $errors->has('servizio') ? 'is-invalid' : '' }}" name="servizio_id" id="servizio_id">
                    @foreach($servizios as $id => $servizio)
                        <option value="{{ $id }}" {{ (old('servizio_id') ? old('servizio_id') : $vendite->servizio->id ?? '') == $id ? 'selected' : '' }}>{{ $servizio }}</option>
                    @endforeach
                </select>
                @if($errors->has('servizio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('servizio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendite.fields.servizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantita">{{ trans('cruds.vendite.fields.quantita') }}</label>
                <input class="form-control {{ $errors->has('quantita') ? 'is-invalid' : '' }}" type="number" name="quantita" id="quantita" value="{{ old('quantita', $vendite->quantita) }}" step="1" required>
                @if($errors->has('quantita'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantita') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendite.fields.quantita_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_agente_id">{{ trans('cruds.vendite.fields.id_agente') }}</label>
                <select class="form-control select2 {{ $errors->has('id_agente') ? 'is-invalid' : '' }}" name="id_agente_id" id="id_agente_id">
                    @foreach($id_agentes as $id => $id_agente)
                        <option value="{{ $id }}" {{ (old('id_agente_id') ? old('id_agente_id') : $vendite->id_agente->id ?? '') == $id ? 'selected' : '' }}>{{ $id_agente }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_agente'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_agente') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendite.fields.id_agente_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_point_id">{{ trans('cruds.vendite.fields.id_point') }}</label>
                <select class="form-control select2 {{ $errors->has('id_point') ? 'is-invalid' : '' }}" name="id_point_id" id="id_point_id">
                    @foreach($id_points as $id => $id_point)
                        <option value="{{ $id }}" {{ (old('id_point_id') ? old('id_point_id') : $vendite->id_point->id ?? '') == $id ? 'selected' : '' }}>{{ $id_point }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_point'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_point') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendite.fields.id_point_helper') }}</span>
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