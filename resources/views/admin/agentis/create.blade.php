@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.agenti.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.agentis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="id_brand_id">{{ trans('cruds.agenti.fields.id_brand') }}</label>
                <select class="form-control select2 {{ $errors->has('id_brand') ? 'is-invalid' : '' }}" name="id_brand_id" id="id_brand_id" required>
                    @foreach($id_brands as $id => $id_brand)
                        <option value="{{ $id }}" {{ old('id_brand_id') == $id ? 'selected' : '' }}>{{ $id_brand }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_brand'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_brand') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agenti.fields.id_brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="codice">{{ trans('cruds.agenti.fields.codice') }}</label>
                <input class="form-control {{ $errors->has('codice') ? 'is-invalid' : '' }}" type="text" name="codice" id="codice" value="{{ old('codice', '') }}">
                @if($errors->has('codice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agenti.fields.codice_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="agente">{{ trans('cruds.agenti.fields.agente') }}</label>
                <input class="form-control {{ $errors->has('agente') ? 'is-invalid' : '' }}" type="text" name="agente" id="agente" value="{{ old('agente', '') }}" required>
                @if($errors->has('agente'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agente') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agenti.fields.agente_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conto_contabilita">{{ trans('cruds.agenti.fields.conto_contabilita') }}</label>
                <input class="form-control {{ $errors->has('conto_contabilita') ? 'is-invalid' : '' }}" type="text" name="conto_contabilita" id="conto_contabilita" value="{{ old('conto_contabilita', '') }}">
                @if($errors->has('conto_contabilita'))
                    <div class="invalid-feedback">
                        {{ $errors->first('conto_contabilita') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agenti.fields.conto_contabilita_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="indirizzo">{{ trans('cruds.agenti.fields.indirizzo') }}</label>
                <input class="form-control {{ $errors->has('indirizzo') ? 'is-invalid' : '' }}" type="text" name="indirizzo" id="indirizzo" value="{{ old('indirizzo', '') }}">
                @if($errors->has('indirizzo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indirizzo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agenti.fields.indirizzo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cap">{{ trans('cruds.agenti.fields.cap') }}</label>
                <input class="form-control {{ $errors->has('cap') ? 'is-invalid' : '' }}" type="text" name="cap" id="cap" value="{{ old('cap', '') }}">
                @if($errors->has('cap'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cap') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agenti.fields.cap_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="citta_id">{{ trans('cruds.agenti.fields.citta') }}</label>
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
                <span class="help-block">{{ trans('cruds.agenti.fields.citta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="provincia_id">{{ trans('cruds.agenti.fields.provincia') }}</label>
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
                <span class="help-block">{{ trans('cruds.agenti.fields.provincia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.agenti.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agenti.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefono">{{ trans('cruds.agenti.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="text" name="telefono" id="telefono" value="{{ old('telefono', '') }}">
                @if($errors->has('telefono'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefono') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agenti.fields.telefono_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agenzia_responsabile">{{ trans('cruds.agenti.fields.agenzia_responsabile') }}</label>
                <input class="form-control {{ $errors->has('agenzia_responsabile') ? 'is-invalid' : '' }}" type="text" name="agenzia_responsabile" id="agenzia_responsabile" value="{{ old('agenzia_responsabile', '') }}">
                @if($errors->has('agenzia_responsabile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agenzia_responsabile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agenti.fields.agenzia_responsabile_helper') }}</span>
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