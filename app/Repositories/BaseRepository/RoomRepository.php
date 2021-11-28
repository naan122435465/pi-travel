<?php

namespace App\Repositories\BaseRepository;

use App\Repositories\RepositoryInterfaces\RoomInterface;

class RoomRepository extends BaseRepository implements RoomInterface
{
    public function getModel()
    {
        return \App\Models\Room::class;
    }

    public function search($search)
    {
        $result = $this->model->where('name','like','%'.$search.'%')->orWhere($search=null)->get();
        return $result;
    }
    // public function getByIdHotel($id)
    // {
    //     $result = $this->model->where('hotel_id',$id)->paginate(15);
    //     return $result;
    // }
}