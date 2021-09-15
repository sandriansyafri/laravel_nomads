<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'travel_package_id' => 'required',
            // 'user_id' => 'required',
            // 'addional_visa' => 'required',
            // 'transaction_total' => 'required',
            'transaction_status' => 'required'
        ];
    }
}
