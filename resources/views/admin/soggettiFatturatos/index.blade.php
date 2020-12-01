@extends('layouts.admin')
@section('content')
@can('soggetti_fatturato_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.soggetti-fatturatos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.soggettiFatturato.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.soggettiFatturato.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SoggettiFatturato">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.soggettiFatturato.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiFatturato.fields.anno') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiFatturato.fields.mese') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiFatturato.fields.telefoni') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiFatturato.fields.card') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiFatturato.fields.servizi') }}
                        </th>
                        <th>
                            {{ trans('cruds.soggettiFatturato.fields.altro') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($soggettiFatturatos as $key => $soggettiFatturato)
                        <tr data-entry-id="{{ $soggettiFatturato->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $soggettiFatturato->id ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiFatturato->anno ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiFatturato->mese ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiFatturato->telefoni ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiFatturato->card ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiFatturato->servizi ?? '' }}
                            </td>
                            <td>
                                {{ $soggettiFatturato->altro ?? '' }}
                            </td>
                            <td>
                                @can('soggetti_fatturato_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.soggetti-fatturatos.show', $soggettiFatturato->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('soggetti_fatturato_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.soggetti-fatturatos.edit', $soggettiFatturato->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('soggetti_fatturato_delete')
                                    <form action="{{ route('admin.soggetti-fatturatos.destroy', $soggettiFatturato->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('soggetti_fatturato_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.soggetti-fatturatos.massDestroy') }}",
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
  let table = $('.datatable-SoggettiFatturato:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection