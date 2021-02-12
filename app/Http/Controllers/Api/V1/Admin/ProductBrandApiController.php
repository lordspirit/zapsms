<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductBrandRequest;
use App\Http\Requests\UpdateProductBrandRequest;
use App\Http\Resources\Admin\ProductBrandResource;
use App\Models\ProductBrand;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductBrandApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductBrandResource(ProductBrand::all());
    }

    public function store(StoreProductBrandRequest $request)
    {
        $productBrand = ProductBrand::create($request->all());

        return (new ProductBrandResource($productBrand))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductBrand $productBrand)
    {
        abort_if(Gate::denies('product_brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductBrandResource($productBrand);
    }

    public function update(UpdateProductBrandRequest $request, ProductBrand $productBrand)
    {
        $productBrand->update($request->all());

        return (new ProductBrandResource($productBrand))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductBrand $productBrand)
    {
        abort_if(Gate::denies('product_brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productBrand->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
