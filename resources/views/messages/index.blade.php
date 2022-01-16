@extends('layouts.main')
@section('content')
<div class="col-xl-12">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">messages :</h6>  
@if (session()->has('message'))
<div class="alert alert-success ">
    {{ session('message') }}
</div>
@endif
<div class="row">
  <div class="col">
  <form method="GET" action="{{route('messages.index')}}" class="form-inline">
  <label class="sr-only" for="inlineFormInputName2">Name</label>
  <input type="search" name="search" class="form-control mb-2 mr-lg-2" id="inlineFormInputName5"
   placeholder="search name or e-mail...">

  <button type="submit" class="btn btn-primary mb-2">Search</button>

</form>

  </div>
</div>
<a href=" {{route('home')}}" class="btn btn-success">Back</a>

</div>  
<table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">#Id</th>
      <th scope="col">From:</th>
      <th scope="col">Message</th>
      <th scope="col">Received </th>
      <th>Read/Remove</th>     
    </tr>
  </thead>
  <tbody>
      @foreach($messages as $message)
      @if( Auth::user()->id== $message->user_id)
    <tr>
      <th scope="row">{{$message->id}}</th>
      <td>{{$message->firstname}} {{$message->lastname}}</td>
      <td>{{$message->message}}</td>
      <td>{{$message->created_at->diffForHumans()}}</td>
      <td><a href="{{route('messages.edit',$message->id)}}" class="btn btn-success ">Read</a></td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>  
</div>
</div>
@endsection