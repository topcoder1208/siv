@extends('layouts.admin')
@section('content')
@can('tecnologium_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tecnologia.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tecnologium.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tecnologium.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Tecnologium">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tecnologium.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tecnologium.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.tecnologium.fields.categoria') }}
                        </th>
                        <th>
                            {{ trans('cruds.tecnologium.fields.attivo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tecnologia as $key => $tecnologium)
                        <tr data-entry-id="{{ $tecnologium->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tecnologium->id ?? '' }}
                            </td>
                            <td>
                                {{ $tecnologium->nome ?? '' }}
                            </td>
                            <td>
                                {{ $tecnologium->categoria->nome ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $tecnologium->attivo ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $tecnologium->attivo ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('tecnologium_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tecnologia.show', $tecnologium->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tecnologium_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tecnologia.edit', $tecnologium->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tecnologium_delete')
                                    <form action="{{ route('admin.tecnologia.destroy', $tecnologium->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tecnologium_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tecnologia.massDestroy') }}",
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
  let table = $('.datatable-Tecnologium:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection