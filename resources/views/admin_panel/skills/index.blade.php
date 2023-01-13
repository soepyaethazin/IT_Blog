@extends('admin_panel.master')
@section('title','Skill Index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Skill Table</h5>
                    <a href="{{url('admin/skills/create')}}" class="btn btn-sm btn-info float-right"><i class="fa-solid fa-circle-plus"></i>Add New</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Percent</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skills as $skill)
                                <tr>
                                    <td>{{$skill->id}}</td>
                                    <td>{{$skill->name}}</td>
                                    <td>{{$skill->percent}}</td>
                                    <td>
                                        <form action="{{url('admin/skills/'.$skill->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{url('admin/skills/'.$skill->id.'/edit')}}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i>edit</a>
                                        <a href="{{url('admin/skills/'.$skill->id)}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-page"></i><i class="fa-solid fa-eye"></i>detail</a>
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are You Sure?')"><i class="fa-solid fa-trash"></i>delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    {!! $skills->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection