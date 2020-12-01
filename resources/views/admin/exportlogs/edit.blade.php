@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.exportlog.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.exportlogs.update", [$exportlog->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nome_file">{{ trans('cruds.exportlog.fields.nome_file') }}</label>
                <input class="form-control {{ $errors->has('nome_file') ? 'is-invalid' : '' }}" type="text" name="nome_file" id="nome_file" value="{{ old('nome_file', $exportlog->nome_file) }}">
                @if($errors->has('nome_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exportlog.fields.nome_file_helper') }}</span>
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