<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'name'         => [
                'string',
                'required',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories'   => [
                'required',
                'array',
            ],
            'locations.*'  => [
                'integer',
            ],
            'locations'    => [
                'required',
                'array',
            ],
            'tags.*'       => [
                'integer',
            ],
            'tags'         => [
                'array',
            ],
            'quantity'     => [
                'numeric',
            ],
            'ipaddress'    => [
                'string',
                'nullable',
            ],
            'serialnumber' => [
                'string',
                'nullable',
            ],
            'status'       => [
                'required',
            ],
        ];
    }
}
