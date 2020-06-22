@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">

        <img id="contact" src="{{URL::asset('/img/cnclogo.png')}}" width="100" height="100" alt="">
        <h1>Welcome To CNC!</h1>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a> </p>
    </div>
@endsection
