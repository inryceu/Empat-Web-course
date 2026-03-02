<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мої Товари</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        nav {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ccc;
        }

        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #007BFF;
        }

        .container {
            max-width: 800px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <nav>
        <a href="{{ route('products.index') }}">Усі товари</a>
        <a href="{{ route('products.available') }}">В наявності</a>
        <a href="{{ route('products.create') }}">Створити новий товар</a>
    </nav>

    <div class="container">
        @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
        @endif

        @yield('content')
    </div>

</body>

</html>