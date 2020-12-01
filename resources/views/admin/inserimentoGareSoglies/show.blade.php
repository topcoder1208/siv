@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.inserimentoGareSoglie.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.inserimento-gare-soglies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.inserimentoGareSoglie.fields.id') }}
                        </th>
                        <td>
                            {{ $inserimentoGareSoglie->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inserimentoGareSoglie.fields.premio') }}
                        </th>
                        <td>
                            {{ $inserimentoGareSoglie->premio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inserimentoGareSoglie.fields.titolo') }}
                        </th>
                        <td>
                            {{ $inserimentoGareSoglie->titolo->titolo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inserimentoGareSoglie.fields.percentuale') }}
                        </th>
                        <td>
                            {{ $inserimentoGareSoglie->percentuale }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inserimentoGareSoglie.fields.quantita') }}
                        </th>
                        <td>
                            {{ $inserimentoGareSoglie->quantita }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.inserimento-gare-soglies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection