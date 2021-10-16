<?php

namespace Modules\Contents\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class ContentsCategoryStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['title' => "string", 'title_page' => "string", 'meta_description' => "string", 'short_description' => "string", 'description' => "string", 'image' => "string"])] public function rules(): array
    {
        return [
            'title' => 'required|string',
            'title_page' => 'required|string',
            'meta_description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'mimes:jpg,jpeg,png'
        ];
    }

    #[ArrayShape(['title.required' => "mixed", 'title_page.required' => "mixed", 'title.string' => "mixed", 'title_page.string' => "mixed", 'short_description.string' => "mixed", 'meta_description.string' => "mixed", 'description.string' => "mixed", 'image.mimes' => "mixed"])] public function messages(): array
    {
        return[
            'title.required' => trans('validation.required'),
            'title_page.required' => trans('validation.required'),
            'title.string' => trans('validation.string'),
            'title_page.string' => trans('validation.string'),
            'short_description.string' => trans('validation.string'),
            'meta_description.string' => trans('validation.string'),
            'description.string' => trans('validation.string'),
            'image.mimes' => trans('validation.mimes', ['values' => 'jpg, jpeg, png']),
        ];
    }



    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
