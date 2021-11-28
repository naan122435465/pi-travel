<?php

namespace App\Repositories\BaseRepository;

use App\Http\Requests\BookingRequest;
use App\Mail\SendEmail;
use App\Repositories\RepositoryInterfaces\BookingInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookingRepository extends BaseRepository implements BookingInterface
{

}