@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Update Provider Details
                    <form action="{{ route('providers.update',$provider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Provider Name:</strong>
                                    <input type="text" name="name" value="{{ $provider->name }}" class="form-control" placeholder="provider name">
                                    @error('name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Provider URL:</strong>
                                    <input type="text" name="url" id="url" class="form-control" placeholder="provider URL" value="{{ $provider->url }}">
                                    @error('url')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                 <button type="button" class="btn btn-sm btn-secondary" id="populateUrl">Populate URL</button>
                            </div>
                         
                            <button type="submit" class="btn btn-primary ml-3">Submit</button>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to fetch a random dog image URL using AJAX
        function fetchRandomDogImageUrl() {
            $.ajax({
                url: 'https://dog.ceo/api/breeds/image/random',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.status === 'success') {
                        var imageUrl = data.message;
                        $('#url').val(imageUrl); // Populate the URL input field
                    }
                },
                error: function() {
                     alert('Error fetching dog image URL.')
                    console.log('Error fetching dog image URL.');
                }
            });
        }

        // Attach a click event to the "Populate URL" button to fetch a new random dog image URL
        $('#populateUrl').click(function() {
            fetchRandomDogImageUrl();
        });
    });
</script>
@endsection
