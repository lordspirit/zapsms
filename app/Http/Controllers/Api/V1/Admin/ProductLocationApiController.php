<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductLocationRequest;
use App\Http\Requests\UpdateProductLocationRequest;
use App\Http\Resources\Admin\ProductLocationResource;
use App\Models\ProductLocation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductLocationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductLocationResource(ProductLocation::with(['location'])->get());
    }

    public function store(StoreProductLocationRequest $request)
    {
        $productLocation = ProductLocation::create($request->all());

        return (new ProductLocationResource($productLocation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductLocation $productLocation)
    {
        abort_if(Gate::denies('product_location_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductLocationResource($productLocation->load(['location']));
    }

    public function update(UpdateProductLocationRequest $request, ProductLocation $productLocation)
    {
        $productLocation->update($request->all());

        return (new ProductLocationResource($productLocation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductLocation $productLocation)
    {
        abort_if(Gate::denies('product_location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productLocation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
