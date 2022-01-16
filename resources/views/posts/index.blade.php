@extends('layouts.main')
@section('content')
<div class="col-xl-12">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">posts :</h6>  
@if (session()->has('message'))
<div class="alert alert-success ">
    {{ session('message') }}
</div>
@endif
<div class="row">
  <div class="col">
  <form method="GET" action="{{route('posts.index')}}" class="form-inline">
  <label class="sr-only" for="inlineFormInputName2">Name</label>
  <input type="search" name="search" class="form-control mb-2 mr-lg-2" id="inlineFormInputName5"
   placeholder="search posts...">

  <button type="submit" class="btn btn-primary mb-2">Search</button>

</form>

  </div>
</div>
<a href="{{route('posts.create')}}" class="float-right"><b>[Create New Post]</b></a>
<a href="{{route('home')}}" class="float-right"><b>Go Back</b></a>
 
</div>  
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#Id</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scoope="col">Img</th>
      <th scope="col">Title</th>
      <th scope="col">Posted at</th>
      <th scope="col">Manage</th>
     
    </tr>
  </thead>
  <tbody>
      @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->firstname}}</td>
      <td>{{$post->lastname}}</td>
      <td><img class="thumbPost" 
      src="{{url('/images/'.$post->news)}}"></td>
      <td>{{$post->title}}</td>
      <td>{{$post->created_at->format('d M Y-h:m:s')}}</td>
      <td><a href=" {{route('posts.edit',$post->id)}}" class="btn btn-success">See Post</a></td>
    </tr>
    @endforeach
  </tbody>
</table>  
</div>
</div>
@endsection