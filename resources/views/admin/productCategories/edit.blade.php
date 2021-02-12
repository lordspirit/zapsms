@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-categories.update", [$productCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.productCategory.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $productCategory->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productCategory.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.productCategory.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $productCategory->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productCategory.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subcategory_id">{{ trans('cruds.productCategory.fields.subcategory') }}</label>
                <select class="form-control select2 {{ $errors->has('subcategory') ? 'is-invalid' : '' }}" name="subcategory_id" id="subcategory_id">
                    @foreach($subcategories as $id => $subcategory)
                        <option value="{{ $id }}" {{ (old('subcategory_id') ? old('subcategory_id') : $productCategory->subcategory->id ?? '') == $id ? 'selected' : '' }}>{{ $subcategory }}</option>
                    @endforeach
                </select>
                @if($errors->has('subcategory'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subcategory') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productCategory.fields.subcategory_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ $productCategory->active || old('active', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="active">{{ trans('cruds.productCategory.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productCategory.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection