@extends('layouts.admin')
@section('content')
@can('notizie_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.notizies.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.notizie.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.notizie.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Notizie">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.notizie.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.notizie.fields.titolo') }}
                        </th>
                        <th>
                            {{ trans('cruds.notizie.fields.brand') }}
                        </th>
                        <th>
                            {{ trans('cruds.notizie.fields.inizio_visualizzazione') }}
                        </th>
                        <th>
                            {{ trans('cruds.notizie.fields.fine_visualizzazione') }}
                        </th>
                        <th>
                            {{ trans('cruds.notizie.fields.visualizza_primapagina') }}
                        </th>
                        <th>
                            {{ trans('cruds.notizie.fields.file_pdf') }}
                        </th>
                        <th>
                            {{ trans('cruds.notizie.fields.link') }}
                        </th>
                        <th>
                            {{ trans('cruds.notizie.fields.autorizzati') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($brands as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Notizie::AUTORIZZATI_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notizies as $key => $notizie)
                        <tr data-entry-id="{{ $notizie->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $notizie->id ?? '' }}
                            </td>
                            <td>
                                {{ $notizie->titolo ?? '' }}
                            </td>
                            <td>
                                {{ $notizie->brand->name ?? '' }}
                            </td>
                            <td>
                                {{ $notizie->inizio_visualizzazione ?? '' }}
                            </td>
                            <td>
                                {{ $notizie->fine_visualizzazione ?? '' }}
                            </td>
                            <td>
                                {{ $notizie->visualizza_primapagina ?? '' }}
                            </td>
                            <td>
                                @foreach($notizie->file_pdf as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $notizie->link ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Notizie::AUTORIZZATI_SELECT[$notizie->autorizzati] ?? '' }}
                            </td>
                            <td>
                                @can('notizie_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.notizies.show', $notizie->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('notizie_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.notizies.edit', $notizie->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('notizie_delete')
                                    <form action="{{ route('admin.notizies.destroy', $notizie->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('notizie_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.notizies.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 4, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Notizie:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value
      table
        .column($(this).parent().index())
        .search(value, strict)
        .draw()
  });
})

</script>
@endsection