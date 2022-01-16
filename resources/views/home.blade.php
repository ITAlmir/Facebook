<?php 
//dd($posts);
?>
@extends('layouts.main')

@section('content')

<div class="col-xl-12">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Timeline</h6>  
@if (session()->has('message'))
<div class="alert alert-success ">
    {{ session('message') }}
</div>
@endif
<a href="{{ route('posts.create') }}" class="float-right"><b>Create Post</b></a>
</div>  
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-body">
                               <!-- Start of Add News -->
<p>
@foreach($posts as $post)   
  <div id='' class='newsstyle'><p><b class="fw-bold"><img class="thumbComment" 
  src="images/{{$post->thumbnail}}" alt="thumbnail">
    {{$post->firstname}} {{$post->lastname}}</b> 
    <span class='commentDate'>published: {{$post->created_at->diffForHumans()}}</span></p><hr>
    <h3>{{$post->title}}</h3>
    <img src='images/{{$post->news}}' 
    style='float: left; margin: 0px 15px 15px 0px;' width='300px' alt='redfb news' title=''>
    {{$post->newsText}}<br><br>

  @if(Auth::user()->firstname=='Administrator' && Auth::user()->id==1)
    <form method="Post" action="{{route('posts.destroy',$post->id)}}">
      @csrf
      @method('DELETE')
      <button class="commentDate btn btn-danger ">
      Delete Post</button>
    </form> 
  @elseif(Auth::user()->firstname==$post->firstname && Auth::user()->email==$post->email)
    <form method="Post" action="{{route('posts.destroy',$post->id)}}">
      @csrf
      @method('DELETE')
      <button class="commentDate btn btn-danger ">
      Delete Post</button>
    </form> 
  @endif                                                         
  <br style='clear: both;' /><hr>
                   
        <?php
        session(['post_id' => $post->id]);
        ?>

  <div id="app">
    <router-view></router-view>
    <script src="{{ asset('js/app.js') }}"></script>
  </div>             
  @if (count($errors)>0)
  @error('commented'){{$message}}@enderror
  @endif 

@foreach($postcomments as $comms) 
  @if($post->id == $comms->post_id)
    <div id='' class='comstyle '><img class="thumbComment" 
    src="/images/{{$comms->thumbnail}}" alt="thumbnail">
      <b><span> {{$comms->firstname}} {{$comms->lastname}}</span></b>
      <span class='commentDate'>published: {{$comms->created_at->diffForHumans()}}</span><hr>
      <span> {{$comms->commented}} </span>
        
  @if(Auth::user()->firstname=='Administrator' && Auth::user()->id==1)
    <form method="Post" class="transparent" action="{{route('comments.destroy',$comms->id)}}">
      @csrf
      @method('DELETE')
      <button class="commentDate btn btn-danger ">
      Delete Comment</button><br style="clear: both;" /> 
    </form>
  @elseif(Auth::user()->firstname==$comms->firstname && Auth::user()->id==$comms->user_id)
    <form method="Post" class="transparent" action="{{route('comments.destroy',$comms->id)}}">
      @csrf
      @method('DELETE')
      <button class=" btn btn-danger commentDate  ">
      Delete Comment</button>
      <br style="clear: both;" />
    </form>                  
                
  @endif   
  </div><hr style = "clear:both;"/>    
@endif
@endforeach                 
</p> 
<br style='clear: both;' />
<p align="center"> 
  <a href="/posts/{{$post->id}}/edit"><b>show all comments</b></a>
</p>
</div>
<br style = "clear:both;"/> 
@endforeach
                                <!-- End of Add News -->
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
