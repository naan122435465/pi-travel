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
            'hotel_id'=>'required',
            'name'=>'bail|required|max:50|regex:/^[a-zA-Z/s]/',
            'email'=>'bail|required|email',
            'phone'=>'bail|required',
            'date_to'=>'bail|required|date_format:dd-MM-yyyy',
            'date_from'=>'bail|required|date_format:dd-MM-yyyy|after_or_equal:date_from',
            'adult_amount'=>'bail|required|numberic|min:1',
            'children_amount'=>'bail|required|numberic',
            'room_amount'=>'bail|required|numberic|min:1',
        ];
    }
    public function attributes(){
        return[
            'hotel_id'=>'hotel',
            'date_to'=>'date to',
            'date_from'=>'date from',
            'adult_amount'=>'adult amount',
            'children_amount'=>'children amount',
            'room_amount'=>'room amount',
        ];

    }
}
