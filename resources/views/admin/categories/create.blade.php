@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.categorie.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nome">{{ trans('cruds.categorie.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', '') }}">
                @if($errors->has('nome'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.categorie.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.categorie.fields.tipologia') }}</label>
                <select class="form-control {{ $errors->has('tipologia') ? 'is-invalid' : '' }}" name="tipologia" id="tipologia">
                    <option value disabled {{ old('tipologia', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Categorie::TIPOLOGIA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipologia', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipologia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipologia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.categorie.fields.tipologia_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('attivo') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="attivo" value="0">
                    <input class="form-check-input" type="checkbox" name="attivo" id="attivo" value="1" {{ old('attivo', 0) == 1 || old('attivo') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="attivo">{{ trans('cruds.categorie.fields.attivo') }}</label>
                </div>
                @if($errors->has('attivo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attivo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.categorie.fields.attivo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="brand_id">{{ trans('cruds.categorie.fields.brand') }}</label>
                <select class="form-control select2 {{ $errors->has('brand') ? 'is-invalid' : '' }}" name="brand_id" id="brand_id">
                    @foreach($brands as $id => $brand)
                        <option value="{{ $id }}" {{ old('brand_id') == $id ? 'selected' : '' }}>{{ $brand }}</option>
                    @endforeach
                </select>
                @if($errors->has('brand'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brand') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.categorie.fields.brand_helper') }}</span>
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