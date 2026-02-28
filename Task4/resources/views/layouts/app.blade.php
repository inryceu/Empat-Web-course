<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Магазин Ігор</title>
</head>

<body>
    <nav style="margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid #ccc;">
        <strong>Ігри:</strong>
        <a href="{{ route('games.index') }}">Список ігор</a> |
        <a href="{{ route('games.create') }}">Додати гру</a>

        <span style="margin: 0 15px;">||</span>

        <strong>Видавці:</strong>
        <a href="{{ route('publishers.index') }}">Список видавців</a> |
        <a href="{{ route('publishers.create') }}">Додати видавця</a>

        <span style="margin: 0 15px;">||</span>

        <strong>Категорії:</strong>
        <a href="{{ route('categories.index') }}">Список категорій</a> |
        <a href="{{ route('categories.create') }}">Додати категорію</a>
    </nav>

    @if(session('success'))
    <div style="color: green; font-weight: bold; margin: 10px 0;">
        {{ session('success') }}
    </div>
    @endif

    <main>
        @yield('content')
    </main>
</body>

</html>