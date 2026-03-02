@extends('layouts.app')

@section('content')
<h1>{{ $publisher->name }}</h1>

<h3>Ігри цього видавця:</h3>
<ul>
    @forelse($publisher->games as $game)
    <li>
        <a href="{{ route('games.show', $game->id) }}"><strong>{{ $game->title }}</strong></a> - ${{ $game->price }}

        <span style="color: gray;">
            (Жанри:
            @foreach($game->categories as $category)
            <a href="{{ route('categories.show', $category->id) }}" style="color: gray; text-decoration: underline;">{{ $category->name }}</a>{{ !$loop->last ? ', ' : '' }}
            @endforeach
            )
        </span>
    </li>
    @empty
    <li>У цього видавця ще немає ігор.</li>
    @endforelse
</ul>

<br>
<a href="{{ route('publishers.index') }}">Повернутися до списку видавців</a>
@endsection