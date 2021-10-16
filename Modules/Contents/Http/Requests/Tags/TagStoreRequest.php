<?php

namespace Modules\Contents\Http\Requests\Tags;

use Illuminate\Foundation\Http\FormRequest;

class TagStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'title_page' => 'required|string',
            'meta_description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return[
            'title.required' => trans('validation.required'),
            'title_page.required' => trans('validation.required'),
            'title.string' => trans('validation.string'),
            'title_page.string' => trans('validation.string'),
            'short_description.string' => trans('validation.string'),
            'meta_description.string' => trans('validation.string'),
            'description.string' => trans('validation.string')
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
