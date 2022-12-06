<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomTypeRequest;
use App\Models\RoomType;
use App\Repositories\RepositoryInterfaces\RoomTypeInterface;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    private $roomTypeRe;
    public function __construct(RoomTypeInterface $roomTypeRe)
    {
        $this->roomTypeRe = $roomTypeRe;
    }

    public function createRoomType(RoomTypeRequest $request)
    {
        $input = $request->all();
        $result =  $this->roomTypeRe->create($input);
        return $result;
    }

   

    public function updateRoomType(RoomTypeRequest $request, $id)
    {
        $input = $request->all();
        $result = $this->roomTypeRe->update($input, $id);
        return $result;
    }
 public function showRoomType()
    {
        $result = $this->roomTypeRe->getAll();
        return $result;
    }
    public function deleteRoomType($id)
    {
        $result = $this->roomTypeRe->delete($id);
        return $result;
    }
    // public function createRoomType(RoomTypeRequest $request){
    //     $input = $request->all();
    //     $roomType = new RoomType();
    //     $roomType->name = $input['name'];
    //     $roomType->save();
    //     return $roomType;
    // }
    // public function showRoomType(){
    //     $list = RoomType::all();
    //     return $list;
    // }
    // public function updateRoomType(RoomTypeRequest $request, $id){
    //     $input = $request->all();
    //     $roomType = RoomType::find($id);
    //     if(isset($input['name'])){
    //         $roomType->name = $input['name'];
    //     }
    //     $roomType->update();
    // }
    // public function deleteRoomType($id){
    //     $roomType = RoomType::find($id);
    //     $roomType->delete();
    // }
}
