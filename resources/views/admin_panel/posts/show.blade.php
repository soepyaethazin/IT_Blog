@extends('admin_panel.master')
@section('title','Post Show')
@section('content')
    <div class="row" style="padding: 100px;">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Post Detail</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Category Name :: {{$post->category_name}}</label>
                    </div>
                    <div class="form-group">
                        <label for="">Image ::  <img class="img-fluid" src="{{url('storage/post_img').'/'.$post->image_path}}" width="150px;"></label>
                    </div>
                    <div class="form-group">
                        <label for="">Title :: {{$post->title}}</label>
                    </div>
                    <div class="form-group">
                        <label for="">Content :: {{$post->content}}</label>
                    </div>
                    <div class="text-center">
                        <a href="{{url('admin/posts')}}" class="btn btn-primary">back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection