<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Mail\SendEmail;
use App\Models\Booking;
use App\Repositories\RepositoryInterfaces\BookingInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    private $bookingRe;

    public function __construct(BookingInterface $bookingRe)
    {
        $this->bookingRe = $bookingRe;
    }
     
    public function store(BookingRequest $request)
    {
        $input = $request->all();
        $this->bookingRe->create($input);
        
    }
    // public function store(BookingRequest $request,$idHotel){
    //     $input = $request->all();
    //     $booking = new Booking();
    //     $booking->name = $input['name'];
    //     $booking->email = $input['email'];
    //     $booking->phone = $input['phone'];
    //     $booking->hotel_id = $idHotel;
    //     $booking->date_to = $input['date_to'];
    //     $booking->date_from = $input['date_from'];
    //     $booking->is_business = $input['is_business'];
    //     $booking->adult_amount = $input['adult_amount'];
    //     $booking->children_amount = $input['children_amount'];
    //     $booking->room_amount = $input['room_amount'];
    //     if(isset($input['note'])){
    //         $booking->note = $input['note'];
    //     }
    //     $booking->save();  
    //     $hotelEmail = DB::table('hotels')->where('id', $idHotel)->value('email');
    //     Mail::to($hotelEmail)->cc("")->bcc("")->send(new SendEmail($booking));
    //     return $booking;
    // }
}
