@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cittum.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.citta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cittum.fields.id') }}
                        </th>
                        <td>
                            {{ $cittum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cittum.fields.cap') }}
                        </th>
                        <td>
                            {{ $cittum->cap }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cittum.fields.citta') }}
                        </th>
                        <td>
                            {{ $cittum->citta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cittum.fields.provincia') }}
                        </th>
                        <td>
                            {{ $cittum->provincia->provincia ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.citta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection