<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class PayOrderRequest extends FormRequest
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
            'order_no' => 'required|numeric|digits:10|exists:order,order_no,user_id,'. \Auth::id() .',status,!'.Order::STATUS_CANCELED.
            '|exists:order,order_no,status,!'.Order::STATUS_PAID.'|exists:order,order_no,status,!'.Order::STATUS_FAILED,
        ];
    }

}
