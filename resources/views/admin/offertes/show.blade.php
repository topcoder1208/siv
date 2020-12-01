@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.offerte.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.offertes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.offerte.fields.id') }}
                        </th>
                        <td>
                            {{ $offerte->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offerte.fields.nome') }}
                        </th>
                        <td>
                            {{ $offerte->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offerte.fields.inizio_validita') }}
                        </th>
                        <td>
                            {{ $offerte->inizio_validita }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offerte.fields.fine_validita') }}
                        </th>
                        <td>
                            {{ $offerte->fine_validita }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offerte.fields.brand') }}
                        </th>
                        <td>
                            {{ $offerte->brand->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offerte.fields.tipologia') }}
                        </th>
                        <td>
                            {{ App\Models\Offerte::TIPOLOGIA_SELECT[$offerte->tipologia] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offerte.fields.tecnologia') }}
                        </th>
                        <td>
                            {{ $offerte->tecnologia->nome ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.offertes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection