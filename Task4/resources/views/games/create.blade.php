@extends('layouts.app')

@section('content')
<h1>Додати нову гру</h1>

<form action="{{ route('games.store') }}" method="POST">
    @csrf <div>
        <label>Назва:</label>
        <input type="text" name="title" required>
    </div>

    <div>
        <label>Ціна:</label>
        <input type="number" step="0.01" name="price" required>
    </div>

    <div>
        <label>Видавець:</label>
        <select name="publisher_id" required>
            @foreach($publishers as $publisher)
            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Жанри (утримуйте Ctrl для множинного вибору):</label>
        <select name="categories[]" multiple required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Зберегти</button>
</form>
@endsection