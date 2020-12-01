@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.soggettiFatturato.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.soggetti-fatturatos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.soggettiFatturato.fields.id') }}
                        </th>
                        <td>
                            {{ $soggettiFatturato->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.soggettiFatturato.fields.anno') }}
                        </th>
                        <td>
                            {{ $soggettiFatturato->anno }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.soggettiFatturato.fields.mese') }}
                        </th>
                        <td>
                            {{ $soggettiFatturato->mese }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.soggettiFatturato.fields.telefoni') }}
                        </th>
                        <td>
                            {{ $soggettiFatturato->telefoni }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.soggettiFatturato.fields.card') }}
                        </th>
                        <td>
                            {{ $soggettiFatturato->card }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.soggettiFatturato.fields.servizi') }}
                        </th>
                        <td>
                            {{ $soggettiFatturato->servizi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.soggettiFatturato.fields.altro') }}
                        </th>
                        <td>
                            {{ $soggettiFatturato->altro }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.soggetti-fatturatos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection