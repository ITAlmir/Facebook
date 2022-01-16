@extends('layouts.main')
@section('content')
<div class="col-xl-12">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Create New Post</h6>  
<a href="{{ route('users.index') }}" class="float-right"><b>Back</b></a>
</div>  
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="newsstyle">

                    <h6>ADD NEWS</h6>
                        <form method='post' action="{{route('posts.store')}}" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-floating">
                        <label for='addnews'></label>
                    <textarea name='addnews' id="floatingTextarea" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('addnews') }}" style="height: 200px"></textarea><br>
                        </div>
                    <div class="row mb-3">
                    <label for='fup_name' class="col-md-4 col-form-label text-md-right">Your text subject :</label>
                    <div class="col-md-6">
                    <input type='text' name='fup_name' class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('fup_name') }}" required autocomplete="fup_name" autofocus>
                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        </div>
                        <div class="row mb-3">
                    <label for='image' class="col-md-4 col-form-label text-md-right">upload picture :</label>
                    <div class="choose_file">
                            <span>Click Here To Choose File</span>
                        <input type='file' name='image' value='Upload Image'/>
                    </div>
                        </div>
                        <div class="col-md-6">
                    <button type='submit' name='create_news' value='' class="btn btn-primary">Create News</button>
                    </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection