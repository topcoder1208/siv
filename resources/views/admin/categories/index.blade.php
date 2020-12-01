@extends('layouts.admin')
@section('content')
@can('categorie_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.categories.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.categorie.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.categorie.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Categorie">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.categorie.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.categorie.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.categorie.fields.tipologia') }}
                        </th>
                        <th>
                            {{ trans('cruds.categorie.fields.attivo') }}
                        </th>
                        <th>
                            {{ trans('cruds.categorie.fields.brand') }}
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Categorie::TIPOLOGIA_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key => $categorie)
                        <tr data-entry-id="{{ $categorie->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $categorie->id ?? '' }}
                            </td>
                            <td>
                                {{ $categorie->nome ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Categorie::TIPOLOGIA_SELECT[$categorie->tipologia] ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $categorie->attivo ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $categorie->attivo ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $categorie->brand->name ?? '' }}
                            </td>
                            <td>
                                @can('categorie_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.categories.show', $categorie->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('categorie_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.categories.edit', $categorie->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('categorie_delete')
                                    <form action="{{ route('admin.categories.destroy', $categorie->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('categorie_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.categories.massDestroy') }}",
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
  let table = $('.datatable-Categorie:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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