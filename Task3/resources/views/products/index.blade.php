@extends('app')

@section('content')
<h1>Список товарів</h1>

<form action="{{ route('products.search') }}" method="GET" style="margin-bottom: 20px;">
    <input type="text" name="name" value="{{ request('name') }}" placeholder="Пошук за назвою...">
    <button type="submit">Знайти</button>
</form>

@if(count($products) > 0)
<ul>
    @foreach($products as $product)
    <li style="margin-bottom: 10px;">
        <a href="{{ route('products.show', ['id' => $product['id']]) }}">
            <strong>{{ $product['name'] }}</strong>
        </a>
        — {{ $product['price'] }}$

        @if($product['is_available'])
        <span style="color: green; font-size: 12px;">(Доступно)</span>
        @else
        <span style="color: red; font-size: 12px;">(Немає в наявності)</span>
        @endif
    </li>
    @endforeach
</ul>
@else
<p>Товарів не знайдено.</p>
@endif
@endsection