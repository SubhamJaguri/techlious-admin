@extends('layouts.admin')
@section('content')
<div class="content">
    @can('agent_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.agents.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.agent.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.agent.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Agent">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.agent.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agent.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agent.fields.phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agent.fields.address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agent.fields.facebook') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agent.fields.twitter') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agent.fields.instagram') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.agent.fields.type') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agents as $key => $agent)
                                    <tr data-entry-id="{{ $agent->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $agent->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agent->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agent->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agent->address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agent->facebook ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agent->twitter ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agent->instagram ?? '' }}
                                        </td>
                                        <td>
                                            {{ $agent->type ?? '' }}
                                        </td>
                                        <td>
                                            @can('agent_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.agents.show', $agent->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('agent_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.agents.edit', $agent->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('agent_delete')
                                                <form action="{{ route('admin.agents.destroy', $agent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('agent_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.agents.massDestroy') }}",
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
  $('.datatable-Agent:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection