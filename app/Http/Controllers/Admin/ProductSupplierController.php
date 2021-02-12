<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductSupplierRequest;
use App\Http\Requests\StoreProductSupplierRequest;
use App\Http\Requests\UpdateProductSupplierRequest;
use App\Models\ProductSupplier;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductSupplierController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('product_supplier_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ProductSupplier::query()->select(sprintf('%s.*', (new ProductSupplier)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'product_supplier_show';
                $editGate      = 'product_supplier_edit';
                $deleteGate    = 'product_supplier_delete';
                $crudRoutePart = 'product-suppliers';

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

        return view('admin.productSuppliers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('product_supplier_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productSuppliers.create');
    }

    public function store(StoreProductSupplierRequest $request)
    {
        $productSupplier = ProductSupplier::create($request->all());

        return redirect()->route('admin.product-suppliers.index');
    }

    public function edit(ProductSupplier $productSupplier)
    {
        abort_if(Gate::denies('product_supplier_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productSuppliers.edit', compact('productSupplier'));
    }

    public function update(UpdateProductSupplierRequest $request, ProductSupplier $productSupplier)
    {
        $productSupplier->update($request->all());

        return redirect()->route('admin.product-suppliers.index');
    }

    public function show(ProductSupplier $productSupplier)
    {
        abort_if(Gate::denies('product_supplier_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productSuppliers.show', compact('productSupplier'));
    }

    public function destroy(ProductSupplier $productSupplier)
    {
        abort_if(Gate::denies('product_supplier_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productSupplier->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductSupplierRequest $request)
    {
        ProductSupplier::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
