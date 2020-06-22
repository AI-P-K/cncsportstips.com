@extends('layouts.app')

@section('content')
    <div class="row">
    @if(count($tips) > 0 )
        @foreach($tips as $tip)
                <div class="col-md-4 card tips">
                    <img src="/storage/tip_images/{{$tip->tip_image}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/tips/{{$tip->id}}">{{$tip->title}}</a></h5>
                        <p class="card-text">{!!  $tip->body !!}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Written on {{$tip->created_at}} by {{$tip->user->name}} </small>
                    </div>
                </div>
        @endforeach
    @else
        <p>No tips found</p>
    @endif
    </div>
@endsection
