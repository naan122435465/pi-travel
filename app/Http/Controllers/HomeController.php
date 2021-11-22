<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function locationList(){
        // $list = DB::table('locations')->join('hotels',function($leftJoin){
        //     $leftJoin->on('locations.id','=','hotels.location_id')
        //         ->where('locations.id','!=','null')->orderBy('locations.id');
        // })->get();
        $list = DB::table('locations')->select('locations.*')
        ->Join('hotels','locations.id','=','hotels.location_id')->get();
        return $list;
    }
    public function homePost(){
        $post = Post::where('type','Home')->get()->first();
        return $post;
    }
   

}
