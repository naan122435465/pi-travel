<?php

namespace App\Repositories\RepositoryInterfaces;
 
interface RoomInterface extends BaseInterface
{
    public function search($search);
    //public function getByIdHotel($id);
}