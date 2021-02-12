<?php

namespace App\Http\Requests;

use App\Models\QuantityUnit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuantityUnitRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quantity_unit_create');
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
