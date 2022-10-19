<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index(){
        $posts = Post::search()
        ->latest('id')
        ->paginate(10)
        ->withQueryString();
        return response()->json($posts); 
    }

    public function detail($slug){
        $post = Post::where('slug',$slug)->first();
        return response()->json($post);
    }
}
