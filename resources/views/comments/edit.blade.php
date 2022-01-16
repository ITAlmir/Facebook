@extends('layouts.main')
@section('content')
<div class="col-xl-12">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Update comments</h6>  
@if (session()->has('message'))
<div class="alert alert-success ">
    {{ session('message') }}
</div>
@endif
<a href="{{ route('comments.index') }}" class="float-right"><b>Back</b></a>
</div>  
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('comments.edit', $comments->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('firstname') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('name') is-invalid @enderror" name="firstname"
                                 value="{{ old('firstname',$comments->firstname) }}" required autocomplete="firstname" autofocus>

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
                                 value="{{ old('lastname',$comments->lastname) }}" required autocomplete="lasatname" autofocus>

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
                                 value="{{ old('age',$comments->age) }}" required autocomplete="age" autofocus>

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
                                 value="{{ old('email',$comments->email) }}" required autocomplete="email" autofocus>

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
                                    {{ __('Update comments') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <form method="Post" action="{{route('comments.destroy',$comments->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete Comment: {{$comments->firstname}} {{$comments->lastname}} !</button>
                </form>
            </div>
        </div>
    </div>
    </div>
        </div>
@endsection