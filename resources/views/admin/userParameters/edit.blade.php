@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.userParameter.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-parameters.update", [$userParameter->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="tipologia">{{ trans('cruds.userParameter.fields.tipologia') }}</label>
                <input class="form-control {{ $errors->has('tipologia') ? 'is-invalid' : '' }}" type="text" name="tipologia" id="tipologia" value="{{ old('tipologia', $userParameter->tipologia) }}">
                @if($errors->has('tipologia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipologia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userParameter.fields.tipologia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parametro">{{ trans('cruds.userParameter.fields.parametro') }}</label>
                <input class="form-control {{ $errors->has('parametro') ? 'is-invalid' : '' }}" type="text" name="parametro" id="parametro" value="{{ old('parametro', $userParameter->parametro) }}">
                @if($errors->has('parametro'))
                    <div class="invalid-feedback">
                        {{ $errors->first('parametro') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userParameter.fields.parametro_helper') }}</span>
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