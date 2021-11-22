<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
class PostController extends Controller
{
    public function createPost(PostRequest $request, $hotel_id){
        $input = $request->all();
        $post = new Post();
        $post->type = $input['type'];
        $post->hotel_id = $hotel_id;
        $post->name = $input['name'];
        $post->content = $input['content'];
        $post->save();
        return $post;
    }
    public function showPost($hotel_id){
        $list = Post::where('hotel_id', $hotel_id)->get();
        return $list;
    }
    public function updatePost(PostRequest $request, $id){
        $input = $request->all();
        $post = Post::where('id', $id)->get()->first();
        if(isset($input['type'])){
            $post->type = $input['type'];
        }
        if(isset($input['type'])){
            $post->type = $input['type'];
        } if(isset($input['name'])){
            $post->name = $input['name'];
        } if(isset($input['content'])){
            $post->content = $input['content'];
        }
        $post->update();
        return $post;
    }
    public function deletePost($id){
        $post = Post::where('id',$id)->get()->first();
        $post->delete();
        return redirect("/home");
    }
}
