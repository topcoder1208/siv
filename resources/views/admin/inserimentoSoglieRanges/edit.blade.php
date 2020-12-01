@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.inserimentoSoglieRange.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.inserimento-soglie-ranges.update", [$inserimentoSoglieRange->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="gara_id">{{ trans('cruds.inserimentoSoglieRange.fields.gara') }}</label>
                <select class="form-control select2 {{ $errors->has('gara') ? 'is-invalid' : '' }}" name="gara_id" id="gara_id">
                    @foreach($garas as $id => $gara)
                        <option value="{{ $id }}" {{ (old('gara_id') ? old('gara_id') : $inserimentoSoglieRange->gara->id ?? '') == $id ? 'selected' : '' }}>{{ $gara }}</option>
                    @endforeach
                </select>
                @if($errors->has('gara'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gara') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inserimentoSoglieRange.fields.gara_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="percentuale">{{ trans('cruds.inserimentoSoglieRange.fields.percentuale') }}</label>
                <input class="form-control {{ $errors->has('percentuale') ? 'is-invalid' : '' }}" type="number" name="percentuale" id="percentuale" value="{{ old('percentuale', $inserimentoSoglieRange->percentuale) }}" step="1">
                @if($errors->has('percentuale'))
                    <div class="invalid-feedback">
                        {{ $errors->first('percentuale') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inserimentoSoglieRange.fields.percentuale_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="soglia_minima">{{ trans('cruds.inserimentoSoglieRange.fields.soglia_minima') }}</label>
                <input class="form-control {{ $errors->has('soglia_minima') ? 'is-invalid' : '' }}" type="number" name="soglia_minima" id="soglia_minima" value="{{ old('soglia_minima', $inserimentoSoglieRange->soglia_minima) }}" step="0.01">
                @if($errors->has('soglia_minima'))
                    <div class="invalid-feedback">
                        {{ $errors->first('soglia_minima') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inserimentoSoglieRange.fields.soglia_minima_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="soglia_massima">{{ trans('cruds.inserimentoSoglieRange.fields.soglia_massima') }}</label>
                <input class="form-control {{ $errors->has('soglia_massima') ? 'is-invalid' : '' }}" type="number" name="soglia_massima" id="soglia_massima" value="{{ old('soglia_massima', $inserimentoSoglieRange->soglia_massima) }}" step="0.01">
                @if($errors->has('soglia_massima'))
                    <div class="invalid-feedback">
                        {{ $errors->first('soglia_massima') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inserimentoSoglieRange.fields.soglia_massima_helper') }}</span>
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