@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.unit.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.units.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="unit_name">{{ trans('cruds.unit.fields.unit_name') }}</label>
                <input class="form-control {{ $errors->has('unit_name') ? 'is-invalid' : '' }}" type="text" name="unit_name" id="unit_name" value="{{ old('unit_name', '') }}" required>
                @if($errors->has('unit_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.unit_name_helper') }}</span>
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