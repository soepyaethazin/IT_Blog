@extends('ui_panel.master')
@section('title','IT BLOG')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- ABOUT ME  -->
            <div class="aboutme">
                <div class="row pt-3">
                    <div class="col-md-5" id="aboutMe">
                        <h3 class="text-center">ABOUT ME</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error tempore exercitationem nisi alias autem, voluptatum animi incidunt sunt pariatur, dolore et voluptate a. Voluptas modi provident vitae, veniam perferendis sunt sapiente autem accusantium ea tempore explicabo eligendi odit architecto harum ipsum praesentium nostrum optio adipisci quod rem, temporibus fugiat magnam.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, necessitatibus voluptatem deleniti assumenda praesentium quaerat distinctio totam qui quod? Repudiandae, earum obcaecati iure at doloribus ab unde totam, provident nemo harum aut velit vel tempora odio adipisci vitae voluptatibus nesciunt optio. Officia quidem nobis aliquam recusandae nemo necessitatibus labore praesentium.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="total-projects">
                                    <i class="fa-solid fa-diagram-project fontawesom"></i>
                                    <br>
                                    <strong>{{$projects->count()}}</strong>
                                    <p>Total Projects</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="total-students">
                                    <i class="fa fa-users fontawesom" aria-hidden="true"></i>
                                    <br>
                                    <strong>{{$student->count}}</strong>
                                    <p>Total Students</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7" id="skill">
                        <h3 class="text-center">SKILLS</h3>
                        @foreach ($skills as $skill)
                        <div class="row mb-3">
                            <div class="col-md-9">
                                <div class="progress mt-2">
                                    <div class="progress-bar" style="width:{{$skill->percent}}">
                                        {{$skill->percent}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                {{$skill->name}}
                            </div>
                        </div>
                        @endforeach
                        {!! $skills->links() !!}
                        
                        
                    </div>
                </div>
            </div>
            <!-- PROJECT  -->
            <div class="project">
                <h3 class="text-center pt-3">MY PROJECT</h3>
                <div class="row">
                    @foreach ($projects as $project)
                    <div class="col-md-4">
                        <div class="single-project">
                            <i class="fa-solid fa-diagram-project fontawesom"></i>
                            <br>
                            <a href="{{$project->urt}}" target="_blank">{{$project->name}}</a>
                        </div>
                    </div>
                    @endforeach
                    
                   
                </div>
            </div>
            <!-- LATEST POST  -->
            <div class="lates-post py-5">
                <h3 class="text-center">LATEST POST</h3>
                <br><br>
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-sm-6 col-md-4">
                        <img class="img-fluid" src="{{url('storage/post_img').'/'.$post->image_path}}" style="height: 200px;">
                        <br><br>
                        <a href="{{url('posts')}}">
                            <small>5 January , 2023 | BY Khaing Zin</small>
                            <br><br>
                            <h5>{{$post->title}}</h5>
                            <p>{{substr($post->content,0,200)}}</p>
                        </a>
                    </div>
                    @endforeach
                    
                    
                </div>
                <hr>
            </div>
            
        </div>
    </div>
</div>
@endsection

            
        
        