@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dealerPoint.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dealer-points.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.id') }}
                        </th>
                        <td>
                            {{ $dealerPoint->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.id_dealer') }}
                        </th>
                        <td>
                            {{ $dealerPoint->id_dealer->dealer ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.conto_contabilita') }}
                        </th>
                        <td>
                            {{ $dealerPoint->conto_contabilita }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.codice') }}
                        </th>
                        <td>
                            {{ $dealerPoint->codice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.point') }}
                        </th>
                        <td>
                            {{ $dealerPoint->point }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.indirizzo') }}
                        </th>
                        <td>
                            {{ $dealerPoint->indirizzo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.cap') }}
                        </th>
                        <td>
                            {{ $dealerPoint->cap }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.citta') }}
                        </th>
                        <td>
                            {{ $dealerPoint->citta->citta ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.provincia') }}
                        </th>
                        <td>
                            {{ $dealerPoint->provincia->provincia ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.email') }}
                        </th>
                        <td>
                            {{ $dealerPoint->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.telefono') }}
                        </th>
                        <td>
                            {{ $dealerPoint->telefono }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dealer-points.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#id_point_vendites" role="tab" data-toggle="tab">
                {{ trans('cruds.vendite.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="id_point_vendites">
            @includeIf('admin.dealerPoints.relationships.idPointVendites', ['vendites' => $dealerPoint->idPointVendites])
        </div>
    </div>
</div>

@endsection