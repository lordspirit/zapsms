<?php

namespace App\Http\Requests;

use App\Models\Sublocation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSublocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sublocation_create');
    }

    public function rules()
    {
        return [
            'name'        => [
                'string',
                'required',
            ],
            'locations.*' => [
                'integer',
            ],
            'locations'   => [
                'required',
                'array',
            ],
        ];
    }
}
