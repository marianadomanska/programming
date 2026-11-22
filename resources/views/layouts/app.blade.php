<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Салон краси')</title>

    <style>
        body {
            margin: 0;
    font-family: Cormorant Garamond, sans-serif;

    background-image: url(https://primelaser.com.ua/wp-content/uploads/2020/06/45879075.jpg);
background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 650px;

        }

        nav {
            background: #ECD59B;
            padding: 15px 30px;
        }

        nav a {
            color:  black;
            text-decoration: none;
            margin-right: 40px;
        }

        main {
            padding: 140px;
        }

        footer {
            background: #ECD59B;
            color: white;
            padding: 15px 30px;
            margin-top: 40px;
        }

.blog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 20px;
    margin: 24px 0;
}

.blog-card {
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    background: rgba(255, 255, 255, 0.9);
    transition: transform 0.2s, box-shadow 0.2s;
}

.blog-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
}

.blog-card-image {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.blog-card-body {
    padding: 16px;
}

.blog-category {
    font-size: 13px;
    color: #8b5e3c;
}

.blog-meta {
    font-size: 13px;
    color: #666;
}
    </style>
</head>
<body>
    <nav>
        <a href="{{ url('/') }}">Головна</a>
        <a href="{{ url('/about') }}">Про нас</a>
        <a href="{{ url('/contact') }}">Контакти</a>
<a href="{{ route('services.index') }}">Послуги</a>
<a href="{{ route('site.masters') }}">Наші майстри</a>
<a href="{{ route('stats.pages') }}">Статистика</a>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer><a href="{{ url('/FAQ') }}">FAQ<br>
        Ціни<br>
        Подарунки<br>
        Наші майстри<br>
        &copy; {{ date('Y') }} Салон краси "Креатив"
    </footer>
</body>
</html>