<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with(['blogger'])->paginate(16);
        return view('admin.posts.posts')->with([
            'posts' => $posts
        ]);
    }

    public function show($id){
        $post = Post::with(['blogger','medias','images'])->find($id);
        return view('admin.posts.post')->with([
            'post' => $post,
        ]);
    }
    //
}
