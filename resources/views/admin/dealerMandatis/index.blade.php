@extends('layouts.admin')
@section('content')
@can('dealer_mandati_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.dealer-mandatis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.dealerMandati.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.dealerMandati.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DealerMandati">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.dealerMandati.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerMandati.fields.brand') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerMandati.fields.inizio') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerMandati.fields.fine') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerMandati.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealerMandati.fields.id_dealer') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealer.fields.soggetto') }}
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\DealerMandati::STATUS_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($dealerMandatis as $key => $dealerMandati)
                        <tr data-entry-id="{{ $dealerMandati->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $dealerMandati->id ?? '' }}
                            </td>
                            <td>
                                {{ $dealerMandati->brand->name ?? '' }}
                            </td>
                            <td>
                                {{ $dealerMandati->inizio ?? '' }}
                            </td>
                            <td>
                                {{ $dealerMandati->fine ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\DealerMandati::STATUS_SELECT[$dealerMandati->status] ?? '' }}
                            </td>
                            <td>
                                {{ $dealerMandati->id_dealer->dealer ?? '' }}
                            </td>
                            <td>
                                {{ $dealerMandati->id_dealer->soggetto ?? '' }}
                            </td>
                            <td>
                                @can('dealer_mandati_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.dealer-mandatis.show', $dealerMandati->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('dealer_mandati_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.dealer-mandatis.edit', $dealerMandati->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('dealer_mandati_delete')
                                    <form action="{{ route('admin.dealer-mandatis.destroy', $dealerMandati->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('dealer_mandati_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.dealer-mandatis.massDestroy') }}",
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
  let table = $('.datatable-DealerMandati:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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