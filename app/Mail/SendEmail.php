<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $booking ;
    public function __construct(Booking $booking)
    {
        $this->$booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'A new Booking has been created';
        return [
            $this->view('SendMail'),
            $this->subject($subject),
            $this->from('pi-travel@gmail.com','piTravel'),
    ];
    }
}
