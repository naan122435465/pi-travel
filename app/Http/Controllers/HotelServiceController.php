<?php

namespace App\Http\Controllers;

use App\Models\HotelService;
use App\Repositories\RepositoryInterfaces\HotelServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelServiceController extends Controller
{
    private $hotelServiceRe;

    public function __construct(HotelServiceInterface $hotelServiceRe)
    {
        $this->hotelServiceRe = $hotelServiceRe;
    }

    /**
     * get hotel service
     *
     * @param $id is hotel_id
     * return array service id
     */ 

    public function hotelService($id)
    {
        $data = $this->hotelServiceRe->findByField('hotel_id', $id);
        $result = array_column($data, 'service_id');
        return $result;
    }
    /**
     * update service Hotel
     *
     * @param $id is hotel_id
     * @param Request $request: array service id
     */
    public function updateHotelService(Request $request,$id)
    {
        $new_id = $request->all();
        $data = $this->hotelServiceRe->findByField('hotel_id', $id);
        $older_id = array_column($data, 'service_id');
        $del_id = array_diff($older_id,$new_id);
        foreach($del_id as $del)
        {
            $delSer = $this->hotelServiceRe->findByHotelAndService($del, $id);
             $this->hotelServiceRe->delete($delSer->id);     
        }
        $add_id = array_diff($new_id,$older_id);
        foreach($add_id as $add)
        {
            $input = [
                'hotel_id' => $id,
                'service_id' => $add
            ];
            $this->hotelServiceRe->create($input);
        }
    }
    // public function hotelService($id){
    //     $data =  HotelService::where('hotel_id', $id)->get()->toArray();
    //     $service_id = array_column($data,'service_id');
    //    return $service_id;
    // }
    // public function updateHotelService(Request $request, $hotel_id){
    //     $new_id = $request->all();
    //     $data = HotelService::where('hotel_id',$hotel_id)->get()->toArray();
    //     $older_id = array_column($data,'service_id');
    //     $del_id = array_diff($older_id,$new_id);
    //     foreach($del_id as $id){
    //         $list_id = HotelService::where('service_id',$id)->where('hotel_id',$hotel_id)->get()->first();
    //         $list_id->delete();
    //     }
    //     $add_id = array_diff($new_id,$older_id);
    //     foreach($add_id as $id){
    //         $hotel_service = new HotelService();
    //         $hotel_service->service_id = $id;
    //         $hotel_service->hotel_id = $hotel_id;
    //         $hotel_service->save();
    //     }
        
    // }
}
