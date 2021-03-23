<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySublocationRequest;
use App\Http\Requests\StoreSublocationRequest;
use App\Http\Requests\UpdateSublocationRequest;
use App\Models\Location;
use App\Models\Sublocation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SublocationController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('sublocation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Sublocation::with(['location'])->select(sprintf('%s.*', (new Sublocation)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'sublocation_show';
                $editGate      = 'sublocation_edit';
                $deleteGate    = 'sublocation_delete';
                $crudRoutePart = 'sublocations';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->addColumn('location_name', function ($row) {
                return $row->location ? $row->location->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'location']);

            return $table->make(true);
        }

        $locations = Location::get();

        return view('admin.sublocations.index', compact('locations'));
    }

    public function create()
    {
        abort_if(Gate::denies('sublocation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sublocations.create', compact('locations'));
    }

    public function store(StoreSublocationRequest $request)
    {
        $sublocation = Sublocation::create($request->all());

        return redirect()->route('admin.sublocations.index');
    }

    public function edit(Sublocation $sublocation)
    {
        abort_if(Gate::denies('sublocation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sublocation->load('location');

        return view('admin.sublocations.edit', compact('locations', 'sublocation'));
    }

    public function update(UpdateSublocationRequest $request, Sublocation $sublocation)
    {
        $sublocation->update($request->all());

        return redirect()->route('admin.sublocations.index');
    }

    public function show(Sublocation $sublocation)
    {
        abort_if(Gate::denies('sublocation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sublocation->load('location');

        return view('admin.sublocations.show', compact('sublocation'));
    }

    public function destroy(Sublocation $sublocation)
    {
        abort_if(Gate::denies('sublocation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sublocation->delete();

        return back();
    }

    public function massDestroy(MassDestroySublocationRequest $request)
    {
        Sublocation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
