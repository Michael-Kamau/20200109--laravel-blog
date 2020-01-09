@extends('layouts.app')
@section('content')

    @if($blog)
        <div class="card well" style="width:100%;">
            <div class="card-body">
                <h5 class="card-title">{{$blog->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$blog->created_at}}</h6>
                <p class="card-text">{{$blog->content}}</p>
                <a href="/" class="card-link btn btn-primary">Go Back</a>
            </div>
        </div>
    @endif
@endsection
