<?php

namespace Modules\Categories\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Contents\Entities\Content;
use Illuminate\Support\Str;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'type' => ltrim(Content::class, "Modules\\"),
            'slug' => Str::random()
        ]);
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
