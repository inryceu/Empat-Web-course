@extends('layouts.app')

@section('content')
<h1>Додати нового видавця</h1>

@if ($errors->any())
<div style="color: red; margin-bottom: 15px;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('publishers.store') }}" method="POST">
    @csrf

    <div style="margin-bottom: 10px;">
        <label for="name">Назва видавця:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>

    <button type="submit">Зберегти видавця</button>
</form>

<br>
<a href="{{ route('publishers.index') }}">Повернутися до списку</a>
@endsection