@can('gare_inserimento_dettagli_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.gare-inserimento-dettaglis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.gareInserimentoDettagli.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.gareInserimentoDettagli.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-garaGareInserimentoDettaglis">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.gareInserimentoDettagli.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimentoDettagli.fields.gara') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gareInserimentoDettaglis as $key => $gareInserimentoDettagli)
                        <tr data-entry-id="{{ $gareInserimentoDettagli->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $gareInserimentoDettagli->id ?? '' }}
                            </td>
                            <td>
                                {{ $gareInserimentoDettagli->gara->titiolo ?? '' }}
                            </td>
                            <td>
                                @can('gare_inserimento_dettagli_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.gare-inserimento-dettaglis.show', $gareInserimentoDettagli->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('gare_inserimento_dettagli_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.gare-inserimento-dettaglis.edit', $gareInserimentoDettagli->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('gare_inserimento_dettagli_delete')
                                    <form action="{{ route('admin.gare-inserimento-dettaglis.destroy', $gareInserimentoDettagli->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('gare_inserimento_dettagli_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.gare-inserimento-dettaglis.massDestroy') }}",
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
  let table = $('.datatable-garaGareInserimentoDettaglis:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection