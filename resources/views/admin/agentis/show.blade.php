@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.agenti.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agentis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.agenti.fields.id') }}
                        </th>
                        <td>
                            {{ $agenti->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenti.fields.id_brand') }}
                        </th>
                        <td>
                            {{ $agenti->id_brand->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenti.fields.codice') }}
                        </th>
                        <td>
                            {{ $agenti->codice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenti.fields.agente') }}
                        </th>
                        <td>
                            {{ $agenti->agente }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenti.fields.conto_contabilita') }}
                        </th>
                        <td>
                            {{ $agenti->conto_contabilita }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenti.fields.indirizzo') }}
                        </th>
                        <td>
                            {{ $agenti->indirizzo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenti.fields.cap') }}
                        </th>
                        <td>
                            {{ $agenti->cap }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenti.fields.citta') }}
                        </th>
                        <td>
                            {{ $agenti->citta->citta ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenti.fields.provincia') }}
                        </th>
                        <td>
                            {{ $agenti->provincia->provincia ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenti.fields.email') }}
                        </th>
                        <td>
                            {{ $agenti->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenti.fields.telefono') }}
                        </th>
                        <td>
                            {{ $agenti->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenti.fields.agenzia_responsabile') }}
                        </th>
                        <td>
                            {{ $agenti->agenzia_responsabile }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agentis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection