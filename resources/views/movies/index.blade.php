@extends('layouts.app')

@section('title', 'All Movie Reviews')

@section('content')
<style>
/* 🌃 Netflix-Inspired Styles */
body {
    background-color: #141414;
    font-family: 'Poppins', sans-serif;
    color: #fff;
    margin: 0;
    padding: 0;
}

/* 🔝 Netflix Navbar */
.netflix-nav {
    background: rgba(0, 0, 0, 0.85);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 3rem;
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 10px rgba(0,0,0,0.5);
    animation: fadeDown 0.8s ease;
}
.netflix-logo {
    font-size: 1.8rem;
    font-weight: 700;
    color: #e50914;
    letter-spacing: 2px;
    text-transform: uppercase;
}
.netflix-nav-links a {
    color: #fff;
    text-decoration: none;
    margin-left: 20px;
    font-weight: 500;
    transition: color 0.3s;
}
.netflix-nav-links a:hover {
    color: #e50914;
}

/* 🎬 Movie Container */
.netflix-container {
    max-width: 1200px;
    margin: 2rem auto;
    padding: 1rem;
    animation: fadeIn 1s ease;
}
.netflix-header h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    color: #e50914;
    text-transform: uppercase;
    text-align: center;
}

/* 🧭 Filter Form */
.filter-form {
    background: #1f1f1f;
    border-radius: 10px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    transition: transform 0.3s;
}
.filter-form:hover {
    transform: scale(1.02);
}
.filter-form input,
.filter-form select {
    background: #333;
    color: #fff;
    border: 1px solid #555;
    border-radius: 5px;
    padding: 8px;
    width: 100%;
}
.filter-form button {
    background: #e50914;
    color: #fff;
    font-weight: bold;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s;
}
.filter-form button:hover {
    background: #f40612;
}
.filter-form a {
    background: #333;
    color: #fff;
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
}

/* 🎞️ Movie Cards */
.movie-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 1.5rem;
}
.movie-card {
    background: #1f1f1f;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
    transition: transform 0.4s ease, box-shadow 0.3s ease;
}
.movie-card:hover {
    transform: scale(1.08);
    box-shadow: 0 20px 40px rgba(0,0,0,0.7);
}
.movie-card img {
    width: 100%;
    height: 350px;
    object-fit: cover;
    transition: transform 0.4s;
}
.movie-card:hover img {
    transform: scale(1.05);
}
.movie-info {
    padding: 1rem;
}
.movie-info h2 {
    font-size: 1.3rem;
    font-weight: 600;
}
.movie-genre,
.movie-year {
    background: #333;
    color: #fff;
    border-radius: 4px;
    padding: 2px 6px;
    font-size: 0.8rem;
    margin-right: 5px;
}
.star {
    color: gold;
}
.review-snippet {
    color: #ccc;
    margin-top: 8px;
}
.view-btn {
    display: block;
    width: 100%;
    text-align: center;
    background: #e50914;
    color: #fff;
    padding: 10px;
    border-radius: 6px;
    font-weight: bold;
    transition: background 0.3s;
    margin-top: 10px;
}
.view-btn:hover {
    background: #f40612;
}

/* 📃 Pagination */
.pagination {
    margin-top: 2rem;
    text-align: center;
}

/* 😢 No Reviews */
.no-reviews {
    background: #1f1f1f;
    border-radius: 10px;
    padding: 3rem;
    text-align: center;
    color: #ccc;
}

/* ✨ Animations */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<!-- 🌟 Netflix Navbar -->
<nav class="netflix-nav">
    <div class="netflix-logo">MovieFlix</div>
    <div class="netflix-nav-links">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ route('movies.create') }}">Add Review</a>
        <a href="#">Login</a>
    </div>
</nav>

<!-- 🎬 Main Content -->
<div class="netflix-container">
    <div class="netflix-header">
        <h1>Movie Reviews</h1>
    </div>

    <!-- Filters -->
    <form method="GET" action="{{ route('movies.index') }}" class="filter-form">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label>Search</label>
                <input type="text" name="search" value="{{ request('search') }}">
            </div>
            <div>
                <label>Genre</label>
                <select name="genre">
                    <option value="">All Genres</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>{{ $genre }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Sort By</label>
                <select name="sort">
                    <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Date</option>
                    <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Rating</option>
                </select>
            </div>
            <div>
                <label>Order</label>
                <select name="order">
                    <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Newest/Highest</option>
                    <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Oldest/Lowest</option>
                </select>
            </div>
        </div>

        <div class="mt-4 flex gap-2">
            <button type="submit">Apply Filters</button>
            <a href="{{ route('movies.index') }}">Clear</a>
        </div>
    </form>

    <!-- Movies -->
    @if($movies->count() > 0)
        <div class="movie-grid">
            @foreach($movies as $movie)
                <div class="movie-card">
                    @if($movie->poster_url)
                        <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}">
                    @else
                        <img src="https://via.placeholder.com/350x500?text=No+Poster" alt="{{ $movie->title }}">
                    @endif
                    <div class="movie-info">
                        <h2>{{ $movie->title }}</h2>
                        @if($movie->genre)
                            <span class="movie-genre">{{ $movie->genre }}</span>
                        @endif
                        @if($movie->release_year)
                            <span class="movie-year">{{ $movie->release_year }}</span>
                        @endif
                        <div class="mt-2">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="star">{{ $i <= $movie->rating ? '★' : '☆' }}</span>
                            @endfor
                            <span>({{ $movie->rating }}/5)</span>
                        </div>
                        <p class="review-snippet">{{ Str::limit($movie->review, 120) }}</p>
                        <a href="{{ route('movies.show', $movie) }}" class="view-btn">View Full Review</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination">{{ $movies->links() }}</div>
    @else
        <div class="no-reviews">
            <p>No movie reviews found.</p>
            <a href="{{ route('movies.create') }}">Create Your First Review</a>
        </div>
    @endif
</div>
@endsection
