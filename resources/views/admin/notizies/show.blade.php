@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.notizie.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.notizies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.notizie.fields.id') }}
                        </th>
                        <td>
                            {{ $notizie->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notizie.fields.titolo') }}
                        </th>
                        <td>
                            {{ $notizie->titolo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notizie.fields.brand') }}
                        </th>
                        <td>
                            {{ $notizie->brand->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notizie.fields.descrizione_breve') }}
                        </th>
                        <td>
                            {!! $notizie->descrizione_breve !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notizie.fields.inizio_visualizzazione') }}
                        </th>
                        <td>
                            {{ $notizie->inizio_visualizzazione }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notizie.fields.fine_visualizzazione') }}
                        </th>
                        <td>
                            {{ $notizie->fine_visualizzazione }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notizie.fields.visualizza_primapagina') }}
                        </th>
                        <td>
                            {{ $notizie->visualizza_primapagina }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notizie.fields.file_pdf') }}
                        </th>
                        <td>
                            @foreach($notizie->file_pdf as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notizie.fields.link') }}
                        </th>
                        <td>
                            {{ $notizie->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notizie.fields.autorizzati') }}
                        </th>
                        <td>
                            {{ App\Models\Notizie::AUTORIZZATI_SELECT[$notizie->autorizzati] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.notizies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection