@extends('admin_panel.master')
@section('title','Project Edit')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Project Update</h5>
            </div>
            <div class="card-body">
                <form action="{{url('admin/projects/'.$project->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$project->name}}">
                </div>
                <div class="form-group">
                    <label for="">URT</label>
                    <input type="text" name="urt" class="form-control" value="{{$project->urt}}">
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