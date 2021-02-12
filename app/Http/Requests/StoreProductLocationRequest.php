<?php

namespace App\Http\Requests;

use App\Models\ProductLocation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductLocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_location_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
