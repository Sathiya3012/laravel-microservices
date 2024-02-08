@extends('layouts.app')

@section('content')
<div class="col-md-6 offset-md-3">
    <a href="{{ route('login.google') }}" class="btn btn-danger btn-block">Login with Google</a>
</div>    
@endsection