@extends('admin_panel.master')
@section('title','Project Index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Project Table</h5>
                    <a href="{{url('admin/projects/create')}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-circle-plus"></i>Add New</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>URT</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td>{{$project->name}}</td>
                                    <td>{{$project->urt}}</td>
                                    <td>
                                        <form action="{{url('admin/projects/'.$project->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{url('admin/projects/'.$project->id.'/edit')}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i>edit</a>
                                        <a href="{{url('admin/projects/'.$project->id)}}" class="btn btn-sm btn-success"><i class="fa-solid fa-eye"></i>detail</a>
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are You Sure?')"><i class="fa-solid fa-trash"></i>delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$projects->links()!!}
                </div>
            </div>
        </div>
    </div>
@endsection