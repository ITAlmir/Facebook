@extends('layouts.main')
@section('content')
<div class="col-xl-12">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Users :</h6>  
@if (session()->has('message'))
<div class="alert alert-success ">
    {{ session('message') }}
</div>
@endif
<div class="row">
  <div class="col">
  <form method="GET" action="{{route('users.index')}}" class="form-inline">
  <label class="sr-only" for="inlineFormInputName2">Name</label>
  <input type="search" name="search" class="form-control mb-2 mr-lg-2" id="inlineFormInputName5"
   placeholder="search name or e-mail...">

 <button type="submit" class="btn btn-primary mb-2">Search</button>
</form>
  </div>
</div>

<?php
      if( Auth::user()->firstname=='Administrator' &&  Auth::user()->id==1){
        echo '<a href="'. route('users.create').'" class="float-right"><b>[Create New User]</b></a>';
    }?>  
    <a href=" {{route('home')}}" class="btn btn-success">Go Back</a>

</div>  
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#Id</th>
      <th scope="col">Img</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Age</th>
      <th scope="col">Updated at</th>
      <?php
      if( Auth::user()->firstname=='Administrator' &&  Auth::user()->id==1){
   echo '<th>Edit/Remove</th>';
                   }else{
                    echo '<th>Message User</th>' ;   
                   } ?>
    </tr>
  </thead>
  <tbody>
      @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td><img class="thumbComment" 
      src="{{url('/images/'.$user->thumbnail)}}"></td>
      <td>{{$user->firstname}}</td>
      <td>{{$user->lastname}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->age}}</td>
      <td>{{$user->updated_at->format('d M Y')}}</td>
      <?php
      if( Auth::user()->firstname=='Administrator' &&  Auth::user()->id==1){
         echo '<td><a href="'. route('users.edit',$user->id).'" class="btn btn-success">Edit/Remove</a></td>';
                   }else{
                    echo '<td><a href="'. route('users.edit',$user->id).'" class="btn btn-success">Send message</a></td>';   
                   } ?>
    </tr>
    @endforeach
  </tbody>
</table>  
</div>
</div>
@endsection