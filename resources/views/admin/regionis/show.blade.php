@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.regioni.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.regionis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.regioni.fields.id') }}
                        </th>
                        <td>
                            {{ $regioni->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regioni.fields.regione') }}
                        </th>
                        <td>
                            {{ $regioni->regione }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.regionis.index') }}">
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
            <a class="nav-link" href="#regione_provinces" role="tab" data-toggle="tab">
                {{ trans('cruds.province.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="regione_provinces">
            @includeIf('admin.regionis.relationships.regioneProvinces', ['provinces' => $regioni->regioneProvinces])
        </div>
    </div>
</div>

@endsection