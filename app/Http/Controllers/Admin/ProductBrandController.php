<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductBrandRequest;
use App\Http\Requests\StoreProductBrandRequest;
use App\Http\Requests\UpdateProductBrandRequest;
use App\Models\ProductBrand;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductBrandController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('product_brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ProductBrand::query()->select(sprintf('%s.*', (new ProductBrand)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'product_brand_show';
                $editGate      = 'product_brand_edit';
                $deleteGate    = 'product_brand_delete';
                $crudRoutePart = 'product-brands';

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

        return view('admin.productBrands.index');
    }

    public function create()
    {
        abort_if(Gate::denies('product_brand_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productBrands.create');
    }

    public function store(StoreProductBrandRequest $request)
    {
        $productBrand = ProductBrand::create($request->all());

        return redirect()->route('admin.product-brands.index');
    }

    public function edit(ProductBrand $productBrand)
    {
        abort_if(Gate::denies('product_brand_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productBrands.edit', compact('productBrand'));
    }

    public function update(UpdateProductBrandRequest $request, ProductBrand $productBrand)
    {
        $productBrand->update($request->all());

        return redirect()->route('admin.product-brands.index');
    }

    public function show(ProductBrand $productBrand)
    {
        abort_if(Gate::denies('product_brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productBrands.show', compact('productBrand'));
    }

    public function destroy(ProductBrand $productBrand)
    {
        abort_if(Gate::denies('product_brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productBrand->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductBrandRequest $request)
    {
        ProductBrand::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
