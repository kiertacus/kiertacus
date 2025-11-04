@extends('layouts.app')

@section('title', $movie->title)

@section('content')
<div class="max-w-4xl mx-auto">
    <a href="{{ route('movies.index') }}" class="inline-flex items-center text-indigo-400 hover:text-indigo-600 mb-4">
        ← Back to All Reviews
    </a>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden text-gray-900">
        @if($movie->poster_url)
            <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" class="w-full h-96 object-cover">
        @else
            <div class="w-full h-96 bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center">
                <span class="text-9xl text-white">🎬</span>
            </div>
        @endif
        
        <div class="p-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $movie->title }}</h1>

            <div class="flex flex-wrap gap-2 mb-4">
                @if($movie->genre)
                    <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm">{{ $movie->genre }}</span>
                @endif
                @if($movie->release_year)
                    <span class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm">{{ $movie->release_year }}</span>
                @endif
            </div>

            <div class="flex items-center mb-6">
                @for($i = 1; $i <= 5; $i++)
                    <span class="text-4xl {{ $i <= $movie->rating ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                @endfor
                <span class="ml-3 text-lg text-gray-700">({{ $movie->rating }}/5)</span>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Review</h2>
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $movie->review }}</p>
            </div>

            <div class="border-t pt-4 mb-6 text-sm text-gray-500">
                <p><strong>Posted:</strong> {{ $movie->created_at ? $movie->created_at->format('F j, Y \a\t g:i A') : 'N/A' }}</p>
                @if($movie->updated_at && $movie->updated_at != $movie->created_at)
                    <p><strong>Updated:</strong> {{ $movie->updated_at->format('F j, Y \a\t g:i A') }}</p>
                @endif
            </div>

            <div class="flex gap-4">
                <a href="{{ route('movies.edit', $movie) }}" class="flex-1 bg-indigo-600 text-white text-center px-6 py-3 rounded-lg hover:bg-indigo-700 transition">
                    Edit Review
                </a>

                <form method="POST" action="{{ route('movies.destroy', $movie) }}" class="flex-1"
                      onsubmit="return confirm('Are you sure you want to delete this review?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition">
                        Delete Review
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
