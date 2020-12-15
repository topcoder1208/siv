<div class="tab-pane fade show active" id="nav-gara" role="tabpanel" aria-labelledby="nav-gara-tab">
    <form method="POST" action="{{ route("admin.gare-inserimentos.store") }}" id="form-gareInserimentos-gara">
        @csrf
        <div class="row">
            <div class="form-group col-lg-3 col-md-6 col-sm-12">
                <label class="required" for="titolo">{{ trans('cruds.gareInserimento.fields.titolo') }}</label>
                <input class="form-control {{ $errors->has('titolo') ? 'is-invalid' : '' }}" type="text" name="titolo" id="titolo" value="{{ (!isset($gare->id) ? "" : $gare->titolo) }}" required>
                @if($errors->has('titolo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('titolo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.titolo_helper') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-3 col-md-6 col-sm-12">
                <label class="required" for="validita_inizio">{{ trans('cruds.gareInserimento.fields.validita_inizio') }}</label>
                <input class="form-control date {{ $errors->has('validita_inizio') ? 'is-invalid' : '' }}" type="text" name="validita_inizio" id="validita_inizio" value="{{(!isset($gare->id) ? "" : $gare->validita_inizio)}}" required>
                @if($errors->has('validita_inizio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('validita_inizio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.validita_inizio_helper') }}</span>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-3 col-md-6 col-sm-12">
                <label class="required" for="validita_fine">{{ trans('cruds.gareInserimento.fields.validita_fine') }}</label>
                <input class="form-control date {{ $errors->has('validita_fine') ? 'is-invalid' : '' }}" type="text" name="validita_fine" id="validita_fine" value="{{(!isset($gare->id) ? "" : $gare->validita_fine)}}" required>
                @if($errors->has('validita_fine'))
                    <div class="invalid-feedback">
                        {{ $errors->first('validita_fine') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gareInserimento.fields.validita_fine_helper') }}</span>
            </div>
        </div>

        <input type="hidden" name="tipologia_gara" id="tipologia_gara" value="{{ (request()->is("admin/gare-inserimentos/fascia") || request()->is("admin/gare-inserimentos/fascia*") ? 'fasce' : 'target')}}">
        <input type="hidden" name="gare-inserimentos-id" id="gare-inserimentos-id" value="{{(!isset($gare->id) ? "" : $gare->id)}}">
        <div class="form-group">
            <button class="btn btn-danger go-next" type="submit">
                Scegli Brand
            </button>
        </div>
    </form>
</div>