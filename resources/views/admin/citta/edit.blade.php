@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.cittum.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.citta.update", [$cittum->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="cap">{{ trans('cruds.cittum.fields.cap') }}</label>
                <input class="form-control {{ $errors->has('cap') ? 'is-invalid' : '' }}" type="text" name="cap" id="cap" value="{{ old('cap', $cittum->cap) }}" required>
                @if($errors->has('cap'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cap') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cittum.fields.cap_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="citta">{{ trans('cruds.cittum.fields.citta') }}</label>
                <input class="form-control {{ $errors->has('citta') ? 'is-invalid' : '' }}" type="text" name="citta" id="citta" value="{{ old('citta', $cittum->citta) }}" required>
                @if($errors->has('citta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('citta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cittum.fields.citta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="provincia_id">{{ trans('cruds.cittum.fields.provincia') }}</label>
                <select class="form-control select2 {{ $errors->has('provincia') ? 'is-invalid' : '' }}" name="provincia_id" id="provincia_id">
                    @foreach($provincias as $id => $provincia)
                        <option value="{{ $id }}" {{ (old('provincia_id') ? old('provincia_id') : $cittum->provincia->id ?? '') == $id ? 'selected' : '' }}>{{ $provincia }}</option>
                    @endforeach
                </select>
                @if($errors->has('provincia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('provincia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cittum.fields.provincia_helper') }}</span>
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