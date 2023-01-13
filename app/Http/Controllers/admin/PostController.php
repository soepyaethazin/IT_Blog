<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $posts = Post::join('categories as c','c.id','=','posts.category_id')
        ->select('posts.*','c.name as category_name')
        ->paginate(5);
        return view('admin_panel.posts.index',compact('posts'));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $categories = Category::all();
        return view('admin_panel.posts.create',compact('categories'));
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content
        ];
        if($request->hasfile('image_path')){
            $img_name = Str::random(20);
            $file = $request->image_path;
            $img_path = date("Y")."-".date("m")."/".date("d")."/".$img_name.".".$file->getClientOriginalExtension();
            
            Storage::disk('public')->put('post_img/'.$img_path,file_get_contents($file));
            $post = Post::create(
                array_merge($data,['image_path'=>$img_path]));
            }
            else{
                $post=Post::create(
                    $data
                );
            }
            return redirect('admin/posts');
        }
        
        /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
            $comments = Comment::where('post_id',$id)->get();
            return view('admin_panel.posts.comments',compact('comments'));
        }
        
        public function showHideComment(Request $request,$id)
        {
            $comment = Comment::find($id);
           if ($comment->status == 'show') {
            $comment->update([
                'status'=>'hide'
            ]);
           } else {
            $comment->update([
                'status'=>'show'
            ]);
           }
           return redirect('admin/posts')->with('status','Change Comment');
        }

        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            $categories = Category::all();
            $post = Post::find($id);
            return view('admin_panel.posts.edit',compact('categories','post'));
        }
        
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
            $post = Post::find($id);
            $data = [
                'category_id' => $request->category_id,
                'title' => $request->title,
                'content' => $request->content
            ];
            if($request->hasfile('image_path')){
                $img_name = Str::random(20);
                $file = $request->image_path;
                $img_path = date("Y")."-".date("m")."/".date("d")."/".$img_name.".".$file->getClientOriginalExtension();
    
                Storage::disk('public')->put('post_img/'.$img_path,file_get_contents($file));
                $post->update(
                    array_merge($data,['image_path'=>$img_path]));
            }
            else{
                $post->update(
                    $data
                );
            }
            return redirect('admin/posts')->with('status','Post Successful Update');
        }
        
        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            //
        }
    }
    