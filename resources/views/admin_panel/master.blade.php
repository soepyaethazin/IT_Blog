<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        body{
            padding: 3px;
        }
        .sidenav{
            background-color: black;
            height: 100%;
            width: 200px;
            padding: 15px;
            position: fixed;
            /* padding-top: 50px; */
        }
        .sidenav a{
            color: white;
            font-size: 18px;
            padding: 15px;
            display: block;
            text-decoration: none
        }
        .sidenav a i{
            font-size: 20px;
            margin-right: .8rem;
            color: green
        }
        .sidenav a:hover{
            background: green;
        }
        .sidenav a:hover i{
            color: #fff;
        }
        .main{
            margin-left: 200px;
            font-size: 16px;
            padding:20px;
        }
        .mainCol{
            padding: 0;
        }
        .navbar{
            position: fixed;
            top: 0;
            z-index: 30;
        }
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mainCol">
                {{-- navbigation --}}
                <nav class="navbar navbar-expand-lg navbar-light bg-dark position-sticky">
                    <a class="navbar-brand text-white" href="#">Personal Blog</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">   
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->email }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    if(confirm('Are You sure?')){document.getElementById('logout-form').submit();}">
                                    {{ __('Logout') }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                    {{-- <button class="dropdown-item" type="submit">Logout</button> --}}
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
                {{-- side bar  --}}
                <div class="sidenav">
                    <a href="{{url('admin/dashboard')}}"><i class="fa-solid fa-user"></i>Dashboard</a>
                    <a href="{{url('admin/users')}}"><i class="fa-solid fa-user"></i>User</a>
                    <a href="{{url('admin/skills')}}"><i class="fa-solid fa-user"></i>Skill</a>
                    <a href="{{url('admin/projects')}}"><i class="fa-solid fa-user"></i>Project</a>
                    <a href="{{url('admin/categories')}}"><i class="fa-solid fa-user"></i>Category</a>
                    <a href="{{url('admin/posts')}}"><i class="fa-solid fa-user"></i>Post</a>
                    <a href="{{url('admin/student_counts')}}"><i class="fa-solid fa-user"></i>Student_Count</a>
                </div>
                <div class="main">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
    <script>
        swal('{{session('status')}}');
    </script>
    @endif
    @yield('javascript')
</body>
</html>