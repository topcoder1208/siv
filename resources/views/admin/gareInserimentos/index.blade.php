@extends('layouts.admin')
@section('content')
@can('gare_inserimento_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            @if(request()->is("admin/gare-inserimentos/target") || request()->is("admin/gare-inserimentos/target*"))
                <a class="btn btn-success" href="{{ route('admin.gare-inserimentos.target.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.gareInserimento.title_singular') }}
                </a>
            @elseif(request()->is("admin/gare-inserimentos/fascia") || request()->is("admin/gare-inserimentos/fascia*"))
                <a class="btn btn-success" href="{{ route('admin.gare-inserimentos.fascia.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.gareInserimento.title_singular') }}
                </a>
            @endif

        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.gareInserimento.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-GareInserimento">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.titolo') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.tipologia_gara') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.validita_inizio') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.validita_fine') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.brand_tipologia') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.visibilita') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.esito') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.esito_incremento') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.esito_decremento') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.esito_negativo') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.numero_fasce_previste') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.servizi') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.metodo_attribuzione') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.metodo_calcolo') }}
                        </th>
                        <th>
                            {{ trans('cruds.gareInserimento.fields.metodo_famiglia') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search form-control">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($categories as $key => $item)
                                    <option value="{{ $item->nome }}">{{ $item->nome }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search form-control">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($soggetti_tipologia as $key => $item)
                                    <option value="{{ $item->tipologia }}">{{ $item->tipologia }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search form-control" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\GareInserimento::ESITO_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search form-control">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($offertes as $key => $item)
                                    <option value="{{ $item->nome }}">{{ $item->nome }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search form-control" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\GareInserimento::METODO_CALCOLO_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search form-control" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\GareInserimento::METODO_FAMIGLIA_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gareInserimentos as $key => $gareInserimento)
                        <tr data-entry-id="{{ $gareInserimento->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $gareInserimento->id ?? '' }}
                            </td>
                            <td>
                                {{ $gareInserimento->titolo ?? '' }}
                            </td>
                            <td>
                                {{ $gareInserimento->tipologia_gara ?? '' }}
                            </td>
                            <td>
                                {{ $gareInserimento->validita_inizio ?? '' }}
                            </td>
                            <td>
                                {{ $gareInserimento->validita_fine ?? '' }}
                            </td>
                            <td>
                                @foreach($gareInserimento->brand_tipologias as $key => $item)
                                    <span class="badge badge-info">{{ $item->nome }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($gareInserimento->visibilitas as $key => $item)
                                    <span class="badge badge-info">{{ $item->tipologia }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ App\Models\GareInserimento::ESITO_RADIO[$gareInserimento->esito] ?? '' }}
                            </td>
                            <td>
                                {{ $gareInserimento->esito_incremento ?? '' }}
                            </td>
                            <td>
                                {{ $gareInserimento->esito_decremento ?? '' }}
                            </td>
                            <td>
                                @foreach($gareInserimento->esito_negativos as $key => $item)
                                    <span class="badge badge-info">{{ $item->nome }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $gareInserimento->numero_fasce_previste ?? '' }}
                            </td>
                            <td>
                                {{ $gareInserimento->servizi ?? '' }}
                            </td>
                            <td>
                                {{ $gareInserimento->metodo_attribuzione ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\GareInserimento::METODO_CALCOLO_RADIO[$gareInserimento->metodo_calcolo] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\GareInserimento::METODO_FAMIGLIA_RADIO[$gareInserimento->metodo_famiglia] ?? '' }}
                            </td>
                            <td>
                                <!-- @can('gare_inserimento_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.gare-inserimentos.show', $gareInserimento->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan -->

                                @if(request()->is("admin/gare-inserimentos/target") || request()->is("admin/gare-inserimentos/target*"))
                                    @can('gare_inserimento_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.gare-inserimentos.target.edit', $gareInserimento->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                @elseif(request()->is("admin/gare-inserimentos/fascia") || request()->is("admin/gare-inserimentos/fascia*"))
                                    @can('gare_inserimento_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.gare-inserimentos.fascia.edit', $gareInserimento->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                @endif

                                @can('gare_inserimento_delete')
                                    <form action="{{ route('admin.gare-inserimentos.destroy', $gareInserimento->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('gare_inserimento_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.gare-inserimentos.massDestroy') }}",
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
    order: [[ 4, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-GareInserimento:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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