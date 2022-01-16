@extends('layouts.main')

@section('content')
<div class="col-xl-12">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Setup Your Profile</h6>  
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
    <div id='' class='newsstyle'><img class="thumb" 
    src="{{url('/images/'.Auth::user()->thumbnail)}}" alt="thumbnail">
      <p><b class="fw-bold">Firstname :  {{ Auth::user()->firstname}} 
      <a class='commentDate' href="{{ route('users.edit',Auth::user()->id)}}">change profile data</a></p>
      <p>Lastname :  {{ Auth::user()->lastname}} 
      <hr>
      </p></b> 
      <p>Age: {{Auth::user()->age}}</p>
      <p>E-mail: {{Auth::user()->email}}</p>
      <p>Registered at: {{Auth::user()->created_at->format('d M Y')}}</p>
      <p>Last Update: {{ Auth::user()->updated_at->format('d M Y')}}</p>
      <table class='commentDate'>
      <td>        
        profile photo :
        <a href="uploadImg">add/edit</a>
      </td>
      <td class="leftBorder">
        <a href="/deleteImg/{{Auth::user()->id}}">delete</a>
      </td>
      </table>                                   
      <br style='clear: both;' />                                 
                                <!-- End of Add News -->
    </div>
  </div>
</div>
</div>
</div>
</div>
@endsection