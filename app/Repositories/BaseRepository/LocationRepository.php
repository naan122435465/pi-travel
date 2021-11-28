<?php

namespace App\Repositories\BaseRepository;

use App\Repositories\RepositoryInterfaces\BaseInterface;
use App\Repositories\RepositoryInterfaces\LocationInterface;

class LocationRepository extends BaseRepository implements LocationInterface
{
    public function getModel()
    {
        return \App\Models\Location::class;
    }

    // public function getById($id)
    // {
    //     $result = $this->model->where("id",$id)->get();
    //     return $result;
    // }
}
