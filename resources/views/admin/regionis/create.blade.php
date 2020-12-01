@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.regioni.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.regionis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="regione">{{ trans('cruds.regioni.fields.regione') }}</label>
                <input class="form-control {{ $errors->has('regione') ? 'is-invalid' : '' }}" type="text" name="regione" id="regione" value="{{ old('regione', '') }}" required>
                @if($errors->has('regione'))
                    <div class="invalid-feedback">
                        {{ $errors->first('regione') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.regioni.fields.regione_helper') }}</span>
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