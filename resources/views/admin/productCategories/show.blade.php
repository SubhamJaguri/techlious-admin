@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.productCategory.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.product-categories.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.productCategory.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $productCategory->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.productCategory.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $productCategory->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.productCategory.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $productCategory->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.productCategory.fields.photo') }}
                                    </th>
                                    <td>
                                        @if($productCategory->photo)
                                            <a href="{{ $productCategory->photo->getUrl() }}" target="_blank">
                                                <img src="{{ $productCategory->photo->getUrl('thumb') }}" width="50px" height="50px">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.productCategory.fields.slug') }}
                                    </th>
                                    <td>
                                        {{ $productCategory->slug }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.product-categories.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#category_products" aria-controls="category_products" role="tab" data-toggle="tab">
                            {{ trans('cruds.product.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="category_products">
                        @includeIf('admin.productCategories.relationships.categoryProducts', ['products' => $productCategory->categoryProducts])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection