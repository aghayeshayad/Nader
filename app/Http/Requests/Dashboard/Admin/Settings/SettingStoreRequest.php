<?php

namespace App\Http\Requests\Dashboard\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class SettingStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'aboutUs.description'=>'required|string',
            'aboutUs.image'=>'nullable',
            'contactUs.phone' => 'nullable|min:11|max:11',
            'contactUs.phone1' => 'nullable|min:11|max:11',
            'contactUs.email' => 'nullable|email',
            'contactUs.address' => 'nullable',
            'contactUs.lat' => 'nullable',
            'contactUs.lan' => 'nullable',
            'contactUs.link_map' => 'nullable',
            'socials.*.type' => 'nullable|integer',
            'socials.*.link' => 'nullable|string',
        ];
    }
}
