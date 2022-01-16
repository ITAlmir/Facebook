@extends('layouts.main')

@section('content')
<div id="app">
<router-view></router-view>
</div>
        <script src="{{ asset('js/app.js') }}"></script>
@endsection