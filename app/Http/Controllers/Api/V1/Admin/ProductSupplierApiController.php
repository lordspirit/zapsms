<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductSupplierRequest;
use App\Http\Requests\UpdateProductSupplierRequest;
use App\Http\Resources\Admin\ProductSupplierResource;
use App\Models\ProductSupplier;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductSupplierApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_supplier_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductSupplierResource(ProductSupplier::all());
    }

    public function store(StoreProductSupplierRequest $request)
    {
        $productSupplier = ProductSupplier::create($request->all());

        return (new ProductSupplierResource($productSupplier))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductSupplier $productSupplier)
    {
        abort_if(Gate::denies('product_supplier_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductSupplierResource($productSupplier);
    }

    public function update(UpdateProductSupplierRequest $request, ProductSupplier $productSupplier)
    {
        $productSupplier->update($request->all());

        return (new ProductSupplierResource($productSupplier))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductSupplier $productSupplier)
    {
        abort_if(Gate::denies('product_supplier_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productSupplier->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
