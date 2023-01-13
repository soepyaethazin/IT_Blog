<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\LikesDislike;
use App\Models\Comment;
use Auth;
class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        return view('home');
    }
    public function posts()
    {
        $posts = Post::paginate(3);
        $categories = Category::all();
        return view('ui_panel.post',compact('categories','posts'));
    }
    public function search(Request $request)
    {
        $searchData = $request->search_data;
        $categories = Category::all();
        $posts = Post::where('title','like',"%".$searchData."%")
        ->orWhere('content','like',"%".$searchData."%")
        ->orWhere('category_id','like','%'.$searchData.'%')->paginate(3);
        return view('ui_panel.post',compact('categories','posts'));
    }
    public function post_detail(Request $request,$id)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $post = Post::join('categories as c','c.id','=','posts.category_id')
        ->where('posts.id',$id)
        ->select('posts.*','c.name as category_name')
        ->first();
        
        $likes = LikesDislike::where('post_id',$id)->where('type','like')->get(); 
        
        $dislikes = LikesDislike::where('post_id',$id)->where('type','dislike')->get(); 
        
        $comments = Comment::where('post_id',$id)->where('status','show')->get();
        
        // $post_category = Post::where('category_id','=',$id)->first();
        return view('ui_panel.post-detail',compact('post','likes','dislikes','comments'));
    }
    public function post_category($id)
    {
        $categories = Category::all();
        $likes = LikesDislike::where('post_id',$id)->where('type','like')->get(); 
        
        $dislikes = LikesDislike::where('post_id',$id)->where('type','dislike')->get(); 
        
        $comments = Comment::where('post_id',$id)->where('status','show')->get();
        $post = Post::where('category_id','=',$id)->first();
        return view('ui_panel.post-detail',compact('post','categories','likes','dislikes','comments'));
    }
}
