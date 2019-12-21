@extends('layouts.admin')
@section('content')
<div class="content">
    @can('metum_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.meta.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.metum.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.metum.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Metum">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.metum.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.metum.fields.object') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.metum.fields.model') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.metum.fields.key') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.metum.fields.value') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($meta as $key => $metum)
                                    <tr data-entry-id="{{ $metum->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $metum->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $metum->object ?? '' }}
                                        </td>
                                        <td>
                                            {{ $metum->model ?? '' }}
                                        </td>
                                        <td>
                                            {{ $metum->key ?? '' }}
                                        </td>
                                        <td>
                                            {{ $metum->value ?? '' }}
                                        </td>
                                        <td>

                                            @can('metum_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.meta.edit', $metum->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('metum_delete')
                                                <form action="{{ route('admin.meta.destroy', $metum->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('metum_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.meta.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Metum:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection