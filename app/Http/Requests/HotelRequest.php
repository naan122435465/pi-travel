<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
            'name'=>'bail|required|max:50|regex:/^[a-zA-Z/s]/',
            'email'=>'bail|required|email',
            'phone'=>'bail|required|integer|digits:10',
            'price'=>'required|integer',
        ];
    }
}
