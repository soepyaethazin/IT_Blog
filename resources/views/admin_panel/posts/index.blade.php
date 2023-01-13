@extends('admin_panel.master')
@section('title','Post Index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Post Table</h5>
                    <a href="{{url('admin/posts/create')}}" class="btn btn-info"><i class="fa-solid fa-circle-plus"></i>Add New</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td><img class="img-fluid" src="{{url('storage/post_img').'/'.$post->image_path}}" width="150px;"></td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->category_name}}</td>
                                    <td>
                                        <form action="{{url('admin/posts/'.$post->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{url('admin/posts/'.$post->id.'/edit')}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i>edit</a>
                                        {{-- <a href="{{url('admin/posts/'.$post->id)}}" class="btn btn-sm btn-success"><i class="fa-solid fa-eye"></i>detail</a> --}}
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa-solid fa-trash"></i>delete</button>
                                        <a href="{{url('admin/posts/'.$post->id)}}" class="btn btn-sm btn-info"><i class="fa-solid fa-comments"></i>Comments</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$posts->links()!!}
                </div>
            </div>
        </div>
    </div>
@endsection
