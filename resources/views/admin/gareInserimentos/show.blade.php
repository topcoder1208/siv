@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.gareInserimento.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gare-inserimentos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.id') }}
                        </th>
                        <td>
                            {{ $gareInserimento->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.titolo') }}
                        </th>
                        <td>
                            {{ $gareInserimento->titolo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.tipologia_gara') }}
                        </th>
                        <td>
                            {{ $gareInserimento->tipologia_gara }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.validita_inizio') }}
                        </th>
                        <td>
                            {{ $gareInserimento->validita_inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.validita_fine') }}
                        </th>
                        <td>
                            {{ $gareInserimento->validita_fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.brand_tipologia') }}
                        </th>
                        <td>
                            @foreach($gareInserimento->brand_tipologias as $key => $brand_tipologia)
                                <span class="label label-info">{{ $brand_tipologia->nome }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.visibilita') }}
                        </th>
                        <td>
                            @foreach($gareInserimento->visibilitas as $key => $visibilita)
                                <span class="label label-info">{{ $visibilita->tipologia }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.esito') }}
                        </th>
                        <td>
                            {{ App\Models\GareInserimento::ESITO_RADIO[$gareInserimento->esito] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.esito_incremento') }}
                        </th>
                        <td>
                            {{ $gareInserimento->esito_incremento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.esito_decremento') }}
                        </th>
                        <td>
                            {{ $gareInserimento->esito_decremento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.esito_negativo') }}
                        </th>
                        <td>
                            @foreach($gareInserimento->esito_negativos as $key => $esito_negativo)
                                <span class="label label-info">{{ $esito_negativo->nome }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.numero_fasce_previste') }}
                        </th>
                        <td>
                            {{ $gareInserimento->numero_fasce_previste }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.servizi') }}
                        </th>
                        <td>
                            {{ $gareInserimento->servizi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.metodo_attribuzione') }}
                        </th>
                        <td>
                            {{ $gareInserimento->metodo_attribuzione }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.metodo_calcolo') }}
                        </th>
                        <td>
                            {{ App\Models\GareInserimento::METODO_CALCOLO_RADIO[$gareInserimento->metodo_calcolo] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.metodo_famiglia') }}
                        </th>
                        <td>
                            {{ App\Models\GareInserimento::METODO_FAMIGLIA_RADIO[$gareInserimento->metodo_famiglia] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gare-inserimentos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection