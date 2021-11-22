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

    public function homePost(){
        $post = $this->model->where('type','Home')->get();
        return $post;
    }
}