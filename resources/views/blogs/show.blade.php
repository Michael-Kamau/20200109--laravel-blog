@extends('layouts.app')
@section('content')

    @if($blog)
        <div class="row">
            <div class="card well col-md-10" style="width:100%;">
                <div class="card-body">
                    <h5 class="card-title">{{$blog->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$blog->created_at}} by {{$blog->user->name}}</h6>
                    <p class="card-text">{{$blog->content}}</p>
                    <a href="/" class="card-link btn btn-primary">Go Back</a>
                </div>
            </div>

            <div class="col-md-2 cards">



            </div>

        </div>

    @endif
@endsection
