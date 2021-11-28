<?php

namespace App\Repositories\BaseRepository;

use App\Repositories\RepositoryInterfaces\HotelServiceInterface;

class HotelServiceRepository extends BaseRepository implements HotelServiceInterface
{
    public function getModel()
    {
        return \App\Models\HotelService::class;
    }

    public function findByHotelAndService($id, $value)
    {
        $result = $this->model->where('service_id',$id)->where('hotel_id',$value)->first();
        return $result;
    }

    
}