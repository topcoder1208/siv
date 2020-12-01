@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.province.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.provinces.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.id') }}
                        </th>
                        <td>
                            {{ $province->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.provincia') }}
                        </th>
                        <td>
                            {{ $province->provincia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.regione') }}
                        </th>
                        <td>
                            {{ $province->regione->regione ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.provinces.index') }}">
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
            <a class="nav-link" href="#provincia_citta" role="tab" data-toggle="tab">
                {{ trans('cruds.cittum.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="provincia_citta">
            @includeIf('admin.provinces.relationships.provinciaCitta', ['citta' => $province->provinciaCitta])
        </div>
    </div>
</div>

@endsection