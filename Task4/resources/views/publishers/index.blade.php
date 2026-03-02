@extends('layouts.app')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center;">
    <h1>Видавці</h1>
</div>

<ul>
    @foreach($publishers as $publisher)
    <li>
        <a href="{{ route('publishers.show', $publisher->id) }}">{{ $publisher->name }}</a>
        <span style="color: gray;">(Випущено ігор: {{ $publisher->games_count }})</span>

        <a href="{{ route('publishers.edit', $publisher->id) }}" style="margin-left: 10px;">[Редагувати]</a>

        <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Видалити цього видавця')" style="background: none; border: none; color: red; cursor: pointer; text-decoration: underline;">[Видалити]</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection