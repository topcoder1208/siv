@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dealer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dealers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.id') }}
                        </th>
                        <td>
                            {{ $dealer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.dealer') }}
                        </th>
                        <td>
                            {{ $dealer->dealer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.indirizzo') }}
                        </th>
                        <td>
                            {{ $dealer->indirizzo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.cap') }}
                        </th>
                        <td>
                            {{ $dealer->cap }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.citta') }}
                        </th>
                        <td>
                            {{ $dealer->citta->citta ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.provincia') }}
                        </th>
                        <td>
                            {{ $dealer->provincia->provincia ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.email') }}
                        </th>
                        <td>
                            {{ $dealer->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.telefono') }}
                        </th>
                        <td>
                            {{ $dealer->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.conto_contabilita') }}
                        </th>
                        <td>
                            {{ $dealer->conto_contabilita }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.codice') }}
                        </th>
                        <td>
                            {{ $dealer->codice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.stato') }}
                        </th>
                        <td>
                            {{ $dealer->stato }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dealers.index') }}">
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
            <a class="nav-link" href="#id_dealer_dealer_points" role="tab" data-toggle="tab">
                {{ trans('cruds.dealerPoint.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#id_dealer_soggetti_relationships" role="tab" data-toggle="tab">
                {{ trans('cruds.soggettiRelationship.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#id_dealer_dealer_mandatis" role="tab" data-toggle="tab">
                {{ trans('cruds.dealerMandati.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="id_dealer_dealer_points">
            @includeIf('admin.dealers.relationships.idDealerDealerPoints', ['dealerPoints' => $dealer->idDealerDealerPoints])
        </div>
        <div class="tab-pane" role="tabpanel" id="id_dealer_soggetti_relationships">
            @includeIf('admin.dealers.relationships.idDealerSoggettiRelationships', ['soggettiRelationships' => $dealer->idDealerSoggettiRelationships])
        </div>
        <div class="tab-pane" role="tabpanel" id="id_dealer_dealer_mandatis">
            @includeIf('admin.dealers.relationships.idDealerDealerMandatis', ['dealerMandatis' => $dealer->idDealerDealerMandatis])
        </div>
    </div>
</div>

@endsection