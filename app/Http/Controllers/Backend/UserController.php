<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Message;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;
use Session;
use App\Mail\sendMail;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Str; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $users = User::all()->sortByDesc('id')->values();
        if($request->has('search')){
            $users= User::where('firstname','like',"%{$request->search}%")
            ->orWhere('email','like',"%{$request->search}%")
            ->orWhere('lastname','like',"%{$request->search}%")->get();
        }
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $data = new User;
        $data->thumbnail = "avatar.jpg";
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->age = $request->age;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();
	
        return redirect('users')->with('message','User Registered Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,Message $message)
    {
        return view('users.edit',compact('user','message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'age' => $request->age,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return back()->with('message','User Updated Succesfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(auth()->user()->id == $user->id  ){
            return redirect('users')->with('message','You are deleting yourself');
        }
        elseif($user->id == '1'){
            return redirect('users')->with('message','Administrator can not be deleted');
        }
        $user->delete();
        return redirect('users')->with('message','User Deleted Succesfully');

    }
    public function setprofile(Request $request,Comment $comments,User $users,Post $posts)
    {
        $users = User::all()->sortByDesc('id')->values();
        $comments = Comment::all()->sortByDesc('updated_at')->values();
        $postcomments = Comment::get();
        $posts = Post::all()->sortByDesc('id')->values();
        return view('setprofile',compact('posts','users','comments','postcomments'));
    }
    function deleteImg(Request $request)
    {
    $data = new User;
    $data = user::where('id','=',Session::get('loginId'))->first();
    $data->thumbnail = "avatar.jpg";
    $data->save();
	
    return back()->with('message','Image Deleted Succesfully');
    }
    public function uploadThumbnail(Request $request)
    {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName,'public');
        $data = user::where('id','=',Session::get('loginId'))->first(); 
        User::find($data->id)->update(['thumbnail'=>$imageName]);
        return redirect('setprofile')->with('message','Image Changed Succesfully');
    }
}
