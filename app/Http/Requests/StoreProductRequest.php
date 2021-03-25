<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_create');
    }

    public function rules()
    {
        return [
            'name'          => [
                'string',
                'required',
                'unique:products',
            ],
            'tags.*'        => [
                'integer',
            ],
            'tags'          => [
                'array',
            ],
            'category_id'   => [
                'required',
                'integer',
            ],
            'serial_number' => [
                'string',
                'nullable',
            ],
            'quantity'      => [
                'numeric',
                'required',
                'min:1',
            ],
            'location_id'   => [
                'required',
                'integer',
            ],
        ];
    }
}
