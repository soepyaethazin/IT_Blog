@extends('admin_panel.master')
@section('title','User Index')
                @section('content')
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>User</h5>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->status}}</td>
                                        <td>
                                            <form action="{{url('admin/users/'.$user->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i>edit</a>
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure?')"><i class="fa-solid fa-trash"></i>delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endsection