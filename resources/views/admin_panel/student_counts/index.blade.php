@extends('admin_panel.master')
@section('title','StudentCount Index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>StudentCount Table</h5>
            </div>
            <div class="card-body">
                @if ($student_counts->count() < 1)
                <form action="{{url('admin/student_counts')}}" method="POST">
                    @csrf
                            <div class="input-group">
                                <input type="number" name="count" class="form-control @error('count') is-invalid
                                @enderror" style="border-radius: 4px 0 0 4px" >
                                <button class="btn btn-primary" style="border-radius: 0 4px 4px 0"><i class="fa-solid fa-circle-plus"></i>create</button>
                                
                            </div>
                            @error('count')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                </form>
                @endif
                
                <br>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student_counts as $student_count)
                        <tr>
                            <td>{{$student_count->count}}</td>
                            <td>
                                    <button href="" class="btn btn-sm btn-info" id="addBtn"><i class="fa-solid fa-circle-plus"></i>add more student</button>
                                    <form action="{{url('admin/student_counts/'.$student->id)}}" method="POST" class="col-md-6" style="display: none;"  id="addForm">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group">
                                            <input type="number" name="count" class="form-control @error('count') is-invalid
                                            @enderror" style="border-radius: 4px 0 0 4px" placeholder="Enter Student Count">
                                            <button class="btn btn-success" style="border-radius: 0px 4px 4px 0px"><i class="fa-solid fa-circle-plus"></i>add</button>
                                        </div>
                                        @error('count')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!!$student_counts->links()!!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function(){
            $('#addBtn').click(function(){
                $('#addForm').css('display','block');
                $(this).css('display','none');
            })
        });
    </script>
@endsection