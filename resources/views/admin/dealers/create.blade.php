@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.dealer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dealers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="dealer">{{ trans('cruds.dealer.fields.dealer') }}</label>
                <input class="form-control {{ $errors->has('dealer') ? 'is-invalid' : '' }}" type="text" name="dealer" id="dealer" value="{{ old('dealer', '') }}" required>
                @if($errors->has('dealer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dealer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.dealer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="indirizzo">{{ trans('cruds.dealer.fields.indirizzo') }}</label>
                <input class="form-control {{ $errors->has('indirizzo') ? 'is-invalid' : '' }}" type="text" name="indirizzo" id="indirizzo" value="{{ old('indirizzo', '') }}">
                @if($errors->has('indirizzo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indirizzo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.indirizzo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cap">{{ trans('cruds.dealer.fields.cap') }}</label>
                <input class="form-control {{ $errors->has('cap') ? 'is-invalid' : '' }}" type="text" name="cap" id="cap" value="{{ old('cap', '') }}">
                @if($errors->has('cap'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cap') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.cap_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="citta_id">{{ trans('cruds.dealer.fields.citta') }}</label>
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
                <span class="help-block">{{ trans('cruds.dealer.fields.citta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="provincia_id">{{ trans('cruds.dealer.fields.provincia') }}</label>
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
                <span class="help-block">{{ trans('cruds.dealer.fields.provincia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.dealer.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefono">{{ trans('cruds.dealer.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="text" name="telefono" id="telefono" value="{{ old('telefono', '') }}">
                @if($errors->has('telefono'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefono') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.telefono_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conto_contabilita">{{ trans('cruds.dealer.fields.conto_contabilita') }}</label>
                <input class="form-control {{ $errors->has('conto_contabilita') ? 'is-invalid' : '' }}" type="text" name="conto_contabilita" id="conto_contabilita" value="{{ old('conto_contabilita', '') }}">
                @if($errors->has('conto_contabilita'))
                    <div class="invalid-feedback">
                        {{ $errors->first('conto_contabilita') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.conto_contabilita_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="codice">{{ trans('cruds.dealer.fields.codice') }}</label>
                <input class="form-control {{ $errors->has('codice') ? 'is-invalid' : '' }}" type="text" name="codice" id="codice" value="{{ old('codice', '') }}">
                @if($errors->has('codice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.codice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stato">{{ trans('cruds.dealer.fields.stato') }}</label>
                <input class="form-control {{ $errors->has('stato') ? 'is-invalid' : '' }}" type="text" name="stato" id="stato" value="{{ old('stato', '') }}">
                @if($errors->has('stato'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stato') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.stato_helper') }}</span>
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