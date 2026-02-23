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
    </style>
</head>

<body>

    <nav>
        <a href="{{ route('home') }}">Усі товари</a>
        <a href="{{ route('products.available') }}">В наявності</a>
        <a href="{{ route('products.form') }}">Створити новий товар</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>

</html>