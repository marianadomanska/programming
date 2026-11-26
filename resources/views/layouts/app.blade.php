<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Салон краси')</title>

    <style>
        @font-face {
            font-family: 'Cormorant Garamond';
            src: url('/fonts/CormorantGaramond-Regular.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        body {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            background-image: url('https://i.pinimg.com/736x/1f/3c/dc/1f3cdc8476d980a81f1c37636f2b5e38.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 650px;
        }

        button, input, select, textarea {
            font-family: 'Cormorant Garamond', serif;
        }

        nav {
            background: #FFD1DC;
            padding: 15px 30px;
        }

        nav a {
            color: black;
            text-decoration: none;
            margin-right: 40px;
        }

        main {
            padding: 140px;
        }

        footer {
            background: #FFD1DC;
            color: black;
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

        .bootstrap-duallistbox-container {
            display: flex;
            gap: 20px;
            max-width: 800px;
        }

        .bootstrap-duallistbox-container .box1,
        .bootstrap-duallistbox-container .box2 {
            flex: 1;
            min-width: 0;
        }

        .bootstrap-duallistbox-container select {
            width: 100%;
            height: 190px;
        }

        .bootstrap-duallistbox-container .btn-group {
            display: flex;
            gap: 5px;
            margin: 5px 0;
        }

        .bootstrap-duallistbox-container button {
            padding: 5px 12px;
            cursor: pointer;
        }



.services-table {
    width: 100%;
    table-layout: fixed;
    border-collapse: separate;
    border-spacing: 10px 8px;
}

.services-table th,
.services-table td {
    padding: 14px 18px;
    text-align: left;
    vertical-align: middle;
    overflow-wrap: break-word;
    background: rgba(255, 255, 255, 0.35);
    border-radius: 6px;
    font-size: 20px;
}

.services-table th {
    font-weight: bold;
    text-align: center;
    background: rgba(255, 209, 220, 0.75);
}

.services-table th:nth-child(1),
.services-table td:nth-child(1) {
    width: 18%;
}

.services-table th:nth-child(2),
.services-table td:nth-child(2) {
    width: 38%;
}

.services-table th:nth-child(3),
.services-table td:nth-child(3) {
    width: 20%;
}

.services-table th:nth-child(4),
.services-table td:nth-child(4),
.services-table th:nth-child(5),
.services-table td:nth-child(5) {
    width: 12%;
}

.services-table td:nth-child(4),
.services-table td:nth-child(5) {
    text-align: center;
}
.blog-filters {
    background: transparent;
    padding: 15px 0;
    margin-bottom: 20px;
}

.blog-filters a {
    display: inline-block;
    margin-bottom: 10px;
    color: #70234d;
}

    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

    <footer>
        <a href="{{ url('/FAQ') }}">FAQ</a>
        <p>Ціни</p>
        <p>Подарунки</p>
        <p>Наші майстри</p>
        <p>&copy; {{ date('Y') }} Салон краси "Креатив"</p>
    </footer>
</body>
</html>
