@extends('layouts.admin')
@section('content')
@can('dealer_point_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.dealer-points.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.dealerPoint.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.dealerPoint.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DealerPoint">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.id_dealer') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealer.fields.indirizzo') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealer.fields.cap') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealer.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealer.fields.telefono') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealer.fields.conto_contabilita') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealer.fields.codice') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.conto_contabilita') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.codice') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.point') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.indirizzo') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.cap') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.citta') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.provincia') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.telefono') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerPoint.fields.created_at') }}
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
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($dealers as $key => $item)
                                    <option value="{{ $item->dealer }}">{{ $item->dealer }}</option>
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
                        </td>
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($citta as $key => $item)
                                    <option value="{{ $item->citta }}">{{ $item->citta }}</option>
                                @endforeach
                            </select>
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dealerPoints as $key => $dealerPoint)
                        <tr data-entry-id="{{ $dealerPoint->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $dealerPoint->id ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->id_dealer->dealer ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->id_dealer->indirizzo ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->id_dealer->cap ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->id_dealer->email ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->id_dealer->telefono ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->id_dealer->conto_contabilita ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->id_dealer->codice ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->conto_contabilita ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->codice ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->point ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->indirizzo ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->cap ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->citta->citta ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->provincia->provincia ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->email ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->telefono ?? '' }}
                            </td>
                            <td>
                                {{ $dealerPoint->created_at ?? '' }}
                            </td>
                            <td>
                                @can('dealer_point_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.dealer-points.show', $dealerPoint->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('dealer_point_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.dealer-points.edit', $dealerPoint->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('dealer_point_delete')
                                    <form action="{{ route('admin.dealer-points.destroy', $dealerPoint->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('dealer_point_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.dealer-points.massDestroy') }}",
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
    order: [[ 11, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-DealerPoint:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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