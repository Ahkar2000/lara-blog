<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $posts = Post::when(request('keyword'),function($q){
            $keyword = request('keyword');
            $q->orWhere("title","like","%$keyword%")
                ->orWhere("description","like","%$keyword%");
            })
            ->latest("id")
            ->with(['user','category'])
            ->paginate(10)
            ->withQueryString();

//        return $posts;
        return view('index',compact('posts'));
    }

    public function detail($slug){
//        return $slug;
        $post = Post::where('slug',$slug)->with(['user','category','photos'])->first();
        $recent_posts = Post::latest('id')->limit(5)->get();
//        return $post;
        return view('detail',compact('post','recent_posts'));

    }

    public function postByCategory(Category $category){
//        return $category;
//        $category = Category::where("slug",$slug)->first();
        $posts = Post::where(function ($q){
                $q->when(request('keyword'),function($q){
                    $keyword = request('keyword');
                    $q->orWhere("title","like","%$keyword%")
                    ->orWhere("description","like","%$keyword%");
                });
            })
            ->where("category_id",$category->id)
            ->latest("id")
            ->with(['user','category'])
            ->paginate(10)
            ->withQueryString();
        return view('index',compact('posts','category'));
    }
}