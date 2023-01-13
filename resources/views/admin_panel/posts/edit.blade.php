@extends('admin_panel.master')
@section('title','Post Edit')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Post Update</h5>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/posts/'.$post->id)}}" method="POST" file="true" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" @if ($post->category_id == $category->id)
                                    selected
                                @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-control">
                        <label for="">Image</label>
                        <img class="img-fluid" src="{{url('storage/post_img').'/'.$post->image_path}}" width="150px;">
                        <input type="file" name="image_path" class="form-control" required value="{{$post->image_path}}">
                    </div>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea name="content" rows="6" class="form-control">{{$post->content}}</textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection