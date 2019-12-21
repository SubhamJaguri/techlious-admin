@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.location.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.locations.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.location.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.location.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('from_main_gate') ? 'has-error' : '' }}">
                            <label for="from_main_gate">{{ trans('cruds.location.fields.from_main_gate') }}</label>
                            <input class="form-control" type="number" name="from_main_gate" id="from_main_gate" value="{{ old('from_main_gate') }}" step="0.01">
                            @if($errors->has('from_main_gate'))
                                <span class="help-block" role="alert">{{ $errors->first('from_main_gate') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.location.fields.from_main_gate_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('longitude') ? 'has-error' : '' }}">
                            <label for="longitude">{{ trans('cruds.location.fields.longitude') }}</label>
                            <input class="form-control" type="number" name="longitude" id="longitude" value="{{ old('longitude') }}" step="0.01">
                            @if($errors->has('longitude'))
                                <span class="help-block" role="alert">{{ $errors->first('longitude') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.location.fields.longitude_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
                            <label for="latitude">{{ trans('cruds.location.fields.latitude') }}</label>
                            <input class="form-control" type="text" name="latitude" id="latitude" value="{{ old('latitude', '') }}">
                            @if($errors->has('latitude'))
                                <span class="help-block" role="alert">{{ $errors->first('latitude') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.location.fields.latitude_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection