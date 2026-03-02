@extends('layouts.app')

@section('content')
<h1>Редагувати категорію: {{ $category->name }}</h1>

@if ($errors->any())
<div style="color: red; margin-bottom: 15px;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <div style="margin-bottom: 10px;">
        <label for="name">Назва категорії:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>
    </div>

    <button type="submit">Оновити</button>
</form>

<br>
<a href="{{ route('categories.index') }}">Повернутися до списку</a>
@endsection