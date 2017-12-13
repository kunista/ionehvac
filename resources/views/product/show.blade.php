@extends('layouts.master')

@push('head')
<link href='/css/product/product.css' rel='stylesheet'>
@endpush

@section('title')
    {{ $product->name }}
@endsection

@section('content')
    <div class='product cf'>
    <h2> <strong>Name:</strong> {{ $product['name'] }}</h2>
    <p> <strong>Description:</strong> {{ $product['description'] }}</p>
    <p><strong>Price:</strong> ${{ $product->priceFormatted() }}</p>

        @if ($user and $user->isAdmin())
            <a href='/product/{{ $product['id'] }}/edit'>Edit</a> |
            <a href='/product/{{ $product['id'] }}/delete'>Delete</a>

        @else



        @endif

     </div>
@endsection
