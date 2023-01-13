@extends('ui_panel.master')
@section('title','IT BLOG POST')
@section('content')
<div class="container">
    <div class="row">
        <!-- BLOG -->
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div class="blog">
                <img class="img-fluid" src="{{url('storage/post_img').'/'.$post->image_path}}" style="width:500px;">
                <br><br> 
                <h6>{{$post->title}}</h6>
                <p>{{substr($post->content,0,300)}}</p>
                <a href="{{url('/post_detail'.$post->id)}}" target="_blank"><button class="btn btn-info btn-sm">READ MORE<i class="fas fa-angle-double-right"></i></button></a>
            </div>
            @endforeach
            
           {!!$posts->links()!!}
        </div>
        <!-- SIDE BAR -->
        <div class="col-md-4">
            <div class="sidebar">
                <form action="{{url('/search_posts')}}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="search_data" class="form-control" placeholder="search .....">
                        <button type="submit" class="btn btn-success" ><i class="fa-solid fa-magnifying-glass"></i> search</button>
                    </div>
                </form>
                <hr>
                <h5>CATEGORY</h5>
                <ul>
                    @foreach ($categories as $category)
                    <li class="mb-3">
                        <a href="{{url('post_category'.$category->id)}}">{{$category->name}}</a>
                    </li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
                