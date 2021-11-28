<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Repositories\RepositoryInterfaces\PostInterface;

class PostController extends Controller
{
    private $postRe;
    public function __construct(PostInterface $postRe)
    {
        $this->postRe = $postRe;
    }
    public function homePost(){
        return $this->postRe->findByField('type','Home');
    }
    /**
     * create post
     *
     * @param $id is hotel_id
     * @param PostRequest $request
     */
    public function createPost(PostRequest $request,$id){
        $input = $request->all();
        $input['hotel_id'] = $id;
        $result = $this->postRe->create($input);
        return $result;
    }

    public function getPost()
    {
        $result = $this->postRe->getAll();
        return $result;
    }
    /**
     * update post
     *
     * @param $id 
     * @param PostRequest $request
     */
    public function updatePost(PostRequest $request,$id)
    {
        $input = $request->all();
        $result = $this->postRe->update($input, $id);
        return $result;
    }

    public function deletePost($id)
    {
        $result = $this->postRe->delete($id);
        return $result;
    }

    
    // public function createPost(PostRequest $request, $hotel_id){
    //     $input = $request->all();
    //     $post = new Post();
    //     $post->type = $input['type'];
    //     $post->hotel_id = $hotel_id;
    //     $post->name = $input['name'];
    //     $post->content = $input['content'];
    //     $post->save();
    //     return $post;
    // }
    // public function showPost($hotel_id){
    //     $list = Post::where('hotel_id', $hotel_id)->get();
    //     return $list;
    // }
    // public function updatePost(PostRequest $request, $id){
    //     $input = $request->all();
    //     $post = Post::where('id', $id)->get()->first();
    //     if(isset($input['type'])){
    //         $post->type = $input['type'];
    //     }
    //     if(isset($input['type'])){
    //         $post->type = $input['type'];
    //     } if(isset($input['name'])){
    //         $post->name = $input['name'];
    //     } if(isset($input['content'])){
    //         $post->content = $input['content'];
    //     }
    //     $post->update();
    //     return $post;
    // }
    // public function deletePost($id){
    //     $post = Post::where('id',$id)->get()->first();
    //     $post->delete();
    //     return redirect("/home");
    // }
}
