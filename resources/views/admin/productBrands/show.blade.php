@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productBrand.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-brands.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productBrand.fields.id') }}
                        </th>
                        <td>
                            {{ $productBrand->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productBrand.fields.name') }}
                        </th>
                        <td>
                            {{ $productBrand->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productBrand.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $productBrand->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-brands.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection