@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.gareInserimentoDettagli.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gare-inserimento-dettaglis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimentoDettagli.fields.id') }}
                        </th>
                        <td>
                            {{ $gareInserimentoDettagli->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimentoDettagli.fields.gara_inserimento') }}
                        </th>
                        <td>
                            {{ $gareInserimentoDettagli->gara_inserimento->tipologia_gara ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimentoDettagli.fields.valore_n_1') }}
                        </th>
                        <td>
                            {{ $gareInserimentoDettagli->valore_n_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimentoDettagli.fields.valore_n_2') }}
                        </th>
                        <td>
                            {{ $gareInserimentoDettagli->valore_n_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimentoDettagli.fields.descrizione_valore') }}
                        </th>
                        <td>
                            {{ $gareInserimentoDettagli->descrizione_valore }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gare-inserimento-dettaglis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection