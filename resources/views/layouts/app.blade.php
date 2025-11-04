<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Movie Reviews')</title>

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')

    <style>
        /* 🔥 Netflix Dark Theme Navbar */
        body {
            background-color: #141414;
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: rgba(20, 20, 20, 0.95);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 2px 10px rgba(0,0,0,0.5);
        }
        .navbar-logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: #e50914;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .navbar-logo:hover {
            color: #f40612;
        }
        .navbar-links {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        .navbar-links a {
            color: #ddd;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .navbar-links a:hover {
            color: #fff;
        }
        .navbar-auth {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .navbar-auth a {
            background: #e50914;
            color: #fff;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: background 0.3s;
            text-decoration: none;
        }
        .navbar-auth a:hover {
            background: #f40612;
        }
        main {
            padding: 2rem;
        }
        footer {
            text-align: center;
            padding: 2rem;
            font-size: 0.9rem;
            color: #888;
            background-color: #111;
            margin-top: 3rem;
        }
        @media (max-width: 768px) {
            .navbar-links {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- 🎞️ Navbar -->
    <nav class="navbar">
        <a href="{{ route('movies.index') }}" class="navbar-logo">Netflix Clone</a>
        
        <div class="navbar-links">
            <a href="{{ route('movies.index') }}">Home</a>
            <a href="{{ route('movies.create') }}">Add Review</a>
            <a href="{{ route('movies.index') }}?sort=rating&order=desc">Top Rated</a>
        </div>

        <div class="navbar-auth">
            @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}" style="background:#333;">Register</a>
            @else
                <span>👋 {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="bg-red-600 px-3 py-1 rounded-md text-white font-bold hover:bg-red-700">
                        Logout
                    </button>
                </form>
            @endguest
        </div>
    </nav>

    <!-- 📄 Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- 🎬 Footer -->
    <footer>
        © {{ date('Y') }} Movie Reviews | Styled like Netflix 🍿
    </footer>
</body>
</html>
