@extends('layouts.admin')
@section('content')
@can('cittum_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.citta.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.cittum.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.cittum.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Cittum">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.cittum.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.cittum.fields.cap') }}
                        </th>
                        <th>
                            {{ trans('cruds.cittum.fields.citta') }}
                        </th>
                        <th>
                            {{ trans('cruds.cittum.fields.provincia') }}
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($provinces as $key => $item)
                                    <option value="{{ $item->provincia }}">{{ $item->provincia }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($citta as $key => $cittum)
                        <tr data-entry-id="{{ $cittum->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $cittum->id ?? '' }}
                            </td>
                            <td>
                                {{ $cittum->cap ?? '' }}
                            </td>
                            <td>
                                {{ $cittum->citta ?? '' }}
                            </td>
                            <td>
                                {{ $cittum->provincia->provincia ?? '' }}
                            </td>
                            <td>
                                @can('cittum_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.citta.show', $cittum->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('cittum_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.citta.edit', $cittum->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('cittum_delete')
                                    <form action="{{ route('admin.citta.destroy', $cittum->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('cittum_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.citta.massDestroy') }}",
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
    order: [[ 3, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Cittum:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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