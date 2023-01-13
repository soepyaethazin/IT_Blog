@extends('ui_panel.master')
@section('title','IT BLOG POST Detail')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="post-detail">
                <img class="img-fluid" src="{{url('storage/post_img').'/'.$post->image_path}}" style="width:100p%;">
                <div>
                    <strong><i class="fa fa-calendar" aria-hidden="true"></i>Posted On:</strong>
                    5 January , 2023
                </div>
                <div>
                    <strong><i class="fa-solid fa-user"></i>Author:</strong>
                    Khaing Zin Aung
                </div>
                <div>
                    <strong><i class="fa-solid fa-table"></i>Category:</strong>
                    {{$post->category_name}}
                </div><br>
                <h5>{{$post->title}}</h5>
                <p>
                    {{$post->content}}
                </p>
                <form method="POST">
                    @csrf
                    <div>
                        <span>{{$likes->count()}} likes</span>&nbsp;&nbsp;
                        <span>{{$dislikes->count()}} dislikes</span>&nbsp;&nbsp;
                        <span>{{$comments->count()}} comment</span>
                    </div>
                    <button class="btn btn-sm btn-success" formaction="{{url('/post_like/'.$post->id)}}" type="submit"><i class="fa-sharp fa-solid fa-thumbs-up"></i>like </button>
                    <button class="btn btn-sm btn-danger" formaction="{{url('/post_dislike/'.$post->id)}}"><i class="fa-sharp fa-solid fa-thumbs-down"></i>dislike </button>
                    <button class="btn btn-sm btn-info" type="button" data-toggle="collapse" data-target="#commentId"><i class="fa-solid fa-comment"></i>comment </button>
                </form>
                
                <br><br>
                <div class="collapse comment" id="commentId">
                    <form action="{{url('/comment/'.$post->id)}}" method="POST">
                        @csrf
                        <textarea name="text" cols="35" rows="3" placeholder="Comment"></textarea>
                        <br>
                        <button type="submit" class="btn btn-sm btn-info"><i class="fa-solid fa-paper-plane"></i>submit</button>
                    </form>
                    <br>
                    @foreach ($comments as $comment)
                    <div>
                        <img src="{{asset('/images/user.png')}}" alt="">
                        <strong>{{$comment->user_name}}</strong>
                        <div class="message-box">
                            {{$comment->text}}
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection

