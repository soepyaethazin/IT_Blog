
                @extends('admin_panel.master')
                @section('title','User Edit')
                @section('content')
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>User Edit</h5>
                           <form action="{{url('admin/users/'.$user->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" value="{{$user->email}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">select-status</option>
                                    <option value="admin" @if ($user->status == 'admin') selected
                                    @endif>Admin</option>
                                    <option value="user" @if ($user->status == 'user') selected
                                        @endif>User</option>
                                </select>
                            </div>
                            <div class="text-center">
                            <button class="btn btn-success">Update</button>
                        </div>
                           </form>
                        </div>
                    </div>
                </div>
                @endsection
                    
                
            