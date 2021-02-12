<?php

namespace App\Http\Requests;

use App\Models\ProductLocation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProductLocationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:product_locations,id',
        ];
    }
}
