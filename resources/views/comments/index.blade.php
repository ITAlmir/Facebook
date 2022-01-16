@extends('layouts.main')
@section('content')
<div class="col-xl-12">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Comments :</h6>  
@if (session()->has('message'))
<div class="alert alert-success ">
    {{ session('message') }}
</div>
@endif
<div class="row">
  <div class="col">
  <form method="GET" action="{{route('comments.index')}}" class="form-inline">
  <input type="search" name="search" class="form-control mb-2 mr-lg-2" id="inlineFormInputName5"
   placeholder="search comments...">

  <button type="submit" class="btn btn-primary mb-2">Search</button>

</form>

  </div>
</div>
<a href="{{route('home')}}" class="float-right"><b>Go Back</b></a>

</div>  
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#Id</th>
      <th scope="col">Img</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">comment</th>
      <th scope="col">Updated at</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
      @foreach($comments as $comment)
    <tr>
      <th scope="row">{{$comment->id}}</th>
      <td><img class="thumbComment" 
      src="{{url('/images/'.$comment->thumbnail)}}"></td>
      <td>{{$comment->firstname}}</td>
      <td>{{$comment->lastname}}</td>
      <td>{{$comment->commented}}</td>
      <td>{{$comment->created_at}}</td>
      <?php
      if( Auth::user()->firstname=='Administrator' &&  Auth::user()->id==1){
         echo '<td><a href="'. route('users.edit',$comment->user_id).'" class="btn btn-success">Edit/Remove</a></td>';
                   }else{
                    echo '<td><a href="'. route('users.edit',$comment->user_id).'" class="btn btn-success">Send message</a></td>';   
                   } ?>
    </tr>
    @endforeach
  </tbody>
</table>  
</div>
</div>
@endsection