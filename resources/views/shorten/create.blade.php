@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <h2 class="text-2xl font-bold mb-4">{{ isset($url) ? 'Edit Short URL' : 'Generate Short URL' }}</h2>

        <form action="{{ isset($url) ? route('shorten.update', $url->id) : route('shorten.store') }}" method="POST">
            @csrf
            @if (isset($url))
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="long_url" class="form-label">Enter Long URL</label>
                        <input type="url" class="form-control rounded" name="long_url" placeholder="Enter Long URL"
                            value="{{ isset($url) ? $url->long_url : '' }}" required>
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">{{ isset($url) ? 'Update URL' : 'Submit' }}</button>
        </form>
    </div>
@endsection
