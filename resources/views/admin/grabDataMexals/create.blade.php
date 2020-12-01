@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.grabDataMexal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.grab-data-mexals.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nomefile">{{ trans('cruds.grabDataMexal.fields.nomefile') }}</label>
                <input class="form-control {{ $errors->has('nomefile') ? 'is-invalid' : '' }}" type="text" name="nomefile" id="nomefile" value="{{ old('nomefile', '') }}">
                @if($errors->has('nomefile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nomefile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.grabDataMexal.fields.nomefile_helper') }}</span>
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