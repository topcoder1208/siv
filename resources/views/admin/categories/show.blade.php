@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.categorie.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.categorie.fields.id') }}
                        </th>
                        <td>
                            {{ $categorie->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categorie.fields.nome') }}
                        </th>
                        <td>
                            {{ $categorie->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categorie.fields.tipologia') }}
                        </th>
                        <td>
                            {{ App\Models\Categorie::TIPOLOGIA_SELECT[$categorie->tipologia] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categorie.fields.attivo') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $categorie->attivo ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categorie.fields.brand') }}
                        </th>
                        <td>
                            {{ $categorie->brand->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
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
            <a class="nav-link" href="#categoria_tecnologia" role="tab" data-toggle="tab">
                {{ trans('cruds.tecnologium.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#brand_tipologia_gare_inserimentos" role="tab" data-toggle="tab">
                {{ trans('cruds.gareInserimento.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="categoria_tecnologia">
            @includeIf('admin.categories.relationships.categoriaTecnologia', ['tecnologia' => $categorie->categoriaTecnologia])
        </div>
        <div class="tab-pane" role="tabpanel" id="brand_tipologia_gare_inserimentos">
            @includeIf('admin.categories.relationships.brandTipologiaGareInserimentos', ['gareInserimentos' => $categorie->brandTipologiaGareInserimentos])
        </div>
    </div>
</div>

@endsection