@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tecnologium.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tecnologia.update", [$tecnologium->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nome">{{ trans('cruds.tecnologium.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $tecnologium->nome) }}">
                @if($errors->has('nome'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tecnologium.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="categoria_id">{{ trans('cruds.tecnologium.fields.categoria') }}</label>
                <select class="form-control select2 {{ $errors->has('categoria') ? 'is-invalid' : '' }}" name="categoria_id" id="categoria_id">
                    @foreach($categorias as $id => $categoria)
                        <option value="{{ $id }}" {{ (old('categoria_id') ? old('categoria_id') : $tecnologium->categoria->id ?? '') == $id ? 'selected' : '' }}>{{ $categoria }}</option>
                    @endforeach
                </select>
                @if($errors->has('categoria'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categoria') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tecnologium.fields.categoria_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('attivo') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="attivo" value="0">
                    <input class="form-check-input" type="checkbox" name="attivo" id="attivo" value="1" {{ $tecnologium->attivo || old('attivo', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="attivo">{{ trans('cruds.tecnologium.fields.attivo') }}</label>
                </div>
                @if($errors->has('attivo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attivo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tecnologium.fields.attivo_helper') }}</span>
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