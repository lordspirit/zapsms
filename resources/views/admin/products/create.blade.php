@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.product.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="categories">{{ trans('cruds.product.fields.category') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories" multiple required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ in_array($id, old('categories', [])) ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categories') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="locations">{{ trans('cruds.product.fields.location') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('locations') ? 'is-invalid' : '' }}" name="locations[]" id="locations" multiple required>
                    @foreach($locations as $id => $location)
                        <option value="{{ $id }}" {{ in_array($id, old('locations', [])) ? 'selected' : '' }}>{{ $location }}</option>
                    @endforeach
                </select>
                @if($errors->has('locations'))
                    <div class="invalid-feedback">
                        {{ $errors->first('locations') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tags">{{ trans('cruds.product.fields.tag') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple>
                    @foreach($tags as $id => $tag)
                        <option value="{{ $id }}" {{ in_array($id, old('tags', [])) ? 'selected' : '' }}>{{ $tag }}</option>
                    @endforeach
                </select>
                @if($errors->has('tags'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.tag_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.product.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '1') }}" step="0.01">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="units_id">{{ trans('cruds.product.fields.units') }}</label>
                <select class="form-control select2 {{ $errors->has('units') ? 'is-invalid' : '' }}" name="units_id" id="units_id">
                    @foreach($units as $id => $units)
                        <option value="{{ $id }}" {{ old('units_id') == $id ? 'selected' : '' }}>{{ $units }}</option>
                    @endforeach
                </select>
                @if($errors->has('units'))
                    <div class="invalid-feedback">
                        {{ $errors->first('units') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.units_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ipaddress">{{ trans('cruds.product.fields.ipaddress') }}</label>
                <input class="form-control {{ $errors->has('ipaddress') ? 'is-invalid' : '' }}" type="text" name="ipaddress" id="ipaddress" value="{{ old('ipaddress', '0.0.0.0') }}">
                @if($errors->has('ipaddress'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ipaddress') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.ipaddress_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="serialnumber">{{ trans('cruds.product.fields.serialnumber') }}</label>
                <input class="form-control {{ $errors->has('serialnumber') ? 'is-invalid' : '' }}" type="text" name="serialnumber" id="serialnumber" value="{{ old('serialnumber', '') }}">
                @if($errors->has('serialnumber'))
                    <div class="invalid-feedback">
                        {{ $errors->first('serialnumber') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.serialnumber_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="status" id="status" value="1" required {{ old('status', 0) == 1 || old('status') === null ? 'checked' : '' }}>
                    <label class="required form-check-label" for="status">{{ trans('cruds.product.fields.status') }}</label>
                </div>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.status_helper') }}</span>
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