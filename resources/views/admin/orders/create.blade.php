@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.orders.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('product') ? 'has-error' : '' }}">
                            <label class="required" for="product_id">{{ trans('cruds.order.fields.product') }}</label>
                            <select class="form-control select2" name="product_id" id="product_id" required>
                                @foreach($products as $id => $product)
                                    <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $product }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_id'))
                                <span class="help-block" role="alert">{{ $errors->first('product_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.product_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label class="required" for="user_id">{{ trans('cruds.order.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user_id'))
                                <span class="help-block" role="alert">{{ $errors->first('user_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label class="required" for="price">{{ trans('cruds.order.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" required>
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_valid') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_valid" value="0">
                                <input type="checkbox" name="is_valid" id="is_valid" value="1" {{ old('is_valid', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_valid" style="font-weight: 400">{{ trans('cruds.order.fields.is_valid') }}</label>
                            </div>
                            @if($errors->has('is_valid'))
                                <span class="help-block" role="alert">{{ $errors->first('is_valid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.is_valid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('valid_from') ? 'has-error' : '' }}">
                            <label for="valid_from">{{ trans('cruds.order.fields.valid_from') }}</label>
                            <input class="form-control datetime" type="text" name="valid_from" id="valid_from" value="{{ old('valid_from') }}">
                            @if($errors->has('valid_from'))
                                <span class="help-block" role="alert">{{ $errors->first('valid_from') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.valid_from_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('valid_till') ? 'has-error' : '' }}">
                            <label for="valid_till">{{ trans('cruds.order.fields.valid_till') }}</label>
                            <input class="form-control datetime" type="text" name="valid_till" id="valid_till" value="{{ old('valid_till') }}">
                            @if($errors->has('valid_till'))
                                <span class="help-block" role="alert">{{ $errors->first('valid_till') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.valid_till_helper') }}</span>
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