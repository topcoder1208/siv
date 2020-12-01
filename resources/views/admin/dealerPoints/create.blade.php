@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.dealerPoint.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dealer-points.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id_dealer_id">{{ trans('cruds.dealerPoint.fields.id_dealer') }}</label>
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
                <span class="help-block">{{ trans('cruds.dealerPoint.fields.id_dealer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conto_contabilita">{{ trans('cruds.dealerPoint.fields.conto_contabilita') }}</label>
                <input class="form-control {{ $errors->has('conto_contabilita') ? 'is-invalid' : '' }}" type="text" name="conto_contabilita" id="conto_contabilita" value="{{ old('conto_contabilita', '') }}">
                @if($errors->has('conto_contabilita'))
                    <div class="invalid-feedback">
                        {{ $errors->first('conto_contabilita') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerPoint.fields.conto_contabilita_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="codice">{{ trans('cruds.dealerPoint.fields.codice') }}</label>
                <input class="form-control {{ $errors->has('codice') ? 'is-invalid' : '' }}" type="text" name="codice" id="codice" value="{{ old('codice', '') }}" required>
                @if($errors->has('codice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerPoint.fields.codice_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="point">{{ trans('cruds.dealerPoint.fields.point') }}</label>
                <input class="form-control {{ $errors->has('point') ? 'is-invalid' : '' }}" type="text" name="point" id="point" value="{{ old('point', '') }}" required>
                @if($errors->has('point'))
                    <div class="invalid-feedback">
                        {{ $errors->first('point') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerPoint.fields.point_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="indirizzo">{{ trans('cruds.dealerPoint.fields.indirizzo') }}</label>
                <input class="form-control {{ $errors->has('indirizzo') ? 'is-invalid' : '' }}" type="text" name="indirizzo" id="indirizzo" value="{{ old('indirizzo', '') }}">
                @if($errors->has('indirizzo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indirizzo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerPoint.fields.indirizzo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cap">{{ trans('cruds.dealerPoint.fields.cap') }}</label>
                <input class="form-control {{ $errors->has('cap') ? 'is-invalid' : '' }}" type="text" name="cap" id="cap" value="{{ old('cap', '') }}">
                @if($errors->has('cap'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cap') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerPoint.fields.cap_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="citta_id">{{ trans('cruds.dealerPoint.fields.citta') }}</label>
                <select class="form-control select2 {{ $errors->has('citta') ? 'is-invalid' : '' }}" name="citta_id" id="citta_id">
                    @foreach($cittas as $id => $citta)
                        <option value="{{ $id }}" {{ old('citta_id') == $id ? 'selected' : '' }}>{{ $citta }}</option>
                    @endforeach
                </select>
                @if($errors->has('citta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('citta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerPoint.fields.citta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="provincia_id">{{ trans('cruds.dealerPoint.fields.provincia') }}</label>
                <select class="form-control select2 {{ $errors->has('provincia') ? 'is-invalid' : '' }}" name="provincia_id" id="provincia_id">
                    @foreach($provincias as $id => $provincia)
                        <option value="{{ $id }}" {{ old('provincia_id') == $id ? 'selected' : '' }}>{{ $provincia }}</option>
                    @endforeach
                </select>
                @if($errors->has('provincia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('provincia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerPoint.fields.provincia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.dealerPoint.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerPoint.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefono">{{ trans('cruds.dealerPoint.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="text" name="telefono" id="telefono" value="{{ old('telefono', '') }}">
                @if($errors->has('telefono'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefono') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerPoint.fields.telefono_helper') }}</span>
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