<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Message;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;
use Session;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all()->sortByDesc('id')->values();
        return view('messages.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Message $message)
    {
        $post = new Message;
        $this->validate($request,[
            'addmessage'=>'max:1000',
        ]);
        $data = user::where('id','=',Session::get('loginId'))->first();
        $message->firstname=$data->firstname;
        $message->lastname=$data->lastname;
        $message->user_id=Session::get('message_id');
        $message->sent_id=$data->id;
        $message->message=$request->addmessage;
        $message->thumbnail=$data->thumbnail;
        $res = $message->save();

        return back()->with('message','Message Sent Succesfully');
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
    public function edit(Message $message)
    {
        return view('messages.edit',compact('message'));
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
        $data = Message::find($id);
        $data->delete();
        return redirect('messages')->with('message','Message Deleted Succesfully');
    }
}
