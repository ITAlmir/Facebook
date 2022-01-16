@extends('layouts.main')
@section('content')
<div class="col-xl-12">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Post</h6>  
@if (session()->has('message'))
<div class="alert alert-success ">
    {{ session('message') }}
</div>
@endif
<a href="{{ route('posts.index') }}" class="float-right"><b>Back</b></a>
</div>  
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p>
                    <div id='' class='newsstyle'><p><b><img class="thumbComment" 
                        src="/images/{{$post->thumbnail}}" alt="thumbnail">
                        {{$post->firstname}} {{$post->lastname}}</b> 
                        <span class='commentDate'>published: {{$post->created_at->diffForHumans()}}</span></p><hr>
                        <h3>{{$post->title}}</h3>
                                <p> <img src='/images/{{$post->news}}' 
                                    style='float: left; margin: 0px 15px 15px 0px;' width='300px' alt='redfb news' title=''>
                                    {{$post->newsText}}<br><br>
                                    <br style="clear: both;" /> 
                            @if(Session::get('name')=='Administrator' && Session::get('loginId')==1)
                            <form method="Post" action="{{route('posts.destroy',$post->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="commentDate btn btn-danger ">
                                        Delete Post</button>
                                </form> 
                                    @elseif(Session::get('name')==$post->firstname && Session::get('email')==$post->email)
                                    <form method="Post" action="{{route('posts.destroy',$post->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="commentDate btn btn-danger ">
                                        Delete Post</button>
                                </form> 
                                @endif                                                         
                                <br style='clear: both;' /><hr>              
                                    <div class="form-floating">
                                    <form method="post" action="{{route('comments.store')}}"><br>
                                    <?php
                                    session(['post_id' => $post->id]);
                                    ?> 
                                    @csrf
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        name="commented" id="floatingTextarea">
                                        </textarea><br>
                                        <button type="submit" name="addcomment" class="btn btn-primary">Send Comment </button>
                                        <p style="color:red ;font-size:100% ;font-weight:bold ;background-color:Thistle">
                                        @if (count($errors)>0)
                    @error('commented'){{$message}}@enderror
                    @endif</p>
                            </form> <br style="clear: both;" /> </div>
                            @foreach($postcomments as $comms) 
                                        @if($post->id == $comms->post_id)
                            <div id='' class='comstyle '><img class="thumbComment" 
                            src="/images/{{$comms->thumbnail}}" alt="thumbnail">
                            <b><span> {{$comms->firstname}} {{$comms->lastname}}</span></b>
                        <span class='commentDate'>published: {{$comms->created_at->diffForHumans()}}</span><hr>
                        <span>  {{$comms->commented}} </span>
                            
                            @if(Session::get('name')=='Administrator' && Session::get('loginId')==1)
                            <form method="Post" class="transparent" action="{{route('comments.destroy',$comms->id)}}">
                                        @csrf
                                        @method('DELETE')
                                    <button class="commentDate btn btn-danger ">
                                            Delete Comment</button><br style="clear: both;" /> 
                                    </form>
                            @elseif(Session::get('name')==$comms->firstname && Session::get('loginId')==$comms->user_id)
                            <form method="Post" class="transparent" action="{{route('comments.destroy',$comms->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class=" btn btn-danger commentDate  ">
                                            Delete Comment</button>
                                            <br style="clear: both;" />
                                    </form>                                                         
                    @endif</div>     
                        @endif
                    @endforeach
                    </div> 
                        </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
@endsection