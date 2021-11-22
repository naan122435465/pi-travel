<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomTypeRequest;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function createRoomType(RoomTypeRequest $request){
        $input = $request->all();
        $roomType = new RoomType();
        $roomType->name = $input['name'];
        $roomType->save();
        return $roomType;
    }
    public function showRoomType(){
        $list = RoomType::all();
        return $list;
    }
    public function updateRoomType(RoomTypeRequest $request, $id){
        $input = $request->all();
        $roomType = RoomType::find($id);
        if(isset($input['name'])){
            $roomType->name = $input['name'];
        }
        $roomType->update();
    }
    public function deleteRoomType($id){
        $roomType = RoomType::find($id);
        $roomType->delete();
    }
}
