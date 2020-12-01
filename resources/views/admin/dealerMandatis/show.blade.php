@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dealerMandati.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dealer-mandatis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerMandati.fields.id') }}
                        </th>
                        <td>
                            {{ $dealerMandati->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerMandati.fields.brand') }}
                        </th>
                        <td>
                            {{ $dealerMandati->brand->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerMandati.fields.inizio') }}
                        </th>
                        <td>
                            {{ $dealerMandati->inizio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerMandati.fields.fine') }}
                        </th>
                        <td>
                            {{ $dealerMandati->fine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerMandati.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\DealerMandati::STATUS_SELECT[$dealerMandati->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealerMandati.fields.id_dealer') }}
                        </th>
                        <td>
                            {{ $dealerMandati->id_dealer->dealer ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dealer-mandatis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection