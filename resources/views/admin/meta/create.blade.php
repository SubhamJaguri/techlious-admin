@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.metum.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.meta.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('object') ? 'has-error' : '' }}">
                            <label for="object">{{ trans('cruds.metum.fields.object') }}</label>
                            <input class="form-control" type="number" name="object" id="object" value="{{ old('object') }}" step="1">
                            @if($errors->has('object'))
                                <span class="help-block" role="alert">{{ $errors->first('object') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.metum.fields.object_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('model') ? 'has-error' : '' }}">
                            <label for="model">{{ trans('cruds.metum.fields.model') }}</label>
                            <input class="form-control" type="text" name="model" id="model" value="{{ old('model', '') }}">
                            @if($errors->has('model'))
                                <span class="help-block" role="alert">{{ $errors->first('model') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.metum.fields.model_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                            <label class="required" for="key">{{ trans('cruds.metum.fields.key') }}</label>
                            <input class="form-control" type="text" name="key" id="key" value="{{ old('key', '') }}" required>
                            @if($errors->has('key'))
                                <span class="help-block" role="alert">{{ $errors->first('key') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.metum.fields.key_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
                            <label class="required" for="value">{{ trans('cruds.metum.fields.value') }}</label>
                            <input class="form-control" type="text" name="value" id="value" value="{{ old('value', '') }}" required>
                            @if($errors->has('value'))
                                <span class="help-block" role="alert">{{ $errors->first('value') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.metum.fields.value_helper') }}</span>
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