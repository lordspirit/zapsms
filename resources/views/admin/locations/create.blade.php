@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.location.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.locations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.location.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="location_name_id">{{ trans('cruds.location.fields.location_name') }}</label>
                <select class="form-control select2 {{ $errors->has('location_name') ? 'is-invalid' : '' }}" name="location_name_id" id="location_name_id" required>
                    @foreach($location_names as $id => $location_name)
                        <option value="{{ $id }}" {{ old('location_name_id') == $id ? 'selected' : '' }}>{{ $location_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('location_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.location_name_helper') }}</span>
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