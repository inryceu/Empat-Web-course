@extends('app')

@section('content')
<h2>Деталі товару</h2>

<div style="border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
    <h3>Назва: {{ $product['name'] }}</h3>
    <p><strong>Ціна:</strong> {{ $product['price'] }}$</p>

    <p><strong>Статус:</strong>
        @if($product['is_available'])
        <span style="color: green;">Товар готовий до відправки</span>
        @else
        <span style="color: red;">На жаль, товар закінчився</span>
        @endif
    </p>

    <hr>

    <h4>Тест додавання (POST)</h4>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf <input type="hidden" name="name" value="{{ $product['name'] }}_copy">
        <input type="hidden" name="price" value="{{ $product['price'] + 50 }}">
        <button type="submit">Створити копію (+50$)</button>
    </form>

    <br>

    <h4>Тест видалення (DELETE)</h4>
    <form action="{{ route('products.destroy', ['name' => $product['name']]) }}" method="POST">
        @csrf
        @method('DELETE') <button type="submit" style="color: red;">Видалити цей товар</button>
    </form>
</div>

<br>
<a href="{{ route('home') }}">← Повернутися до списку</a>
@endsection