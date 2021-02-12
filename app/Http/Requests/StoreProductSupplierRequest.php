<?php

namespace App\Http\Requests;

use App\Models\ProductSupplier;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_supplier_create');
    }

    public function rules()
    {
        return [
            'name'   => [
                'string',
                'required',
            ],
            'active' => [
                'required',
            ],
        ];
    }
}
