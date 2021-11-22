<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Repositories\RepositoryInterfaces\LocationInterface;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    private $locationRe;
    public function __construct(LocationInterface $locationRe)
    {
        $this->locationRe = $locationRe;
    }

    public function listLocations()
    {
        $list= $this->locationRe->getAll();
        return $list;
    }
   
}
