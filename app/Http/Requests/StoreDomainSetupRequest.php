<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDomainSetupRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


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
