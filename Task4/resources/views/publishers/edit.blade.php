@extends('layouts.app')

@section('content')
<h1>Редагувати видавця: {{ $publisher->name }}</h1>

@if ($errors->any())
<div style="color: red; margin-bottom: 15px;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('publishers.update', $publisher->id) }}" method="POST">
    @csrf
    @method('PATCH') <div style="margin-bottom: 10px;">
        <label for="name">Назва видавця:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name', $publisher->name) }}" required>
    </div>

    <button type="submit">Оновити</button>
</form>

<br>
<a href="{{ route('publishers.index') }}">Повернутися до списку</a>
@endsection