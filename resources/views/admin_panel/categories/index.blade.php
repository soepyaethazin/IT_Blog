@extends('admin_panel.master')
@section('title','Category Index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Category Table</h5>
                    <a href="{{url('admin/categories/create')}}" class="btn btn-info btn-sm float-right"><i class="fa-solid fa-circle-plus"></i>Add New</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <form action="{{url('admin/categories/'.$category->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{url('admin/categories/'.$category->id.'/edit')}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i>edit</a>
                                        <a href="{{url('admin/categories/'.$category->id)}}" class="btn btn-sm btn-success"><i class="fa-solid fa-eye"></i>detail</a>
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are You Sure?')"><i class="fa-solid fa-trash"></i>delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $categories->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection