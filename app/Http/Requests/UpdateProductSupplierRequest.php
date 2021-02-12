<?php

namespace App\Http\Requests;

use App\Models\ProductSupplier;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_supplier_edit');
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
