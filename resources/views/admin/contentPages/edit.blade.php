@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.contentPage.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.content-pages.update", [$contentPage->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label class="required" for="title">{{ trans('cruds.contentPage.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $contentPage->title) }}" required>
                            @if($errors->has('title'))
                                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentPage.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
                            <label for="categories">{{ trans('cruds.contentPage.fields.category') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="categories[]" id="categories" multiple>
                                @foreach($categories as $id => $category)
                                    <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || $contentPage->categories->contains($id)) ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('categories'))
                                <span class="help-block" role="alert">{{ $errors->first('categories') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentPage.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                            <label for="tags">{{ trans('cruds.contentPage.fields.tag') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="tags[]" id="tags" multiple>
                                @foreach($tags as $id => $tag)
                                    <option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || $contentPage->tags->contains($id)) ? 'selected' : '' }}>{{ $tag }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tags'))
                                <span class="help-block" role="alert">{{ $errors->first('tags') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentPage.fields.tag_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('page_text') ? 'has-error' : '' }}">
                            <label for="page_text">{{ trans('cruds.contentPage.fields.page_text') }}</label>
                            <textarea class="form-control ckeditor" name="page_text" id="page_text">{!! old('page_text', $contentPage->page_text) !!}</textarea>
                            @if($errors->has('page_text'))
                                <span class="help-block" role="alert">{{ $errors->first('page_text') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentPage.fields.page_text_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
                            <label for="excerpt">{{ trans('cruds.contentPage.fields.excerpt') }}</label>
                            <textarea class="form-control" name="excerpt" id="excerpt">{{ old('excerpt', $contentPage->excerpt) }}</textarea>
                            @if($errors->has('excerpt'))
                                <span class="help-block" role="alert">{{ $errors->first('excerpt') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentPage.fields.excerpt_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('featured_image') ? 'has-error' : '' }}">
                            <label for="featured_image">{{ trans('cruds.contentPage.fields.featured_image') }}</label>
                            <div class="needsclick dropzone" id="featured_image-dropzone">
                            </div>
                            @if($errors->has('featured_image'))
                                <span class="help-block" role="alert">{{ $errors->first('featured_image') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentPage.fields.featured_image_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                            <label for="slug">{{ trans('cruds.contentPage.fields.slug') }}</label>
                            <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug', $contentPage->slug) }}">
                            @if($errors->has('slug'))
                                <span class="help-block" role="alert">{{ $errors->first('slug') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentPage.fields.slug_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label for="user_id">{{ trans('cruds.contentPage.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ ($contentPage->user ? $contentPage->user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user_id'))
                                <span class="help-block" role="alert">{{ $errors->first('user_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentPage.fields.user_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.featuredImageDropzone = {
    url: '{{ route('admin.content-pages.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4086,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="featured_image"]').remove()
      $('form').append('<input type="hidden" name="featured_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="featured_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contentPage) && $contentPage->featured_image)
      var file = {!! json_encode($contentPage->featured_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $contentPage->featured_image->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="featured_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection