@extends('layouts.main')

@section('content')
<div class="col-xl-12">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Message Inbox</h6>  
@if (session()->has('message'))
<div class="alert alert-success ">
    {{ session('message') }}
</div>
@endif
<a href="/home" class="float-right"><b>Back</b></a>
</div>  
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-body">
                               <!-- Start of Add News -->
   <div id='' class='newsstyle'><p><b class="fw-bold">
    Message from :  {{ $message->firstname}} {{ $message->lastname}}
    <span class='commentDate'>
        Received at : {{$message->created_at->format('d M Y')}}</span>
    <hr>
    <img class="thumbMessage" 
    src="{{'/images/'.$message->thumbnail}}" alt="thumbnail">
</p></b> 
      <p>{{$message->message}}</p>
      <table class='commentDate'>
      <td class="leftBorder">
      <form method="Post" action="{{route('messages.destroy',$message->id)}}">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">delete</button>
        </form>
      </td>
   </table>
    <br style='clear: both;' />
                                <!-- End of Add News -->                                
</div>
<?php echo '<td><a href="'. route('users.edit',$message->sent_id).'"
 class="btn btn-success"> Reply </a></td>';   ?>
</div>
</div>
</div>
</div>
</div>
@endsection