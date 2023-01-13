<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeDeslikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\admin\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
    //     return view('welcome');
    // });
    // UI
    Route::resource('/','App\Http\Controllers\UiController');
    //posts
    Route::get('/posts', [HomeController::class, 'posts']);
    //search
    Route::get('/search_posts', [HomeController::class, 'search']);
    //post_detail
    Route::get('/post_detail{id}', [HomeController::class, 'post_detail']);
    Route::get('/post_category{id}', [HomeController::class, 'post_category']);
    //like
    Route::post('/post_like/{postId}', [LikeDeslikeController::class, 'like']);
    //dislike
    Route::post('/post_dislike/{postId}', [LikeDeslikeController::class, 'dislike']);
    // comment
    Route::post('/comment/{postId}', [CommentController::class, 'comment']);
    //admin
    Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){
        Route::resource('/dashboard','App\Http\Controllers\admin\AdminDashboardController');
        
        // user 
        Route::resource('/users','App\Http\Controllers\admin\UserController');
        // skill
        Route::resource('/skills','App\Http\Controllers\admin\SkillController');
        // project
        Route::resource('/projects','App\Http\Controllers\admin\ProjectController');
        // Student_Count
        Route::resource('/student_counts','App\Http\Controllers\admin\StudentCountController');
        // Category
        Route::resource('/categories','App\Http\Controllers\admin\CategoryController');
        // Post 
        Route::resource('/posts','App\Http\Controllers\admin\PostController');
        Route::post('comment/showhide/{CommentId}',[PostController::class, 'showHideComment']);
    });
    
    
    //  Route::get('admin/dashboard', function () {
        //     return view('admin_panel.dashboard');
        //  return('Hello world');
        
        Auth::routes();
        
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        