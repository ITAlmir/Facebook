<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Message;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Comment $comments,User $users,Post $posts,Message $messages)
    {
        $messages = Message::all()->sortByDesc('id')->values();
        $users = User::all()->sortByDesc('id')->values();
        $comments = Comment::all()->sortByDesc('updated_at')->values();
        $postcomments = Comment::get()->take(10);
        $posts = Post::all()->sortByDesc('id')->values();
        return view('home',compact('posts','users','comments','postcomments','messages'));
    }
}
