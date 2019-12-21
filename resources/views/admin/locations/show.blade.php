@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.location.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.locations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $location->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $location->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.from_main_gate') }}
                                    </th>
                                    <td>
                                        {{ $location->from_main_gate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.longitude') }}
                                    </th>
                                    <td>
                                        {{ $location->longitude }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.latitude') }}
                                    </th>
                                    <td>
                                        {{ $location->latitude }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.locations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection