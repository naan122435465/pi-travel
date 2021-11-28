<?php 

namespace App\Repositories\BaseRepository;

use App\Repositories\RepositoryInterfaces\HotelInterface;

class HotelRepository extends BaseRepository implements HotelInterface
{
    public function getModel()
    {
        return \App\Models\Hotel::class;
    }

    public function hotelList(){
        $result = $this->model->paginate(15);
        return $result;
    }
    
    // public function getById($id)
    // {
    //     $result = $this->model->where("id",$id)->first();
    //     return $result;
    // }

    public function getLocalId($id)
    {
        $result = $this->model->where('id',$id)->value('location_id');
        return $result;
    }

    public function search($search)
    {
        $result = $this->model->where('name','like','%'.$search.'%')->orWhere($search=null)->get();
        return $result;
    }
}