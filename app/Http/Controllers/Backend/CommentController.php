<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;
use Session;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Comment $comments)
    {
        $comments = Comment::all();
        return view('comments.index',compact('comments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $data,Comment $comment)
    {
        $data = new User;
        $data = user::where('id','=',Session::get('loginId'))->first();
        $comment = new Comment;
        $comment->thumbnail = $data->thumbnail;
        $comment->firstname = $data->firstname;
        $comment->lastname = $data->lastname;
        $comment->commented = $request->commented;
        $comment->user_id = $data->id;
        $comment->post_id = Session::get('post_id');
        $save=$comment->save();
	
        if($save){
            return back()->with('message','Comment saved');;
        }else{
            return back()->with('message','Comment not sent');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comments)
    {
        return view('comments.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Comment::find($id);
        $data->delete();
        return back()->with('message','Comment Deleted Succesfully');
    }
}
