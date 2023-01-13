@extends('admin_panel.master')
@section('title','Category Create')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Category Create</h5>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/categories')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
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