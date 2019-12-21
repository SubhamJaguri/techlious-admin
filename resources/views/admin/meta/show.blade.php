@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.metum.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.meta.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.metum.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $metum->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.metum.fields.object') }}
                                    </th>
                                    <td>
                                        {{ $metum->object }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.metum.fields.model') }}
                                    </th>
                                    <td>
                                        {{ $metum->model }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.metum.fields.key') }}
                                    </th>
                                    <td>
                                        {{ $metum->key }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.metum.fields.value') }}
                                    </th>
                                    <td>
                                        {{ $metum->value }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.meta.index') }}">
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