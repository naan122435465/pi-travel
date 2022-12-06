<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Room;
use App\Repositories\RepositoryInterfaces\RoomInterface;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
 {
     private $roomRe;
     public function __construct(RoomInterface  $roomRe)
     {
         $this->roomRe = $roomRe;
     }

   
     public function addRoom(RoomRequest $request, $id)
     {
        $input = $request->all();
        $input['hotel_id'] = $id;
        $result = $this->roomRe->create($input);
        return $result;
    }

    public function getRoomById($id)
    {
        $result  = $this->roomRe->getById($id);
        return $result;
    }

    public function updateRoom(RoomRequest $request, $id)
    {
        $input = $request->all();
        $result = $this->roomRe->update($input, $id);
        return $result;
    }

    public function deleteRoom($id)
    {
        $result = $this->roomRe->delete($id);
        return $result;
    }
  public function hotelRoom($id)
     {
        $result = $this->roomRe->findByField('hotel_id',$id);
        return $result;
     }

     public function searchRoom($search)
     {
         $result = $this->roomRe->search($search);
         return $result;
     }


//     public function hotelRoom($id){
//         $room = Room::where(['hotel_id',$id])->paginate(10);
//         return $room;
//     }
//     public function searchRoom($search){
//         $data = DB::table('rooms')->where('name','like','%'.$search.'%')->orWhere($search=null)->get();
//         return $data;
//     }
//     public function addRoom(RoomRequest $request){
//         $input = $request->all();
//         $room = new Room();
//         $room->name = $input['name'];
//         $room->hotel_id = $input['hotel_id'];
//         $room->description = $input['description'];
//         $room->room_type_id = $input['room_type_id'];
//         $room->save();
//         return $room;
//     }
//     public function reupdateRoom($id){
//         $data = Room::where('id', $id)->frist();
//         return $data;
//     }
//     public function updateRoom(RoomRequest $request,$id){
//         $input = $request->all();
//         $data = Room::where('id', $id)->frist();
//         if(isset($input['name'])){
//             $data->name = $input['name'];
//         }
//         if(isset($input['hotel_id'])){
//             $data->hotel_id = $input['hotel_id'];
//         }
//         if(isset($input['description'])){
//             $data->description = $input['description'];
//         }
//         if(isset($input['room_type_id'])){
//             $data->room_type_id = $input['room_type_id'];
//         }
//         $data->update();
//         return $data;
//     }
//     public function deleteRoom($id){
//         $data = Room::where('id', $id)->first();
//         $data->delete();
//         return redirect('/home');
//     }
}
