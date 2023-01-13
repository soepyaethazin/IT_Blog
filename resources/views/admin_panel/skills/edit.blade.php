@extends('admin_panel.master')
@section('title','Skill Edit')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Skill Update</h5>
            </div>
            <div class="card-body">
                <form action="{{url('admin/skills/'.$skill->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$skill->name}}">
                </div>
                <div class="form-group">
                    <label for="">Percent</label>
                    <input type="text" class="form-control" name="percent" value="{{$skill->percent}}">
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