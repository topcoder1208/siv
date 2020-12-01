@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.inserimentoSoglieRange.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.inserimento-soglie-ranges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.inserimentoSoglieRange.fields.id') }}
                        </th>
                        <td>
                            {{ $inserimentoSoglieRange->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inserimentoSoglieRange.fields.gara') }}
                        </th>
                        <td>
                            {{ $inserimentoSoglieRange->gara->titolo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inserimentoSoglieRange.fields.percentuale') }}
                        </th>
                        <td>
                            {{ $inserimentoSoglieRange->percentuale }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inserimentoSoglieRange.fields.soglia_minima') }}
                        </th>
                        <td>
                            {{ $inserimentoSoglieRange->soglia_minima }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inserimentoSoglieRange.fields.soglia_massima') }}
                        </th>
                        <td>
                            {{ $inserimentoSoglieRange->soglia_massima }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.inserimento-soglie-ranges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection