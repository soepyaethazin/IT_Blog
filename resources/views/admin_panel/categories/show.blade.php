@extends('admin_panel.master')
@section('title','Category Show')
@section('content')
    <div class="row" style="padding: 100px;">
       <div class="col-md-3"></div>
       <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Category Detail</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name :: {{$category->name}}</label>
                </div>
                <div class="text-center">
                    <a href="{{url('admin/categories')}}" class="btn btn-success">back</a>
                </div>
            </div>
        </div>
       </div>
       <div class="col-md-3"></div>
    </div>
@endsection