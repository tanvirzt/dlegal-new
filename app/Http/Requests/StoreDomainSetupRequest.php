<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDomainSetupRequest extends FormRequest
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
            'domain_name' => 'required',
            'company_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'domain_name.required' => 'Domain name field is required.',
            'company_id.required' => 'Company field is required.',
        ];
    }

}
