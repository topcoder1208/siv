@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.dealerMandati.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dealer-mandatis.update", [$dealerMandati->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="brand_id">{{ trans('cruds.dealerMandati.fields.brand') }}</label>
                <select class="form-control select2 {{ $errors->has('brand') ? 'is-invalid' : '' }}" name="brand_id" id="brand_id">
                    @foreach($brands as $id => $brand)
                        <option value="{{ $id }}" {{ (old('brand_id') ? old('brand_id') : $dealerMandati->brand->id ?? '') == $id ? 'selected' : '' }}>{{ $brand }}</option>
                    @endforeach
                </select>
                @if($errors->has('brand'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brand') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerMandati.fields.brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="inizio">{{ trans('cruds.dealerMandati.fields.inizio') }}</label>
                <input class="form-control date {{ $errors->has('inizio') ? 'is-invalid' : '' }}" type="text" name="inizio" id="inizio" value="{{ old('inizio', $dealerMandati->inizio) }}">
                @if($errors->has('inizio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('inizio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerMandati.fields.inizio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fine">{{ trans('cruds.dealerMandati.fields.fine') }}</label>
                <input class="form-control date {{ $errors->has('fine') ? 'is-invalid' : '' }}" type="text" name="fine" id="fine" value="{{ old('fine', $dealerMandati->fine) }}">
                @if($errors->has('fine'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fine') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerMandati.fields.fine_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.dealerMandati.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\DealerMandati::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $dealerMandati->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerMandati.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_dealer_id">{{ trans('cruds.dealerMandati.fields.id_dealer') }}</label>
                <select class="form-control select2 {{ $errors->has('id_dealer') ? 'is-invalid' : '' }}" name="id_dealer_id" id="id_dealer_id">
                    @foreach($id_dealers as $id => $id_dealer)
                        <option value="{{ $id }}" {{ (old('id_dealer_id') ? old('id_dealer_id') : $dealerMandati->id_dealer->id ?? '') == $id ? 'selected' : '' }}>{{ $id_dealer }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_dealer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_dealer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerMandati.fields.id_dealer_helper') }}</span>
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