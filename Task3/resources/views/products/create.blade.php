@extends('app')

@section('content')
<h1>Додати новий товар</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div style="margin-bottom: 15px;">
        <label>Назва товару:</label><br>
        <input type="text" name="name" value="{{ old('name') }}">

        @error('name')
        <div style="color: red; font-size: 13px; margin-top: 4px;">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 15px;">
        <label>Ціна:</label><br>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}">

        @error('price')
        <div style="color: red; font-size: 13px; margin-top: 4px;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Зберегти товар</button>
</form>
@endsection