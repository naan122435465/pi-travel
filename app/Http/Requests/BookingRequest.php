<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'name'=>'bail|max:50|regex:/^[a-zA-Z/s]/',
            'email'=>'bail|email',
            'phone'=>'bail',
            'date_to'=>'bail|date_format:dd-MM-yyyy',
            'date_from'=>'bail|date_format:dd-MM-yyyy',
            'adult_amount'=>'bail|numberic|min:1',
            'children_amount'=>'bail|numberic',
            'room_amount'=>'bail|numberic|min:1',
        ];
    }
    public function attributes(){
        return[
            'date_to'=>'date to',
            'date_from'=>'date from',
            'adult_amount'=>'adult amount',
            'children_amount'=>'children amount',
            'room_amount'=>'room amount',
        ];

    }
}
