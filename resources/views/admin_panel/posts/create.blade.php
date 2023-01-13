@extends('admin_panel.master')
@section('title','Post Create')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Post Create</h5>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/posts')}}" method="POST" file="true" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-control">
                        <label for="">Image</label>
                        <input type="file" name="image_path" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea name="content" rows="6" class="form-control"></textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success">Create</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection