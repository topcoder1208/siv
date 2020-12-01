@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.soggettiTipologium.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.soggetti-tipologia.update", [$soggettiTipologium->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="tipologia">{{ trans('cruds.soggettiTipologium.fields.tipologia') }}</label>
                <input class="form-control {{ $errors->has('tipologia') ? 'is-invalid' : '' }}" type="text" name="tipologia" id="tipologia" value="{{ old('tipologia', $soggettiTipologium->tipologia) }}">
                @if($errors->has('tipologia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipologia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.soggettiTipologium.fields.tipologia_helper') }}</span>
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