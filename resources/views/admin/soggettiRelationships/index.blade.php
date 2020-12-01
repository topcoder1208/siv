@extends('layouts.admin')
@section('content')
@can('soggetti_relationship_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.soggetti-relationships.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.soggettiRelationship.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.soggettiRelationship.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SoggettiRelationship">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.soggettiRelationship.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiRelationship.fields.brand') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiRelationship.fields.inizio') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiRelationship.fields.fine') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiRelationship.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiRelationship.fields.id_dealer') }}
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
                                @foreach(App\Models\SoggettiRelationship::STATUS_SELECT as $key => $item)
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
                    @foreach($soggettiRelationships as $key => $soggettiRelationship)
                        <tr data-entry-id="{{ $soggettiRelationship->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $soggettiRelationship->id ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiRelationship->brand->name ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiRelationship->inizio ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiRelationship->fine ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\SoggettiRelationship::STATUS_SELECT[$soggettiRelationship->status] ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiRelationship->id_dealer->dealer ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiRelationship->id_dealer->soggetto ?? '' }}
                            </td>
                            <td>
                                @can('soggetti_relationship_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.soggetti-relationships.show', $soggettiRelationship->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('soggetti_relationship_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.soggetti-relationships.edit', $soggettiRelationship->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('soggetti_relationship_delete')
                                    <form action="{{ route('admin.soggetti-relationships.destroy', $soggettiRelationship->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('soggetti_relationship_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.soggetti-relationships.massDestroy') }}",
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
  let table = $('.datatable-SoggettiRelationship:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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