@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.agent.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.agents.update", [$agent->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.agent.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $agent->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agent.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label class="required" for="phone">{{ trans('cruds.agent.fields.phone') }}</label>
                            <input class="form-control" type="number" name="phone" id="phone" value="{{ old('phone', $agent->phone) }}" step="1" required>
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agent.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label class="required" for="address">{{ trans('cruds.agent.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $agent->address) }}" required>
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agent.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                            <label for="facebook">{{ trans('cruds.agent.fields.facebook') }}</label>
                            <input class="form-control" type="text" name="facebook" id="facebook" value="{{ old('facebook', $agent->facebook) }}">
                            @if($errors->has('facebook'))
                                <span class="help-block" role="alert">{{ $errors->first('facebook') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agent.fields.facebook_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
                            <label for="twitter">{{ trans('cruds.agent.fields.twitter') }}</label>
                            <input class="form-control" type="text" name="twitter" id="twitter" value="{{ old('twitter', $agent->twitter) }}">
                            @if($errors->has('twitter'))
                                <span class="help-block" role="alert">{{ $errors->first('twitter') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agent.fields.twitter_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
                            <label for="instagram">{{ trans('cruds.agent.fields.instagram') }}</label>
                            <input class="form-control" type="text" name="instagram" id="instagram" value="{{ old('instagram', $agent->instagram) }}">
                            @if($errors->has('instagram'))
                                <span class="help-block" role="alert">{{ $errors->first('instagram') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agent.fields.instagram_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                            <label for="type">{{ trans('cruds.agent.fields.type') }}</label>
                            <input class="form-control" type="text" name="type" id="type" value="{{ old('type', $agent->type) }}">
                            @if($errors->has('type'))
                                <span class="help-block" role="alert">{{ $errors->first('type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.agent.fields.type_helper') }}</span>
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