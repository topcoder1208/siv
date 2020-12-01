@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.soggettiRelationship.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.soggetti-relationships.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="brand_id">{{ trans('cruds.soggettiRelationship.fields.brand') }}</label>
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
                <span class="help-block">{{ trans('cruds.soggettiRelationship.fields.brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="inizio">{{ trans('cruds.soggettiRelationship.fields.inizio') }}</label>
                <input class="form-control date {{ $errors->has('inizio') ? 'is-invalid' : '' }}" type="text" name="inizio" id="inizio" value="{{ old('inizio') }}">
                @if($errors->has('inizio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('inizio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.soggettiRelationship.fields.inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fine">{{ trans('cruds.soggettiRelationship.fields.fine') }}</label>
                <input class="form-control date {{ $errors->has('fine') ? 'is-invalid' : '' }}" type="text" name="fine" id="fine" value="{{ old('fine') }}">
                @if($errors->has('fine'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fine') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.soggettiRelationship.fields.fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.soggettiRelationship.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\SoggettiRelationship::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.soggettiRelationship.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_dealer_id">{{ trans('cruds.soggettiRelationship.fields.id_dealer') }}</label>
                <select class="form-control select2 {{ $errors->has('id_dealer') ? 'is-invalid' : '' }}" name="id_dealer_id" id="id_dealer_id">
                    @foreach($id_dealers as $id => $id_dealer)
                        <option value="{{ $id }}" {{ old('id_dealer_id') == $id ? 'selected' : '' }}>{{ $id_dealer }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_dealer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_dealer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.soggettiRelationship.fields.id_dealer_helper') }}</span>
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