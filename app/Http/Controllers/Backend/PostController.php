<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;
use Session;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all()->sortByDesc('id')->values();
        if($request->has('search')){
            $posts= Post::where('firstname','like',"%{$request->search}%")
            ->orWhere('title','like',"%{$request->search}%")
            ->orWhere('lastname','like',"%{$request->search}%")->get();
        }
        return view('posts.index',compact('posts'));
    }
    public function create(Post $posts)
    {
        return view('posts.create',compact('posts'));
    }
    public function store(Request $request,Post $post)
    {
        $post = new post;
        $this->validate($request,[
            'addnews'=>'max:10000',
            'fup_name'=>'max:80',
            'image'=>'required',
        ]);
        $imageNews = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageNews,'public');
        $data = user::where('id','=',Session::get('loginId'))->first();
        $post->firstname=$data->firstname;
        $post->lastname=$data->lastname;
        $post->email=$data->email;
        $post->user_id=$data->id;
        $post->news=$imageNews;
        $post->newsText=$request->addnews;
        $post->title=$request->fup_name;
        $post->thumbnail=$data->thumbnail;
        $res = $post->save();
        

        
        return redirect('home');
    }
    public function edit(Post $post)
    {
        $postcomments = Comment::all();
        $users = User::all();
        return view('posts.edit',compact('post','users','postcomments'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('home')->with('message','Post Deleted Succesfully');

    }
}
