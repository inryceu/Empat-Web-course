@extends('layouts.app')

@section('content')
<h1>{{ $game->title }}</h1>

<h3>Інформація:</h3>
<ul>
    <li>
        <strong>Видавець:</strong>
        <a href="{{ route('publishers.show', $game->publisher->id) }}">{{ $game->publisher->name }}</a>
    </li>
    <li><strong>Ціна:</strong> ${{ $game->price }}</li>
    <li><strong>Категорії:</strong>
        @foreach($game->categories as $category)
        <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>{{ !$loop->last ? ', ' : '' }}
        @endforeach
    </li>
</ul>

<br>
<a href="{{ route('games.index') }}">Повернутися до каталогу</a>
@endsection