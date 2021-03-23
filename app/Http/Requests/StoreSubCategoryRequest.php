<?php

namespace App\Http\Requests;

use App\Models\SubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sub_category_create');
    }

    public function rules()
    {
        return [
            'name'             => [
                'string',
                'required',
                'unique:sub_categories',
            ],
            'sub_categories.*' => [
                'integer',
            ],
            'sub_categories'   => [
                'array',
            ],
        ];
    }
}
