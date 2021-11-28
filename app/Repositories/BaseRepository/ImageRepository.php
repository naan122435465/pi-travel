<?php

namespace App\Repositories\BaseRepository;

use App\Repositories\RepositoryInterfaces\ImageInterface;

class ImageRepository extends BaseRepository implements ImageInterface
{
    public function getModel()
    {
        return \App\Models\Image::class;
    }

    public function getByIdHotel($id)
    {
        $result = $this->model->where('obj_id',$id)->where('obj_type','hotel')->get();
        return $result;
    }
    
}