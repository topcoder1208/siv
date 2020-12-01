@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userParameter.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-parameters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userParameter.fields.id') }}
                        </th>
                        <td>
                            {{ $userParameter->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userParameter.fields.tipologia') }}
                        </th>
                        <td>
                            {{ $userParameter->tipologia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userParameter.fields.parametro') }}
                        </th>
                        <td>
                            {{ $userParameter->parametro }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-parameters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection