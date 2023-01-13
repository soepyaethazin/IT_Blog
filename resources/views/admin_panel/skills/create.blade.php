@extends('admin_panel.master')
@section('title','Skill Create')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Skill Create</h5>
            </div>
            <div class="card-body">
                <form action="{{url('admin/skills')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Percent</label>
                    <input type="text" class="form-control" name="percent">
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