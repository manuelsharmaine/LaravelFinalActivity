<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\NewsLetterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::where('title','!=','')->orderBy('created_at','desc')->get();
        $count = Post::where('title','!=','')->count();
        return view('index', compact('posts', 'count'));
    }

    public function sendNewsletter(){
        Mail::to('sample@test.com')->send(new NewsLetterMail());
    }
}
