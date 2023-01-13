@extends('admin_panel.master')
@section('title','Skill Detail')
@section('content')
    <div class="row" style="margin-top: 100px;">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Skill Detail</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Name :: {{$skill->name}}</label>
                    </div>
                    <div class="form-group">
                        <label for="">Percent :: {{$skill->percent}}</label>
                    </div>
                    <div class="text-center">
                        <a href="{{url('admin/skills')}}" class="btn btn-primary">back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection