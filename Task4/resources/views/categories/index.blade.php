@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center;">
    <h1>Категорії</h1>
</div>

<ul>
    @foreach($categories as $category)
    <li style="margin-bottom: 10px;">
        <a href="{{ route('categories.show', $category->id) }}">
            <strong>{{ $category->name }}</strong>
        </a>

        <span style="color: gray;">(Ігор у жанрі: {{ $category->games_count }})</span>

        <a href="{{ route('categories.edit', $category->id) }}" style="margin-left: 10px;">[Редагувати]</a>

        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Видалити цю категорію?')" style="background: none; border: none; color: red; cursor: pointer; text-decoration: underline;">[Видалити]</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection