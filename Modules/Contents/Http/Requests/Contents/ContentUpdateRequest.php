<?php

namespace Modules\Contents\Http\Requests\Contents;

use Illuminate\Foundation\Http\FormRequest;
use Morilog\Jalali\CalendarUtils;

class ContentUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
         (new ContentStoreRequest())->rules()
        ];
    }

    public function prepareForValidation()
    {
        $Ptime = explode(' ', CalendarUtils::convertNumbers($this->request->get("published_at"), true));
        $PDate = explode('/', CalendarUtils::convertNumbers($Ptime[0], true));
        $Gdate = CalendarUtils::toGregorian($PDate[0], $PDate[1], $PDate[2]);
        $date = $Gdate[0] . '-' . $Gdate[1] . '-' . $Gdate[2] . ' ' . $Ptime[1] . ':00';
        $date = strtotime($date);

        $this->merge([
            'published_at' => date('Y-m-d H:i:s', $date),
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
