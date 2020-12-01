@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.province.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.provinces.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="provincia">{{ trans('cruds.province.fields.provincia') }}</label>
                <input class="form-control {{ $errors->has('provincia') ? 'is-invalid' : '' }}" type="text" name="provincia" id="provincia" value="{{ old('provincia', '') }}" required>
                @if($errors->has('provincia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('provincia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.province.fields.provincia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="regione_id">{{ trans('cruds.province.fields.regione') }}</label>
                <select class="form-control select2 {{ $errors->has('regione') ? 'is-invalid' : '' }}" name="regione_id" id="regione_id">
                    @foreach($regiones as $id => $regione)
                        <option value="{{ $id }}" {{ old('regione_id') == $id ? 'selected' : '' }}>{{ $regione }}</option>
                    @endforeach
                </select>
                @if($errors->has('regione'))
                    <div class="invalid-feedback">
                        {{ $errors->first('regione') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.province.fields.regione_helper') }}</span>
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