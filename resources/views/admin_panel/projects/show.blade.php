@extends('admin_panel.master')
@section('title','Project Show')
@section('content')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Project Detail</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name :: {{$project->name}}</label>
                </div>
                <div class="form-group">
                    <label for="">URT :: {{$project->urt}}</label>
                </div>
                <div class="text-center">
                    <a href="{{url('admin/projects')}}" class="btn btn-sm btn-success">Back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
    
@endsection