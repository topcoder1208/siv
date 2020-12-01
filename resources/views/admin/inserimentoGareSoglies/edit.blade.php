@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.inserimentoGareSoglie.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.inserimento-gare-soglies.update", [$inserimentoGareSoglie->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="premio">{{ trans('cruds.inserimentoGareSoglie.fields.premio') }}</label>
                <input class="form-control {{ $errors->has('premio') ? 'is-invalid' : '' }}" type="number" name="premio" id="premio" value="{{ old('premio', $inserimentoGareSoglie->premio) }}" step="1">
                @if($errors->has('premio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('premio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inserimentoGareSoglie.fields.premio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="titolo_id">{{ trans('cruds.inserimentoGareSoglie.fields.titolo') }}</label>
                <select class="form-control select2 {{ $errors->has('titolo') ? 'is-invalid' : '' }}" name="titolo_id" id="titolo_id">
                    @foreach($titolos as $id => $titolo)
                        <option value="{{ $id }}" {{ (old('titolo_id') ? old('titolo_id') : $inserimentoGareSoglie->titolo->id ?? '') == $id ? 'selected' : '' }}>{{ $titolo }}</option>
                    @endforeach
                </select>
                @if($errors->has('titolo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('titolo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inserimentoGareSoglie.fields.titolo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="percentuale">{{ trans('cruds.inserimentoGareSoglie.fields.percentuale') }}</label>
                <input class="form-control {{ $errors->has('percentuale') ? 'is-invalid' : '' }}" type="number" name="percentuale" id="percentuale" value="{{ old('percentuale', $inserimentoGareSoglie->percentuale) }}" step="1">
                @if($errors->has('percentuale'))
                    <div class="invalid-feedback">
                        {{ $errors->first('percentuale') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inserimentoGareSoglie.fields.percentuale_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantita">{{ trans('cruds.inserimentoGareSoglie.fields.quantita') }}</label>
                <input class="form-control {{ $errors->has('quantita') ? 'is-invalid' : '' }}" type="number" name="quantita" id="quantita" value="{{ old('quantita', $inserimentoGareSoglie->quantita) }}" step="1">
                @if($errors->has('quantita'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantita') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inserimentoGareSoglie.fields.quantita_helper') }}</span>
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