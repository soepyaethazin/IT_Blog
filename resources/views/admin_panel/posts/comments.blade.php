@extends('admin_panel.master')
@section('title','Post Index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Post Comment</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <tbody>
                            @if ($comments->count() < 1)
                                <strong class="text-danger">No Message</strong>
                            @else
                            @foreach ($comments as $index=>$comment)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$comment->text}}</td>
                                <td>
                                    <form action="{{url('admin/comment/showhide/'.$comment->id)}}" method="POST">
                                    @csrf
                                    @if ($comment->status == 'show')
                                    <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-eye"></i>show</button>
                                    @else
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa-solid fa-pen-to-square"></i>hide</button>
                                    @endif
                                   
                                   
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                            @endif
                            
                        </tbody>
                    </table>
                    {{-- {!!$posts->links()!!} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
