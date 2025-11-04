@extends('layouts.app')

@section('title', 'Edit ' . $movie->title)

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-4xl font-bold text-gray-800 mb-6">Edit Movie Review</h1>
    
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong>Error:</strong> {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <strong>Success:</strong> {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('movies.update', $movie->id) }}" class="bg-white rounded-lg shadow-md p-6">
        @csrf
        @method('PUT')
        
        <!-- Hidden field for debugging -->
        <input type="hidden" name="debug" value="1">
        
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Movie Title *</label>
            <input type="text" name="title" id="title" value="{{ old('title', $movie->title) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('title') border-red-500 @enderror">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Star Rating *</label>
            <div class="flex gap-2">
                @for($i = 1; $i <= 5; $i++)
                    <label class="cursor-pointer">
                        <input type="radio" name="rating" value="{{ $i }}" 
                            {{ old('rating', $movie->rating) == $i ? 'checked' : '' }} 
                            class="hidden peer" required>
                        <span class="text-4xl text-gray-300 peer-checked:text-yellow-400 hover:text-yellow-300 transition">★</span>
                    </label>
                @endfor
            </div>
            @error('rating')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="review" class="block text-sm font-medium text-gray-700 mb-2">Review *</label>
            <textarea name="review" id="review" rows="6" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('review') border-red-500 @enderror">{{ old('review', $movie->review) }}</textarea>
            <p class="text-sm text-gray-500 mt-1">Character count: <span id="charCount">0</span></p>
            @error('review')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="poster_url" class="block text-sm font-medium text-gray-700 mb-2">Poster URL (Optional)</label>
            <input type="url" name="poster_url" id="poster_url" value="{{ old('poster_url', $movie->poster_url) }}"
                placeholder="https://example.com/poster.jpg"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('poster_url') border-red-500 @enderror">
            @error('poster_url')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="genre" class="block text-sm font-medium text-gray-700 mb-2">Genre (Optional)</label>
            <select name="genre" id="genre" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                <option value="">Select Genre</option>
                <option value="Action" {{ old('genre', $movie->genre) == 'Action' ? 'selected' : '' }}>Action</option>
                <option value="Comedy" {{ old('genre', $movie->genre) == 'Comedy' ? 'selected' : '' }}>Comedy</option>
                <option value="Drama" {{ old('genre', $movie->genre) == 'Drama' ? 'selected' : '' }}>Drama</option>
                <option value="Horror" {{ old('genre', $movie->genre) == 'Horror' ? 'selected' : '' }}>Horror</option>
                <option value="Romance" {{ old('genre', $movie->genre) == 'Romance' ? 'selected' : '' }}>Romance</option>
                <option value="Sci-Fi" {{ old('genre', $movie->genre) == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
                <option value="Thriller" {{ old('genre', $movie->genre) == 'Thriller' ? 'selected' : '' }}>Thriller</option>
                <option value="Animation" {{ old('genre', $movie->genre) == 'Animation' ? 'selected' : '' }}>Animation</option>
                <option value="Fantasy" {{ old('genre', $movie->genre) == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                <option value="Documentary" {{ old('genre', $movie->genre) == 'Documentary' ? 'selected' : '' }}>Documentary</option>
            </select>
            @error('genre')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-6">
            <label for="release_year" class="block text-sm font-medium text-gray-700 mb-2">Release Year (Optional)</label>
            <input type="number" name="release_year" id="release_year" value="{{ old('release_year', $movie->release_year) }}"
                min="1900" max="{{ date('Y') + 5 }}"
                placeholder="{{ date('Y') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('release_year') border-red-500 @enderror">
            @error('release_year')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex gap-4">
            <button type="submit" class="flex-1 bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">
                Update Review
            </button>
            <a href="{{ route('movies.show', $movie->id) }}" class="flex-1 bg-gray-200 text-gray-700 text-center px-6 py-3 rounded-lg hover:bg-gray-300 transition">
                Cancel
            </a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    const reviewTextarea = document.getElementById('review');
    const charCount = document.getElementById('charCount');
    
    if (reviewTextarea && charCount) {
        reviewTextarea.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
        
        charCount.textContent = reviewTextarea.value.length;
    }
</script>
@endpush
@endsection