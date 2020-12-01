@can('soggetti_agenti_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.soggetti-agentis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.soggettiAgenti.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.soggettiAgenti.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-idSoggettoPointSoggettiAgentis">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.soggettiAgenti.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiAgenti.fields.id_brand') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiAgenti.fields.agente') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiAgenti.fields.indirizzo') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiAgenti.fields.cap') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiAgenti.fields.citta') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiAgenti.fields.provincia') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiAgenti.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiAgenti.fields.telefono') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiAgenti.fields.agenzia_responsabile') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiAgenti.fields.id_soggetto_point') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiAgenti.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($soggettiAgentis as $key => $soggettiAgenti)
                        <tr data-entry-id="{{ $soggettiAgenti->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $soggettiAgenti->id ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiAgenti->id_brand->name ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiAgenti->agente ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiAgenti->indirizzo ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiAgenti->cap ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiAgenti->citta->citta ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiAgenti->provincia->provincia ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiAgenti->email ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiAgenti->telefono ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiAgenti->agenzia_responsabile ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiAgenti->id_soggetto_point->soggetto ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiAgenti->created_at ?? '' }}
                            </td>
                            <td>
                                @can('soggetti_agenti_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.soggetti-agentis.show', $soggettiAgenti->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('soggetti_agenti_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.soggetti-agentis.edit', $soggettiAgenti->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('soggetti_agenti_delete')
                                    <form action="{{ route('admin.soggetti-agentis.destroy', $soggettiAgenti->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('soggetti_agenti_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.soggetti-agentis.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-idSoggettoPointSoggettiAgentis:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection