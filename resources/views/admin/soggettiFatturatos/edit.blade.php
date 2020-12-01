@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.soggettiFatturato.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.soggetti-fatturatos.update", [$soggettiFatturato->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="anno">{{ trans('cruds.soggettiFatturato.fields.anno') }}</label>
                <input class="form-control {{ $errors->has('anno') ? 'is-invalid' : '' }}" type="number" name="anno" id="anno" value="{{ old('anno', $soggettiFatturato->anno) }}" step="1">
                @if($errors->has('anno'))
                    <div class="invalid-feedback">
                        {{ $errors->first('anno') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.soggettiFatturato.fields.anno_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mese">{{ trans('cruds.soggettiFatturato.fields.mese') }}</label>
                <input class="form-control {{ $errors->has('mese') ? 'is-invalid' : '' }}" type="number" name="mese" id="mese" value="{{ old('mese', $soggettiFatturato->mese) }}" step="1">
                @if($errors->has('mese'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mese') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.soggettiFatturato.fields.mese_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefoni">{{ trans('cruds.soggettiFatturato.fields.telefoni') }}</label>
                <input class="form-control {{ $errors->has('telefoni') ? 'is-invalid' : '' }}" type="number" name="telefoni" id="telefoni" value="{{ old('telefoni', $soggettiFatturato->telefoni) }}" step="0.01">
                @if($errors->has('telefoni'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefoni') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.soggettiFatturato.fields.telefoni_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="card">{{ trans('cruds.soggettiFatturato.fields.card') }}</label>
                <input class="form-control {{ $errors->has('card') ? 'is-invalid' : '' }}" type="number" name="card" id="card" value="{{ old('card', $soggettiFatturato->card) }}" step="0.01">
                @if($errors->has('card'))
                    <div class="invalid-feedback">
                        {{ $errors->first('card') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.soggettiFatturato.fields.card_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="servizi">{{ trans('cruds.soggettiFatturato.fields.servizi') }}</label>
                <input class="form-control {{ $errors->has('servizi') ? 'is-invalid' : '' }}" type="number" name="servizi" id="servizi" value="{{ old('servizi', $soggettiFatturato->servizi) }}" step="0.01">
                @if($errors->has('servizi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('servizi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.soggettiFatturato.fields.servizi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="altro">{{ trans('cruds.soggettiFatturato.fields.altro') }}</label>
                <input class="form-control {{ $errors->has('altro') ? 'is-invalid' : '' }}" type="number" name="altro" id="altro" value="{{ old('altro', $soggettiFatturato->altro) }}" step="0.01">
                @if($errors->has('altro'))
                    <div class="invalid-feedback">
                        {{ $errors->first('altro') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.soggettiFatturato.fields.altro_helper') }}</span>
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