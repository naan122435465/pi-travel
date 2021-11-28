<?php

namespace App\Repositories\BaseRepository;

use App\Models\Post;
use App\Repositories\RepositoryInterfaces\BaseInterface;
use App\Repositories\RepositoryInterfaces\PostInterface;

class PostRepository extends BaseRepository implements PostInterface
{
    public function getModel()
    {
        return \App\Models\Post::class;
    }
    // public function homePost(){
    //     $result = $this->model->where('type','Home')->get();
    //     return $result;
    // }
    // public function getByIdHotel($id)
    // {
    //     $result = $this->model->where('hotel_id',$id)->get();
    //     return $result;
    // }
}