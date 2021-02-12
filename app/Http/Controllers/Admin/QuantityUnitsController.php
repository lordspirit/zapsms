<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuantityUnitRequest;
use App\Http\Requests\StoreQuantityUnitRequest;
use App\Http\Requests\UpdateQuantityUnitRequest;
use App\Models\QuantityUnit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class QuantityUnitsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('quantity_unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = QuantityUnit::query()->select(sprintf('%s.*', (new QuantityUnit)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'quantity_unit_show';
                $editGate      = 'quantity_unit_edit';
                $deleteGate    = 'quantity_unit_delete';
                $crudRoutePart = 'quantity-units';

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
            $table->editColumn('active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->active ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'active']);

            return $table->make(true);
        }

        return view('admin.quantityUnits.index');
    }

    public function create()
    {
        abort_if(Gate::denies('quantity_unit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.quantityUnits.create');
    }

    public function store(StoreQuantityUnitRequest $request)
    {
        $quantityUnit = QuantityUnit::create($request->all());

        return redirect()->route('admin.quantity-units.index');
    }

    public function edit(QuantityUnit $quantityUnit)
    {
        abort_if(Gate::denies('quantity_unit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.quantityUnits.edit', compact('quantityUnit'));
    }

    public function update(UpdateQuantityUnitRequest $request, QuantityUnit $quantityUnit)
    {
        $quantityUnit->update($request->all());

        return redirect()->route('admin.quantity-units.index');
    }

    public function show(QuantityUnit $quantityUnit)
    {
        abort_if(Gate::denies('quantity_unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.quantityUnits.show', compact('quantityUnit'));
    }

    public function destroy(QuantityUnit $quantityUnit)
    {
        abort_if(Gate::denies('quantity_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quantityUnit->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuantityUnitRequest $request)
    {
        QuantityUnit::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
