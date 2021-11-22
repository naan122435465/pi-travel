<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function hotelDetail($id){
        $image = DB::table('images')->where('obj_id',$id)->where('obj_type','hotel')->get();
        $post = DB::table('posts')->where('hotel_id',$id)->first();
        $room = DB::table('rooms')->where('hotel_id',$id)->get();
        $hotelService = DB::table('hotel_services')->where('hotel_id',$id)->first();
        $idLocal = DB::table('hotels')->where('id',$id)->value('location_id');
        $hotelLocation = DB::table('locations')->where('id',$idLocal)->first();
        return[
            $image,
            $post,
            $room,
            $hotelService,
            $hotelLocation
        ];
    }
    public function locationHotel($id){
        $list = Hotel::where('location_id',$id)->get();
        return $list;
    }
    public function hotelList(){
        $list = Hotel::paginate(15);
        return $list;
    }
    public function searchHotel($name){
        $list = DB::table('hotels')->where('name','like','%'.$name.'%')->orWhere($name=null)->get();
        return $list;
    }
    public function addHotel(HotelRequest $request){
        $input=$request->all();
        $hotel = new Hotel();
        $hotel->name = $input['name'];
        $hotel->email = $input['email'];
        $hotel->phone = $input['phone'];
        $hotel->address = $input['address'];
        $hotel->evaluation = $input['evaluation'];
        $hotel->coordinate = $input['coordinate'];
        $hotel->price = $input['price'];
        $hotel->location_id= $input['location_id'];
        $hotel->description = $input['description'];
        $hotel->save();
        return $hotel;
    }
    public function reupdateHotel($id){
        $data = Hotel::where('id', $id)->first();
        return $data;
    }
    public function updateHotel(HotelRequest $request, $id){
        $input = $request->all();
        $hotel = Hotel::where('id', $id)->first();
        if(isset($input['name'])){
            $hotel->name = $input['name'];
        }
        if(isset($input['email'])){
            $hotel->email = $input['email'];
        }
        if(isset($input['phone'])){
            $hotel->phone = $input['phone'];
        }
        if(isset($input['address'])){
            $hotel->address = $input['address'];
        }
        if(isset($input['evaluation'])){
            $hotel->evaluation = $input['evaluation'];
        }
        if(isset($input['coordinate'])){
            $hotel->coordinate = $input['coordinate'];
        }
        if(isset($input['price'])){
            $hotel->price = $input['price'];
        }
        if(isset($input['location_id'])){
            $hotel->location_id = $input['location_id'];
        }
        if(isset($input['description'])){
            $hotel->description = $input['description'];
        }
        $hotel->update();
        return $hotel;
    }
    public function deleteHotel($id){
        $hotel = Hotel::where('id', $id)->first();
        $hotel->delete();
        return redirect('/home');
    } 
}
