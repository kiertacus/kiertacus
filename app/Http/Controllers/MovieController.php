<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $genres = ['Action', 'Comedy', 'Drama', 'Horror', 'Romance', 'Sci-Fi', 'Thriller', 'Animation'];

        $query = Movie::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('genre')) {
            $query->where('genre', $request->genre);
        }

        $sort = $request->get('sort', 'created_at');
        $order = $request->get('order', 'desc');

        $movies = $query->orderBy($sort, $order)->paginate(6);

        return view('movies.index', compact('movies', 'genres'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
            'poster_url' => 'nullable|url',
            'genre' => 'nullable|string',
            'release_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 5),
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie review added!');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
            'poster_url' => 'nullable|url',
            'genre' => 'nullable|string',
            'release_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 5),
        ]);

        $movie->update($request->all());

        return redirect()->route('movies.show', $movie)->with('success', 'Review updated!');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Review deleted!');
    }
}
