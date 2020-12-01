@extends('layouts.admin')
@section('content')
@can('inserimento_soglie_range_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.inserimento-soglie-ranges.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.inserimentoSoglieRange.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.inserimentoSoglieRange.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-InserimentoSoglieRange">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.inserimentoSoglieRange.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.inserimentoSoglieRange.fields.gara') }}
                        </th>
                        <th>
                            {{ trans('cruds.inserimentoSoglieRange.fields.percentuale') }}
                        </th>
                        <th>
                            {{ trans('cruds.inserimentoSoglieRange.fields.soglia_minima') }}
                        </th>
                        <th>
                            {{ trans('cruds.inserimentoSoglieRange.fields.soglia_massima') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inserimentoSoglieRanges as $key => $inserimentoSoglieRange)
                        <tr data-entry-id="{{ $inserimentoSoglieRange->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $inserimentoSoglieRange->id ?? '' }}
                            </td>
                            <td>
                                {{ $inserimentoSoglieRange->gara->titolo ?? '' }}
                            </td>
                            <td>
                                {{ $inserimentoSoglieRange->percentuale ?? '' }}
                            </td>
                            <td>
                                {{ $inserimentoSoglieRange->soglia_minima ?? '' }}
                            </td>
                            <td>
                                {{ $inserimentoSoglieRange->soglia_massima ?? '' }}
                            </td>
                            <td>
                                @can('inserimento_soglie_range_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.inserimento-soglie-ranges.show', $inserimentoSoglieRange->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('inserimento_soglie_range_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.inserimento-soglie-ranges.edit', $inserimentoSoglieRange->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('inserimento_soglie_range_delete')
                                    <form action="{{ route('admin.inserimento-soglie-ranges.destroy', $inserimentoSoglieRange->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('inserimento_soglie_range_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.inserimento-soglie-ranges.massDestroy') }}",
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
  let table = $('.datatable-InserimentoSoglieRange:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection