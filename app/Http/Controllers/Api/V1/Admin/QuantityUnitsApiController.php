<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuantityUnitRequest;
use App\Http\Requests\UpdateQuantityUnitRequest;
use App\Http\Resources\Admin\QuantityUnitResource;
use App\Models\QuantityUnit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuantityUnitsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('quantity_unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuantityUnitResource(QuantityUnit::all());
    }

    public function store(StoreQuantityUnitRequest $request)
    {
        $quantityUnit = QuantityUnit::create($request->all());

        return (new QuantityUnitResource($quantityUnit))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(QuantityUnit $quantityUnit)
    {
        abort_if(Gate::denies('quantity_unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuantityUnitResource($quantityUnit);
    }

    public function update(UpdateQuantityUnitRequest $request, QuantityUnit $quantityUnit)
    {
        $quantityUnit->update($request->all());

        return (new QuantityUnitResource($quantityUnit))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(QuantityUnit $quantityUnit)
    {
        abort_if(Gate::denies('quantity_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quantityUnit->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
