@extends('app')

@section('content')
<h1>Список товарів</h1>

@if(count($products) > 0)
<ul>
    @foreach($products as $product)
    <li style="margin-bottom: 10px;">
        <a href="{{ route('products.search', ['name' => $product['name']]) }}">
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