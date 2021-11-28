<?php

 namespace App\Repositories\RepositoryInterfaces;

 interface HotelServiceInterface extends BaseInterface 
 {
     public function findByHotelAndService($id, $value);

     
 }