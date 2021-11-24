<?php

namespace Modules\Discounts\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class DiscountStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'discount' => 'required|between:1,100',
            'products' => 'required|array',
        ];
    }

    protected function prepareForValidation()
    {
        $start_date_time = CalendarUtils::convertNumbers($this->get('start_date'), true);
        $start_date_time = Jalalian::fromFormat('Y/m/d', $start_date_time)->toCarbon()->format('Y-m-d');

        $end_date_time = CalendarUtils::convertNumbers($this->get('end_date'), true);
        $end_date_time = Jalalian::fromFormat('Y/m/d', $end_date_time)->toCarbon()->format('Y-m-d');

        $path = implode('-', $this->only(['category', 'subcategory_id', 'sub_subcategory_id']));

        $this->merge([
            'start_date' => $start_date_time,
            'end_date' => $end_date_time,
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
