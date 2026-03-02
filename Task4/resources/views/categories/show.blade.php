@extends('layouts.app')

@section('content')
<h1>Жанр: {{ $category->name }}</h1>

<h3>Ігри в цьому жанрі:</h3>
<ul>
    @forelse($category->games as $game)
    <li>
        <a href="{{ route('games.show', $game->id) }}">{{ $game->title }}</a>
        - ${{ $game->price }}

        <span style="color: gray;">
            (Видавець: <a href="{{ route('publishers.show', $game->publisher->id) }}" style="color: gray; text-decoration: underline;">{{ $game->publisher->name }}</a>)
        </span>
    </li>
    @empty
    <li>У цій категорії ще немає ігор.</li>
    @endforelse
</ul>

<br>
<a href="{{ route('categories.index') }}">Повернутися до списку категорій</a>
@endsection