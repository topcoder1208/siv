@can('offerte_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.offertes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.offerte.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.offerte.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-brandOffertes">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.offerte.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.offerte.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.offerte.fields.inizio_validita') }}
                        </th>
                        <th>
                            {{ trans('cruds.offerte.fields.fine_validita') }}
                        </th>
                        <th>
                            {{ trans('cruds.offerte.fields.brand') }}
                        </th>
                        <th>
                            {{ trans('cruds.offerte.fields.tipologia') }}
                        </th>
                        <th>
                            {{ trans('cruds.offerte.fields.tecnologia') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($offertes as $key => $offerte)
                        <tr data-entry-id="{{ $offerte->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $offerte->id ?? '' }}
                            </td>
                            <td>
                                {{ $offerte->nome ?? '' }}
                            </td>
                            <td>
                                {{ $offerte->inizio_validita ?? '' }}
                            </td>
                            <td>
                                {{ $offerte->fine_validita ?? '' }}
                            </td>
                            <td>
                                {{ $offerte->brand->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Offerte::TIPOLOGIA_SELECT[$offerte->tipologia] ?? '' }}
                            </td>
                            <td>
                                {{ $offerte->tecnologia->nome ?? '' }}
                            </td>
                            <td>
                                @can('offerte_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.offertes.show', $offerte->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('offerte_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.offertes.edit', $offerte->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('offerte_delete')
                                    <form action="{{ route('admin.offertes.destroy', $offerte->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('offerte_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.offertes.massDestroy') }}",
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
  let table = $('.datatable-brandOffertes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection