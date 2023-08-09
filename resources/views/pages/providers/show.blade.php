@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <a href="{{route('home')}}"> HOME </a>
                    <div class="jumbotron">
                    <img src="{{$provider->url}}" class="img-fluid" alt="Dog Image">
                        <h1 class="display-4">Hello, {{auth()->user()->name}}</h1>
                        <p class="lead">{{$provider->name}}</p>
                      </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
