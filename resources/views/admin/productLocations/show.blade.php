@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productLocation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-locations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productLocation.fields.id') }}
                        </th>
                        <td>
                            {{ $productLocation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productLocation.fields.name') }}
                        </th>
                        <td>
                            {{ $productLocation->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productLocation.fields.description') }}
                        </th>
                        <td>
                            {{ $productLocation->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productLocation.fields.location') }}
                        </th>
                        <td>
                            {{ $productLocation->location->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-locations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#location_product_locations" role="tab" data-toggle="tab">
                {{ trans('cruds.productLocation.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="location_product_locations">
            @includeIf('admin.productLocations.relationships.locationProductLocations', ['productLocations' => $productLocation->locationProductLocations])
        </div>
    </div>
</div>

@endsection