@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.brand.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.brands.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.brand.fields.id') }}
                        </th>
                        <td>
                            {{ $brand->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.brand.fields.name') }}
                        </th>
                        <td>
                            {{ $brand->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.brand.fields.attivo') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $brand->attivo ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.brand.fields.logo') }}
                        </th>
                        <td>
                            @if($brand->logo)
                                <a href="{{ $brand->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $brand->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.brands.index') }}">
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
            <a class="nav-link" href="#brand_offertes" role="tab" data-toggle="tab">
                {{ trans('cruds.offerte.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#brand_notizies" role="tab" data-toggle="tab">
                {{ trans('cruds.notizie.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#id_brand_agentis" role="tab" data-toggle="tab">
                {{ trans('cruds.agenti.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="brand_offertes">
            @includeIf('admin.brands.relationships.brandOffertes', ['offertes' => $brand->brandOffertes])
        </div>
        <div class="tab-pane" role="tabpanel" id="brand_notizies">
            @includeIf('admin.brands.relationships.brandNotizies', ['notizies' => $brand->brandNotizies])
        </div>
        <div class="tab-pane" role="tabpanel" id="id_brand_agentis">
            @includeIf('admin.brands.relationships.idBrandAgentis', ['agentis' => $brand->idBrandAgentis])
        </div>
    </div>
</div>

@endsection