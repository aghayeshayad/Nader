<?php

namespace Modules\Products\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            // 'tags.*' => 'sometimes|array',
            'category_id' => 'required|exists:categories,id',
            // 'subcategory_id' => 'sometimes|exists:categories,id',
            // 'sub_subcategory_id' => 'sometimes|exists:categories,id',
            'description' => 'required|string',
            // 'discount' => 'sometimes|int|between:1,100',
            // 'discount_count' => 'sometimes|int',
            // 'informations.*' => 'sometimes|array',
            // 'prices.*' => 'sometimes|array',
            'image' => 'required|mimes:jpg,bmp,png'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status' => ($this->get('status') && $this->get('status') == 'on') ? 1 : 0,
            'best_sellers' => ($this->get('best_sellers') && $this->get('best_sellers') == 'on') ? 1 : 0,
            'vip' => ($this->get('vip') && $this->get('vip') == 'on') ? 1 : 0,
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
