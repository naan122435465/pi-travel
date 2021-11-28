<?php

 namespace App\Repositories\RepositoryInterfaces;

 interface HotelInterface extends BaseInterface 
 {
     public function hotelList();
    
     public function getLocalId($id);

     public function search($search);
 }