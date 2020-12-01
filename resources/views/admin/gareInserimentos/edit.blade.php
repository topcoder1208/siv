@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.gareInserimento.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.gare-inserimentos.update", [$gareInserimento->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="titolo">{{ trans('cruds.gareInserimento.fields.titolo') }}</label>
                <input class="form-control {{ $errors->has('titolo') ? 'is-invalid' : '' }}" type="text" name="titolo" id="titolo" value="{{ old('titolo', $gareInserimento->titolo) }}" required>
                @if($errors->has('titolo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('titolo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.titolo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tipologia_gara">{{ trans('cruds.gareInserimento.fields.tipologia_gara') }}</label>
                <input class="form-control {{ $errors->has('tipologia_gara') ? 'is-invalid' : '' }}" type="text" name="tipologia_gara" id="tipologia_gara" value="{{ old('tipologia_gara', $gareInserimento->tipologia_gara) }}" required>
                @if($errors->has('tipologia_gara'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipologia_gara') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.tipologia_gara_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="validita_inizio">{{ trans('cruds.gareInserimento.fields.validita_inizio') }}</label>
                <input class="form-control date {{ $errors->has('validita_inizio') ? 'is-invalid' : '' }}" type="text" name="validita_inizio" id="validita_inizio" value="{{ old('validita_inizio', $gareInserimento->validita_inizio) }}" required>
                @if($errors->has('validita_inizio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('validita_inizio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.validita_inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="validita_fine">{{ trans('cruds.gareInserimento.fields.validita_fine') }}</label>
                <input class="form-control date {{ $errors->has('validita_fine') ? 'is-invalid' : '' }}" type="text" name="validita_fine" id="validita_fine" value="{{ old('validita_fine', $gareInserimento->validita_fine) }}">
                @if($errors->has('validita_fine'))
                    <div class="invalid-feedback">
                        {{ $errors->first('validita_fine') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.validita_fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="brand_tipologias">{{ trans('cruds.gareInserimento.fields.brand_tipologia') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('brand_tipologias') ? 'is-invalid' : '' }}" name="brand_tipologias[]" id="brand_tipologias" multiple>
                    @foreach($brand_tipologias as $id => $brand_tipologia)
                        <option value="{{ $id }}" {{ (in_array($id, old('brand_tipologias', [])) || $gareInserimento->brand_tipologias->contains($id)) ? 'selected' : '' }}>{{ $brand_tipologia }}</option>
                    @endforeach
                </select>
                @if($errors->has('brand_tipologias'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brand_tipologias') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.brand_tipologia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="visibilitas">{{ trans('cruds.gareInserimento.fields.visibilita') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('visibilitas') ? 'is-invalid' : '' }}" name="visibilitas[]" id="visibilitas" multiple>
                    @foreach($visibilitas as $id => $visibilita)
                        <option value="{{ $id }}" {{ (in_array($id, old('visibilitas', [])) || $gareInserimento->visibilitas->contains($id)) ? 'selected' : '' }}>{{ $visibilita }}</option>
                    @endforeach
                </select>
                @if($errors->has('visibilitas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('visibilitas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.visibilita_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.gareInserimento.fields.esito') }}</label>
                @foreach(App\Models\GareInserimento::ESITO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('esito') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="esito_{{ $key }}" name="esito" value="{{ $key }}" {{ old('esito', $gareInserimento->esito) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="esito_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('esito'))
                    <div class="invalid-feedback">
                        {{ $errors->first('esito') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.esito_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="esito_incremento">{{ trans('cruds.gareInserimento.fields.esito_incremento') }}</label>
                <input class="form-control {{ $errors->has('esito_incremento') ? 'is-invalid' : '' }}" type="number" name="esito_incremento" id="esito_incremento" value="{{ old('esito_incremento', $gareInserimento->esito_incremento) }}" step="1">
                @if($errors->has('esito_incremento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('esito_incremento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.esito_incremento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="esito_decremento">{{ trans('cruds.gareInserimento.fields.esito_decremento') }}</label>
                <input class="form-control {{ $errors->has('esito_decremento') ? 'is-invalid' : '' }}" type="number" name="esito_decremento" id="esito_decremento" value="{{ old('esito_decremento', $gareInserimento->esito_decremento) }}" step="1">
                @if($errors->has('esito_decremento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('esito_decremento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.esito_decremento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="esito_negativos">{{ trans('cruds.gareInserimento.fields.esito_negativo') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('esito_negativos') ? 'is-invalid' : '' }}" name="esito_negativos[]" id="esito_negativos" multiple>
                    @foreach($esito_negativos as $id => $esito_negativo)
                        <option value="{{ $id }}" {{ (in_array($id, old('esito_negativos', [])) || $gareInserimento->esito_negativos->contains($id)) ? 'selected' : '' }}>{{ $esito_negativo }}</option>
                    @endforeach
                </select>
                @if($errors->has('esito_negativos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('esito_negativos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.esito_negativo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero_fasce_previste">{{ trans('cruds.gareInserimento.fields.numero_fasce_previste') }}</label>
                <input class="form-control {{ $errors->has('numero_fasce_previste') ? 'is-invalid' : '' }}" type="number" name="numero_fasce_previste" id="numero_fasce_previste" value="{{ old('numero_fasce_previste', $gareInserimento->numero_fasce_previste) }}" step="1">
                @if($errors->has('numero_fasce_previste'))
                    <div class="invalid-feedback">
                        {{ $errors->first('numero_fasce_previste') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.numero_fasce_previste_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="servizi">{{ trans('cruds.gareInserimento.fields.servizi') }}</label>
                <input class="form-control {{ $errors->has('servizi') ? 'is-invalid' : '' }}" type="text" name="servizi" id="servizi" value="{{ old('servizi', $gareInserimento->servizi) }}">
                @if($errors->has('servizi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('servizi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.servizi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="metodo_attribuzione">{{ trans('cruds.gareInserimento.fields.metodo_attribuzione') }}</label>
                <input class="form-control {{ $errors->has('metodo_attribuzione') ? 'is-invalid' : '' }}" type="number" name="metodo_attribuzione" id="metodo_attribuzione" value="{{ old('metodo_attribuzione', $gareInserimento->metodo_attribuzione) }}" step="1">
                @if($errors->has('metodo_attribuzione'))
                    <div class="invalid-feedback">
                        {{ $errors->first('metodo_attribuzione') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.metodo_attribuzione_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.gareInserimento.fields.metodo_calcolo') }}</label>
                @foreach(App\Models\GareInserimento::METODO_CALCOLO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('metodo_calcolo') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="metodo_calcolo_{{ $key }}" name="metodo_calcolo" value="{{ $key }}" {{ old('metodo_calcolo', $gareInserimento->metodo_calcolo) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="metodo_calcolo_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('metodo_calcolo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('metodo_calcolo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.metodo_calcolo_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.gareInserimento.fields.metodo_famiglia') }}</label>
                @foreach(App\Models\GareInserimento::METODO_FAMIGLIA_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('metodo_famiglia') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="metodo_famiglia_{{ $key }}" name="metodo_famiglia" value="{{ $key }}" {{ old('metodo_famiglia', $gareInserimento->metodo_famiglia) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="metodo_famiglia_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('metodo_famiglia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('metodo_famiglia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.metodo_famiglia_helper') }}</span>
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