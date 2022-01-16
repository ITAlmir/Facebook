@extends('layouts.main')
@section('content')
<div class="col-xl-12">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Update User</h6>  
@if (session()->has('message'))
<div class="alert alert-success ">
    {{ session('message') }}
</div>
@endif
<a href="{{ route('users.index') }}" class="float-right"><b>Go Back</b></a>
</div>  
    <div class="row justify-content-center">
    <div class="card-body">
                               <!-- Start of Add News -->
   <div id='' class='newsstyle'><p><b class="fw-bold"><img class="thumb" 
    src="{{url('/images/'.$user->thumbnail)}}" alt="thumbnail">
    Firstname :  {{ $user->firstname}} 
    <p>Lastname :  {{ $user->lastname}} 
    <hr>
    </p></b> 
    <p>Age: {{ $user->age}}</p>
    <p>E-mail: {{$user->email}}</p>
    <p>Registered at: {{ $user->created_at->format('d M Y')}}</p>
    <p>Last Update: {{ $user->updated_at->format('d M Y')}}</p>                                  
                   <br style='clear: both;' />

                                <!-- End of Add News -->
                                
@if(Session::get('loginId') == '1' || Session::get('loginId') == $user->id)
    </div>

        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('firstname') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('name') is-invalid @enderror" name="firstname"
                                 value="{{ old('firstname',$user->firstname) }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('name') is-invalid @enderror" name="lastname"
                                 value="{{ old('lastname',$user->lastname) }}" required autocomplete="lasatname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('age') }}</label>

                            <div class="col-md-6">
                                <input id="age" type="age" class="form-control @error('name') is-invalid @enderror" name="age"
                                 value="{{ old('age',$user->age) }}" required autocomplete="age" autofocus>

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __(' Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"
                                value="" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('name') is-invalid @enderror" name="email"
                                 value="{{ old('email',$user->email) }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update User') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <form method="Post" action="{{route('users.destroy',$user->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete User: {{$user->firstname}} {{$user->lastname}} !</button>
                </form>
            </div>
        </div>
    </div>
    </div>    @endif

    <div class="newsstyle">

    <h6><b>Send Message to :</b> {{$user->firstname}} {{$user->lastname}}</h6>
    <form method='post' action="{{route('messages.store')}}">
    <?php
                   session(['message_id' => $user->id]);
                   ?>
    @csrf
    <div class="form-floating">
   <textarea name='addmessage' id="floatingTextarea" class="form-control @error('name') is-invalid @enderror"
   value="{{ old('addmessage') }}" style="height: 100px" required autocomplete="addmessage" autofocus>{{ old('addmessage') }}</textarea><br>
                    <button type="submit" name="message" class="btn btn-primary">Send Message </button>
                    <p style="color:red ;font-size:100% ;font-weight:bold ;background-color:Thistle">
                    @if (count($errors)>0)
@error('addmessage'){{$message}}@enderror
@endif</p>
           </form> <br>
</div>
        </div>
@endsection