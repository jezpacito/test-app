@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                  
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @else
                    @php
                        $message = Session::get('error')
                    @endphp
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <a class="btn btn-primary" href="{{ route('providers.create') }}">Add</a>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">URL</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($providers as $provider)
                            <tr>
                                <th scope="row">{{$provider->id}}</th>
                                <td>{{$provider->name}}</td>
                                <td>{{$provider->url}}</td>
                                <td>
                                    <form action="{{ route('providers.destroy',$provider->id) }}" method="Post">
                                        <a class="btn btn-primary" href="{{ route('providers.edit',$provider->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="d-flex justify-content-center">
                        {!! $providers->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
