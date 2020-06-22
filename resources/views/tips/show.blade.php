@extends('layouts.app')

@section('content')
    <a href="/tips" class="btn btn-dark">Go Back</a>
    <h1>{{$tip->title}}</h1>
    <img src="/storage/tip_images/{{$tip->tip_image}}" class="card-img-top" alt="...">
    <div>
        {!!  $tip->body !!}
    </div>
    <small>Written on {{$tip->created_at}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $tip->user_id || Auth::user()->hasRole('admin')))
            <a href="/tips/{{$tip->id}}/edit" class="btn btn-dark">Edit</a>
            {!! Form::open(['action' => ['TipsController@destroy', $tip->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif
    @endif
@endsection
