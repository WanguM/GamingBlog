<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(2);
        
        $categories = Category::all();
        
        return view('front/home', compact('posts', 'categories'));
    }
    
    public function post($slug){
        
        $post = Post::findBySlugOrFail($slug);
        
        $categories = Category::all();
        
        $comments = $post->comments()->get();
        
        return view('post',compact('post','comments', 'categories'));
    }
}
