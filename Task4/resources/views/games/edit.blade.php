@extends('layouts.app')

@section('content')
<h1>Редагувати гру: {{ $game->title }}</h1>

<form action="{{ route('games.update', $game->id) }}" method="POST">
    @csrf
    @method('PATCH') <div>
        <label>Назва:</label>
        <input type="text" name="title" value="{{ $game->title }}" required>
    </div>

    <div>
        <label>Ціна:</label>
        <input type="number" step="0.01" name="price" value="{{ $game->price }}" required>
    </div>

    <div>
        <label>Видавець:</label>
        <select name="publisher_id" required>
            @foreach($publishers as $publisher)
            <option value="{{ $publisher->id }}"
                {{ $publisher->id == $game->publisher_id ? 'selected' : '' }}>
                {{ $publisher->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Жанри:</label>
        <select name="categories[]" multiple required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ $game->categories->contains($category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Оновити</button>
</form>
@endsection