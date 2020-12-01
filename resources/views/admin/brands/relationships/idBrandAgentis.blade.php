@can('agenti_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.agentis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.agenti.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.agenti.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-idBrandAgentis">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.agenti.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenti.fields.id_brand') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenti.fields.codice') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenti.fields.agente') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenti.fields.conto_contabilita') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenti.fields.indirizzo') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenti.fields.cap') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenti.fields.citta') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenti.fields.provincia') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenti.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenti.fields.telefono') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenti.fields.agenzia_responsabile') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenti.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agentis as $key => $agenti)
                        <tr data-entry-id="{{ $agenti->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $agenti->id ?? '' }}
                            </td>
                            <td>
                                {{ $agenti->id_brand->name ?? '' }}
                            </td>
                            <td>
                                {{ $agenti->codice ?? '' }}
                            </td>
                            <td>
                                {{ $agenti->agente ?? '' }}
                            </td>
                            <td>
                                {{ $agenti->conto_contabilita ?? '' }}
                            </td>
                            <td>
                                {{ $agenti->indirizzo ?? '' }}
                            </td>
                            <td>
                                {{ $agenti->cap ?? '' }}
                            </td>
                            <td>
                                {{ $agenti->citta->citta ?? '' }}
                            </td>
                            <td>
                                {{ $agenti->provincia->provincia ?? '' }}
                            </td>
                            <td>
                                {{ $agenti->email ?? '' }}
                            </td>
                            <td>
                                {{ $agenti->telefono ?? '' }}
                            </td>
                            <td>
                                {{ $agenti->agenzia_responsabile ?? '' }}
                            </td>
                            <td>
                                {{ $agenti->created_at ?? '' }}
                            </td>
                            <td>
                                @can('agenti_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.agentis.show', $agenti->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('agenti_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.agentis.edit', $agenti->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('agenti_delete')
                                    <form action="{{ route('admin.agentis.destroy', $agenti->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('agenti_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.agentis.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-idBrandAgentis:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection