<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- custom css  -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- HEADER SECTION  -->
                <div class="header">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <img src="{{asset('images/post.jpg')}}" alt="">
                        </div>
                        <div class="col-md-4">
                            <p>Hello</p>
                            <p>It's me.</p>
                            <p>Khaing Zin Aung</p>
                            <p>The Happy Coder</p>
                            <a href="{{url('/posts')}}"> <button class="btn btn-info"><i class="fa-solid fa-circle-plus"></i>Text My Blog</button></a>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
                <!-- NAVGATION SECTION  -->
                <div id="navbar" class="position-sticky">
                    <a href="{{url('/')}}">HOME</a>
                    <a href="{{url('/posts')}}">BLOGS</a>
                    @if (Auth::check())
                    <a href="{{url('/register')}}">{{strToUpper(Auth::user()->name)}}</a>
                    <a class="" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    if(confirm('Are You sure In Logout?')){document.getElementById('logout-form').submit();}">
                    {{ __('Logout') }}
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @else
                <a href="{{url('/register')}}">REGISTER</a>
                <a href="{{url('/login')}}">LOGIN</a>
                @endif
            </div>
            
            @yield('content')
            
            <!-- FOOTER SECTION  -->
            {{-- <div class="col-md-12"> --}}
                <div class="footer">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>ABOUT THIS WEBSITE</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis voluptatibus doloribus illo tempora quam illum provident maiores nemo laboriosam. Minima, facere voluptate quo magni optio recusandae atque. Dignissimos, magni omnis.</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h5>CONTACT INFO</h5>
                            <p>Phone :: 09750736861</p>
                            <p>Email :: lady.khaingzinaung.2022@gmail.com</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h5>FOLLOW ME</h5>
                            <a href="facebook.com" target="_blank"><i class="fab fa-facebook-square social-media-icon"></i></a>
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <a href="instagram.com"><i class="fab fa-instagram-square social-media-icon"></i></a>
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <a href="github.com"> <i class="fab fa-github-square social-media-icon"></i></a>
                        </div>
                    </div>      
                </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
    
    <!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- CUSTOM  -->
    <script src="./js/script.js"></script>
</body>
</html>