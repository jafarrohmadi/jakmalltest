<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopupBalanceRequest extends FormRequest
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
            'mobile_number' => 'required|numeric|digits_between:7,12|regex:/(081)/',
            'value' => 'required|in:10000,50000,100000'
        ];
    }

    public function messages()
    {
       return [
          'mobile_number.regex' => 'Must be prefixed with ​081'
       ];
    }

}
