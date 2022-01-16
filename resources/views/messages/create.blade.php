@extends('layouts.main')
@section('content')
<div class="col-xl-12">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Send New Message</h6>  
<a href="{{ route('users.index') }}" class="float-right"><b>Back</b></a>
</div>  
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="newsstyle">
                    <h6>Send Message</h6>
                    <form method='post' action="{{route('comments.store')}}">
                    @csrf
                    <div class="form-floating">
                    <label for='addmessage'>News Text :</label>
                    <textarea name='addmessage' id="floatingTextarea" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('addnews') }}" style="height: 100px" required autocomplete="fup_name" autofocus></textarea><br>
                    @error('addmessage')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                <button type='submit' name='create_news' value='' class="btn btn-primary">Send Message</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection