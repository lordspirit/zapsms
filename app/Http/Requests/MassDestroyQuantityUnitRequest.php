<?php

namespace App\Http\Requests;

use App\Models\QuantityUnit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyQuantityUnitRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('quantity_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:quantity_units,id',
        ];
    }
}
