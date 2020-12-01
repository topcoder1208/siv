@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.grabDataMexal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.grab-data-mexals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.grabDataMexal.fields.id') }}
                        </th>
                        <td>
                            {{ $grabDataMexal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.grabDataMexal.fields.nomefile') }}
                        </th>
                        <td>
                            {{ $grabDataMexal->nomefile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.grabDataMexal.fields.created_at') }}
                        </th>
                        <td>
                            {{ $grabDataMexal->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.grabDataMexal.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $grabDataMexal->updated_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.grabDataMexal.fields.deleted_at') }}
                        </th>
                        <td>
                            {{ $grabDataMexal->deleted_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.grab-data-mexals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection