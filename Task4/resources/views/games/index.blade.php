@extends('layouts.app')

@section('content')
<h1>Каталог ігор</h1>

<div style="background: #eee; padding: 10px; margin-bottom: 20px;">
    <h3>Статистика:</h3>
    <p>Всього ігор: <strong>{{ $totalGames }}</strong></p>
    <p>Середня ціна: <strong>${{ number_format($averagePrice, 2) }}</strong></p>
</div>

<ul>
    @foreach($games as $game)
    <li>
        <a href="{{ route('games.show', $game->id) }}"><strong>{{ $game->title }}</strong></a>
        - Видавець: {{ $game->publisher->name }}
        (Кількість жанрів: {{ $game->categories_count }})

        <a href="{{ route('games.edit', $game->id) }}">[Редагувати]</a>

        <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Ви впевнені?')" style="background: none; border: none; color: red; cursor: pointer; text-decoration: underline;">[Видалити]</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection