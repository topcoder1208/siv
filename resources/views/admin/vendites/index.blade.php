@extends('layouts.admin')
@section('content')
@can('vendite_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.vendites.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.vendite.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.vendite.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Vendite">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.vendite.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendite.fields.data_inserimento') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendite.fields.ora_inserimento') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendite.fields.operatore') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendite.fields.servizio') }}
                        </th>
                        <th>
                            {{ trans('cruds.offerte.fields.tipologia') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendite.fields.quantita') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendite.fields.id_agente') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenti.fields.agente') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendite.fields.id_point') }}
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
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($offertes as $key => $item)
                                    <option value="{{ $item->nome }}">{{ $item->nome }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($agentis as $key => $item)
                                    <option value="{{ $item->agente }}">{{ $item->agente }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($dealer_points as $key => $item)
                                    <option value="{{ $item->conto_contabilita }}">{{ $item->conto_contabilita }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vendites as $key => $vendite)
                        <tr data-entry-id="{{ $vendite->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $vendite->id ?? '' }}
                            </td>
                            <td>
                                {{ $vendite->data_inserimento ?? '' }}
                            </td>
                            <td>
                                {{ $vendite->ora_inserimento ?? '' }}
                            </td>
                            <td>
                                {{ $vendite->operatore ?? '' }}
                            </td>
                            <td>
                                {{ $vendite->servizio->nome ?? '' }}
                            </td>
                            <td>
                                @if($vendite->servizio)
                                    {{ $vendite->servizio::TIPOLOGIA_SELECT[$vendite->servizio->tipologia] ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $vendite->quantita ?? '' }}
                            </td>
                            <td>
                                {{ $vendite->id_agente->agente ?? '' }}
                            </td>
                            <td>
                                {{ $vendite->id_agente->agente ?? '' }}
                            </td>
                            <td>
                                {{ $vendite->id_point->conto_contabilita ?? '' }}
                            </td>
                            <td>
                                @can('vendite_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.vendites.show', $vendite->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('vendite_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.vendites.edit', $vendite->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('vendite_delete')
                                    <form action="{{ route('admin.vendites.destroy', $vendite->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('vendite_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.vendites.massDestroy') }}",
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
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Vendite:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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