@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.offerte.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.offertes.update", [$offerte->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.offerte.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $offerte->nome) }}" required>
                @if($errors->has('nome'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offerte.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="inizio_validita">{{ trans('cruds.offerte.fields.inizio_validita') }}</label>
                <input class="form-control date {{ $errors->has('inizio_validita') ? 'is-invalid' : '' }}" type="text" name="inizio_validita" id="inizio_validita" value="{{ old('inizio_validita', $offerte->inizio_validita) }}">
                @if($errors->has('inizio_validita'))
                    <div class="invalid-feedback">
                        {{ $errors->first('inizio_validita') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offerte.fields.inizio_validita_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fine_validita">{{ trans('cruds.offerte.fields.fine_validita') }}</label>
                <input class="form-control date {{ $errors->has('fine_validita') ? 'is-invalid' : '' }}" type="text" name="fine_validita" id="fine_validita" value="{{ old('fine_validita', $offerte->fine_validita) }}">
                @if($errors->has('fine_validita'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fine_validita') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offerte.fields.fine_validita_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="brand_id">{{ trans('cruds.offerte.fields.brand') }}</label>
                <select class="form-control select2 {{ $errors->has('brand') ? 'is-invalid' : '' }}" name="brand_id" id="brand_id" required>
                    @foreach($brands as $id => $brand)
                        <option value="{{ $id }}" {{ (old('brand_id') ? old('brand_id') : $offerte->brand->id ?? '') == $id ? 'selected' : '' }}>{{ $brand }}</option>
                    @endforeach
                </select>
                @if($errors->has('brand'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brand') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offerte.fields.brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.offerte.fields.tipologia') }}</label>
                <select class="form-control {{ $errors->has('tipologia') ? 'is-invalid' : '' }}" name="tipologia" id="tipologia" required>
                    <option value disabled {{ old('tipologia', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Offerte::TIPOLOGIA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipologia', $offerte->tipologia) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipologia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipologia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offerte.fields.tipologia_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tecnologia_id">{{ trans('cruds.offerte.fields.tecnologia') }}</label>
                <select class="form-control select2 {{ $errors->has('tecnologia') ? 'is-invalid' : '' }}" name="tecnologia_id" id="tecnologia_id" required>
                    @foreach($tecnologias as $id => $tecnologia)
                        <option value="{{ $id }}" {{ (old('tecnologia_id') ? old('tecnologia_id') : $offerte->tecnologia->id ?? '') == $id ? 'selected' : '' }}>{{ $tecnologia }}</option>
                    @endforeach
                </select>
                @if($errors->has('tecnologia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tecnologia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offerte.fields.tecnologia_helper') }}</span>
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