@extends('layouts.app')

@section('content')
<h1>Створити нову категорію (жанр)</h1>

@if ($errors->any())
<div style="color: red; margin-bottom: 15px;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div style="margin-bottom: 10px;">
        <label for="name">Назва категорії:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>

    <button type="submit">Створити</button>
</form>

<br>
<a href="{{ route('categories.index') }}">Повернутися до списку</a>
@endsection