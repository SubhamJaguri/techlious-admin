@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.agent.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.agents.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agent.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $agent->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agent.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $agent->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agent.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $agent->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agent.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $agent->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agent.fields.facebook') }}
                                    </th>
                                    <td>
                                        {{ $agent->facebook }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agent.fields.twitter') }}
                                    </th>
                                    <td>
                                        {{ $agent->twitter }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agent.fields.instagram') }}
                                    </th>
                                    <td>
                                        {{ $agent->instagram }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.agent.fields.type') }}
                                    </th>
                                    <td>
                                        {{ $agent->type }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.agents.index') }}">
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