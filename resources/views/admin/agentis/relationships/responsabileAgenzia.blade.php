@can('agenzium_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.agenzia.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.agenzium.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.agenzium.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-responsabileAgenzia">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.agenzium.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenzium.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenzium.fields.responsabile') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenzium.fields.provincia') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agenzia as $key => $agenzium)
                        <tr data-entry-id="{{ $agenzium->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $agenzium->id ?? '' }}
                            </td>
                            <td>
                                {{ $agenzium->nome ?? '' }}
                            </td>
                            <td>
                                @foreach($agenzium->responsabiles as $key => $item)
                                    <span class="badge badge-info">{{ $item->cognome }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $agenzium->provincia ?? '' }}
                            </td>
                            <td>
                                @can('agenzium_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.agenzia.show', $agenzium->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('agenzium_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.agenzia.edit', $agenzium->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('agenzium_delete')
                                    <form action="{{ route('admin.agenzia.destroy', $agenzium->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('agenzium_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.agenzia.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-responsabileAgenzia:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection