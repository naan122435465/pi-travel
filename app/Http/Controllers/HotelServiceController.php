<?php

namespace App\Http\Controllers;

use App\Models\HotelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelServiceController extends Controller
{
    public function hotelService($id){
        $data =  HotelService::where('hotel_id', $id)->get()->toArray();
        $service_id = array_column($data,'service_id');
       return $service_id;
    }
    public function updateHotelService(Request $request, $hotel_id){
        $new_id = $request->all();
        $data = HotelService::where('hotel_id',$hotel_id)->get()->toArray();
        $older_id = array_column($data,'service_id');
        $del_id = array_diff($older_id,$new_id);
        foreach($del_id as $id){
            $list_id = HotelService::where('service_id',$id)->where('hotel_id',$hotel_id)->get()->first();
            $list_id->delete();
        }
        $add_id = array_diff($new_id,$older_id);
        foreach($add_id as $id){
            $hotel_service = new HotelService();
            $hotel_service->service_id = $id;
            $hotel_service->hotel_id = $hotel_id;
            $hotel_service->save();
        }
        
    }
}
