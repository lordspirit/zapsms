<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSublocationRequest;
use App\Http\Requests\UpdateSublocationRequest;
use App\Http\Resources\Admin\SublocationResource;
use App\Models\Sublocation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SublocationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sublocation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SublocationResource(Sublocation::with(['locations'])->get());
    }

    public function store(StoreSublocationRequest $request)
    {
        $sublocation = Sublocation::create($request->all());
        $sublocation->locations()->sync($request->input('locations', []));

        return (new SublocationResource($sublocation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Sublocation $sublocation)
    {
        abort_if(Gate::denies('sublocation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SublocationResource($sublocation->load(['locations']));
    }

    public function update(UpdateSublocationRequest $request, Sublocation $sublocation)
    {
        $sublocation->update($request->all());
        $sublocation->locations()->sync($request->input('locations', []));

        return (new SublocationResource($sublocation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Sublocation $sublocation)
    {
        abort_if(Gate::denies('sublocation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sublocation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
