@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        <h1 class="text-2xl font-bold mb-4 mt-4 fw-bold">URL Statistics 
            <a href="{{ route('shorten.create') }}" class="bg-dark text-white btn float-end">+ Create Short URL</a>
        </h1>

        @if ($urls->isEmpty())
            <p class="text-gray-500">You have not created any shortened URLs yet.</p>
        @else
            <table class="min-w-full bg-white border border-gray-300" style="width:100%;">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Short URL</th>
                        <th class="py-2 px-4 border-b">Long URL</th>
                        <th class="py-2 px-4 border-b">Click Count</th>
                        <th class="py-2 px-4 border-b">Created At</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($urls as $url)
                        <tr>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ url('shorturl/' . $url->short_url) }}"  target="_blank"
                                   class="text-blue-600 hover:underline">{{ url('shorturl/' . $url->short_url) }}</a>
                            </td>
                            <td class="py-2 px-4 border-b">{{ $url->long_url }}</td>
                            <td class="py-2 px-4 border-b">{{ $url->click_count }}</td>
                            <td class="py-2 px-4 border-b">{{ $url->created_at->format('Y-m-d H:i:s') }}</td>
                            <td class="py-2 px-4 border-b d-flex">
                                <a href="{{ route('shorten.edit', $url->id) }}" class="btn btn-warning me-2">Edit</a>
                                
                                <form action="{{ route('shorten.destroy', $url->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
