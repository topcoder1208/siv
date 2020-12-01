@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vendite.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vendites.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vendite.fields.id') }}
                        </th>
                        <td>
                            {{ $vendite->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendite.fields.data_inserimento') }}
                        </th>
                        <td>
                            {{ $vendite->data_inserimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendite.fields.ora_inserimento') }}
                        </th>
                        <td>
                            {{ $vendite->ora_inserimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendite.fields.operatore') }}
                        </th>
                        <td>
                            {{ $vendite->operatore }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendite.fields.servizio') }}
                        </th>
                        <td>
                            {{ $vendite->servizio->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendite.fields.quantita') }}
                        </th>
                        <td>
                            {{ $vendite->quantita }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendite.fields.id_agente') }}
                        </th>
                        <td>
                            {{ $vendite->id_agente->agente ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendite.fields.id_point') }}
                        </th>
                        <td>
                            {{ $vendite->id_point->conto_contabilita ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vendites.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection